<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationModel;
use App\Models\User;
use App\Notifications\CustomNotification;
use Illuminate\Http\Request;
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
    public function store(Request $request){
        $request->validate([
            'content' => 'required|string',
            'title' => 'required|string'
        ]);
        $users = User::where('role', 'member')->get();

        $content = $request->input('content');
        $title   = $request->input('title');

        $notification = new CustomNotification($content, $title);

        Notification::send($users, $notification);
        NotificationModel::create(
            [
                'content' => $request->input('content'),
                'title' => $request->input('title')
            ]);
        $notification = [
            'message'    => 'Notification created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.notification.view')->with($notification);
    }
}
