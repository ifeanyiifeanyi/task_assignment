<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use App\Models\NotificationModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CustomNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class ManageNotificationController extends Controller
{
    public function  index(){
        $notifications = NotificationModel::all();
        return view('admin.manageNotifications.index', compact('notifications'));
    }
    public  function create(){
        return view('admin.manageNotifications.create');
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content' => 'required|string',
                'title' => 'required|string'
            ]);
    
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $users = User::where('role', 'member')->get();
            $content = $request->input('content');
            $title = $request->input('title');
    
            NotificationModel::create([
                'content' => $content,
                'title' => $title
            ]);
    
            $totalUsers = $users->count();
            $emailsSent = 0;
    
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NotificationMail($title, $content));
                $emailsSent++;
            }
    
            $notification = [
                'message' => 'Notification created successfully',
                'alert-type' => 'success',
            ];
    
            return redirect()->route('admin.notification.view')->with($notification);
        } catch (\Exception $e) {
            // Log the error
            $notification = [
                'message' => 'An error occurred while creating notification. Please try again later.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
    
        }
    }
    
    public function edit($notification){
        $notification  = NotificationModel::findOrFail($notification) ;
//        dd($notification);
        return view('admin.manageNotifications.edit', compact('notification'));
    }
    public function update(Request $request, $id){

        try {
            $request->validate([
                'content' => 'required|string',
                'title' => 'required|string'
            ]);
            $users = User::where('role', 'member')->get();
            $notice = NotificationModel::findOrFail($id);


            $content = $request->input('content');
            $title   = $request->input('title');

            $notice->update(
                [
                    'content' => $content,
                    'title' => $title
                ]
            );
            $emailsSent = 0;
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NotificationMail($title, $content));
                $emailsSent++;
                // sleep(1);
            }
            $notification = [
                'message'    => 'Notification updated successfully',
                'alert-type' => 'success',
            ];
    
            return redirect()->back()->with($notification);
    
        } catch (\Exception $e) {
            $notification = [
                'message' => 'An error occurred while update notification. Please try again later.',
                'alert-type' => 'error',
            ];
    
            return redirect()->back()->with($notification);
    
        }


       



    }

    public function show($id)
    {
        $notice = NotificationModel::findOrFail($id);
        return view('admin.manageNotifications.show', compact('notice'));
    }

    public function destroy($id)
    {
        NotificationModel::findOrFail($id)->delete();
        $notification = [
            'message'    => 'Notification deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.notification.view')->with($notification);
    }
}
