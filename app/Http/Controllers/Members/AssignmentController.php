<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Task;
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
        $tasks = $user->tasks()->get();
//        dd($tasks);
        return view('member.assignment.allAssignments', compact('tasks'));
    }

    public function previousAssignmentDetails($details){
          $task = Task::findOrFail($details);
          return view('member.assignment.show', compact('task')) ;
    }

}
