<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
//        dd(auth()->user());
        return view('member.profile.index', ['user' => auth()->user()]);
    }
    public function ViewUpdatePassword(){
        return view('member.profile.ViewUpdatePassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required|string|min:6|max:10',
            'new_password' => 'required|confirmed|min:6|max:10||different:password'
        ]);
        $user = \auth()->user();

        if (!Hash::check($request->password, $user->password)){
            $notification = [
                'message'    => 'Current password is incorrect',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
        if (Hash::check($request->new_password, $user->password)){
            $notification = [
                'message'    => 'New password cannot be the same as current password',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        $notification = [
            'message'    => 'Password updated successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }
}
