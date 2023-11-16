<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public  function  create(){
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('admin.task.create')->with('users', $users);
    }

    public  function showFormForUser($user){
        $user = User::where('id', $user)->first();
        return view('admin.task.create')->with('user', $user);
    }

    public  function store(Request $request){

        $request->validate([
            'user_id'          =>'required',
            'description'   =>'required',
            'title'         => 'required|string|max:255',
            'start_date'    => 'required|date',
            'stop_date'     => 'nullable|date|after:start_date',
            'additional_file' => 'nullable|  '
        ]);
        $user = User::where('id', $request->user_id)->first();
        $user->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'end_date' => $request->end_date,
            'start_date' => $request->start_date
        ]);
        return redirect()->route('admin.task.create')->with('success', 'Task Created Successfully');
    }
}
