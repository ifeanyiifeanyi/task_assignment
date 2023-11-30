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

    public function edit($notification){
        $notification  = NotificationModel::findOrFail($notification) ;
//        dd($notification);
        return view('admin.manageNotifications.edit', compact('notification'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'content' => 'required|string',
            'title' => 'required|string'
        ]);
        $users = User::where('role', 'member')->get();
        $notice = NotificationModel::findOrFail($id);


        $content = $request->input('content');
        $title   = $request->input('title');

        $notification = new CustomNotification($content, $title);

        Notification::send($users, $notification);
        $notice->update(
            [
                'content' => $request->input('content'),
                'title' => $request->input('title')
            ]);
        $notification = [
            'message'    => 'Notification updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.notification.view')->with($notification);
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
