<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AssignmentCreated;
use App\Mail\AssignmentEnded;
use App\Mail\AssignmentUpdated;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class TaskController extends Controller
{
    private function processPhoto(Request $request, User $user = null)
    {
        if ($request->hasFile('additional_file')) {
            // Delete existing photo if it exists
            if ($user && $user->additional_file && file_exists(public_path($user->additional_file))) {
                unlink(public_path($user->additional_file));
            }

            $image = $request->file('additional_file');
            $fileExtension = $image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()) . '.' . $fileExtension;
            $imagePath = 'upload/additional_file/' . $file_name;

            if (in_array($fileExtension, ['jpg', 'jpeg', 'png'])) {
                // Resize image for jpg, jpeg, and png
                Image::make($image)->resize(300, 300)->save(public_path($imagePath));
            } elseif ($fileExtension === 'pdf') {
                // Save PDF to a different folder
                $pdfPath = 'upload/additional_file/' . $file_name;
                $imagePath = $pdfPath;
                $image->move(public_path('upload/additional_file'), $file_name);
            } else {
                // Handle other file types as needed
                // For now, save in  same folder without resizing
                $image->move(public_path('upload/additional_file'), $file_name);
            }

            return $imagePath;
        } elseif ($user && $user->additional_file) {
            // No new photo selected, retain the existing one
            return $user->additional_file;
        }

        return null;
    }

    private function generateNotification($message, $alertType)
    {
        return [
            'message' => $message,
            'alert-type' => $alertType,
        ];
    }

    public function index(){
        $tasks = Task::where('status', 'active')->with('user')->get();
        return view('admin.task.index')->with('tasks', $tasks);
    }

    public  function  create(){
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('admin.task.create')->with('users', $users);
    }

    public  function showFormForUser($user){
        $user = User::where('id', $user)->first();
        return view('admin.task.create')->with('user', $user);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'description' => 'required|string',
            'email_description'  => 'nullable|string',
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'stop_date' => 'nullable|date|after:start_date',
            'additional_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:20480',
        ]);

        if ($validator->fails()) {
            $notification = $this->generateNotification('Validation failed. Please check your input.', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with($notification);
        }

        $user = User::find($request->user_id);

        // Check if the user already has an active task
        if ($user->tasks()->where('status', 'active')->exists()) {
            $notification = $this->generateNotification('User already has an active task. Cannot create a new one.', 'error');
            return redirect()->back()->with($notification);
        }

        // Create a new task
        $task = $user->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'email_description' => $request->email_description ?? "Please login to your dashboard, for more information regarding your posting",
            'user_id' => $request->user_id,
            'end_date' => $request->end_date,
            'start_date' => $request->start_date,
            // Add other task fields as needed
            'additional_file' => $this->processPhoto($request)
        ]);
        // Send email to user and admin
        Mail::to($user->email)->queue(new AssignmentCreated($user, $task));
        Mail::to('admin@example.com')->queue(new AssignmentCreated($user, $task));


        $notification = $this->generateNotification('Assignment successfully created.', 'success');
        return redirect()->route('admin.active.task')->with($notification);
    }

    public function activeUserTask($taskId){
         $task  = Task::with('user')->findOrFail($taskId);
//
         return view('admin.task.show')->with('task', $task);
    }

    public function edit($taskId){
        $task  = Task::with('user')->findOrFail($taskId);
//
        return view('admin.task.edit')->with('task', $task);
    }

    public  function  update(Request $request, $taskId){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'description' => 'required|string',
            'email_description'  => 'nullable|string',
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'stop_date' => 'nullable|date|after:start_date',
            'additional_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:20480',
        ]);

        if ($validator->fails()) {
            $notification = $this->generateNotification('Validation failed. Please check your input.', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with($notification);
        }
        $task  = Task::with('user')->findOrFail($taskId);

        $task->update([
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'email_description' => $request->email_description ?? "Please login to your dashboard, for updated information regarding your posting",

            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'additional_file' => $this->processPhoto($request)
        ]);
        // Send email to the user about the update
        Mail::to($task->user->email)->queue(new AssignmentUpdated($task->user, $task));
        $notification = $this->generateNotification('Assignment successfully Updated!', 'success');
        return redirect()->route('admin.active.task')->with($notification);
    }

    public function endActiveTask($taskId){
        $task  = Task::with('user')->findOrFail($taskId);

        $task->update([
            'status' => 'disabled',
        ]);

        Mail::to($task->user->email)->queue(new AssignmentEnded($task->user, $task));
        $notification = $this->generateNotification('Assignment status Updated!', 'success');
        return redirect()->route('admin.active.task')->with($notification);
    }

    public function allTasks(){
        $tasks = Task::all();
        return view('admin.task.allTask', compact('tasks'));
    }

    public  function ViewTask($taskId){
        $task  = Task::with('user')->findOrFail($taskId);
        return view('admin.task.viewAnyTask', compact('task'));
    }

    public function destroy($taskId){

        if (auth()->user()->role === "admin"){
            $task  = Task::with('user')->findOrFail($taskId);
            if ($task && $task->additional_file){
                unlink(public_path($task->additional_file));
            }
            if ($task) {
                $task->delete();
                $notification = [
                    'message' => 'Assignment deleted successfully',
                    'alert-type' => 'error',
                ];
                return redirect()->route('admin.all.task')->with($notification);
            }
        }else{
            $notification = [
                'message' => 'You are not authorized to delete this assignment',
                'alert-type' => 'error',
            ];
            return redirect()->route('admin.all.task')->with($notification);
        }
    }

    public function archivedTask(){
        $tasks = Task::onlyTrashed()->get();
        return view('admin.task.archievedTask', compact('tasks'));

    }

    public function restoreTask($taskId)
    {
        $task = Task::withTrashed()->findOrFail($taskId);

        // Check if the task is soft-deleted
        if ($task->trashed()) {
            // Restore the task (remove the soft delete)
            $task->restore();

            // Update the status to 'active'
            $task->update(['status' => 'active']);

            $notification = [
                'message' => 'Assignment restored successfully!',
                'alert-type' => 'success',
            ];
        } else {
            $notification = [
                'message' => 'Assignment not found or not soft-deleted.',
                'alert-type' => 'error',
            ];
        }

        return redirect()->route('admin.task.archive')->with($notification);
    }



    public function forceDeleteTask($taskId)
    {
        // Retrieve the specific task based on $taskId
        $task = Task::onlyTrashed()->find($taskId);

        // Check if the task is found and is trashed
        if ($task && $task->trashed()) {
            if ($task && $task->photo){
                unlink(public_path($task->photo));
            }
            // Permanently delete the task
            $task->forceDelete();

            $notification = [
                'message' => 'Assignment deleted permanently!',
                'alert-type' => 'success',
            ];
            return redirect()->route('admin.task.archive')->with($notification);

        } else {
            $notification = [
                'message' => 'Assignment not found or already deleted.',
                'alert-type' => 'error',
            ];
        return redirect()->route('admin.task.archive')->with($notification);

        }

    }


}
