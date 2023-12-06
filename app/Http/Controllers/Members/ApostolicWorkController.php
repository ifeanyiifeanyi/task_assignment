<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\ApostolicWork;
use Illuminate\Http\Request;

class ApostolicWorkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $history = $user->apostolic()->get();
        return view('member.apostolicHistory.index', compact('history'));
    }
    public function create()
    {
        return view('member.apostolicHistory.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'duration_in_words' => 'required|string',
            'organization' => 'required|string',
        ]);

        $history = new ApostolicWork();
        $history->start_date = $request->input('start_date');
        $history->end_date = $request->input('end_date');
        $history->organization = $request->input('organization');
        $history->duration_in_words = $request->input('duration_in_words');
        $history->user_id = auth()->user()->id;
        $history->save();
        $notification = [
            'message'    => 'Assignment History Saved',
            'alert-type' => 'success',
        ];

        return redirect()->route('apostolic.history.view')->with($notification);
    }

    public function show($history)
    {
        $history = ApostolicWork::findOrFail($history);
        return view('member.apostolicHistory.edit', compact('history'));
    }
    public function edit($history)
    {
        $history = ApostolicWork::findOrFail($history);
        return view('member.apostolicHistory.edit', compact('history'));
    }

    public function update(Request $request, $history)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'duration_in_words' => 'required|string',
            'organization' => 'required|string',
        ]);


        $history = ApostolicWork::findOrFail($history);
        $history->start_date = $request->input('start_date');
        $history->end_date = $request->input('end_date');
        $history->organization = $request->input('organization');
        $history->duration_in_words = $request->input('duration_in_words');
        $history->user_id = auth()->user()->id;
        $history->save();
        $notification = [
            'message'    => 'Assignment History Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('apostolic.history.view')->with($notification);

    }

    public function destroy($history)
    {
        $history = ApostolicWork::findOrFail($history);

        $history->delete()  ;
             $notification = [
                 'message'    => 'Assignment History Deleted Successfully',
                 'alert-type' => 'success',
             ];

        return redirect()->route('apostolic.history.view')->with($notification);
    }
}
