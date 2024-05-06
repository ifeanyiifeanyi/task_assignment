<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\NotificationModel;
use Illuminate\Http\Request;

class ViewNotificationController extends Controller
{
    public function  index(){
        $notifications = NotificationModel::latest()->get();
        return view('member.notice.index', compact('notifications'));
    }
    public function show($id)
    {
        $notice = NotificationModel::findOrFail($id);
        return view('member.notice.show', compact('notice'));
    }
}
