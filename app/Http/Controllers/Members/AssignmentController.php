<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function activeAssignment(){
        $user = auth()->user();
        $task = $user->tasks()->where('status', 'active')->first();
        return view('member.assignment.activeAssignment', compact('task'));
    }

    public function allPreviousAssignments(){
        $user = auth()->user();
        $tasks = $user->tasks()->where('status', '<>', 'active')->get();
//        dd($tasks);
        return view('member.assignment.allAssignments', compact('tasks'));
    }
}
