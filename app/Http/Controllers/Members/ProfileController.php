<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use function auth;

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
        $user = auth()->user();

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
    public function viewUpdateProfile(){
        return view('member.profile.viewUpdateProfile')->with('user', auth()->user());
    }
    public function updateProfile(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string|max:199',
            'username'  => 'required|string|max:199',
            'phone'     => 'required|string',
            'email'     => 'required|email',
            'address'   => 'required|string',
            'photo'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'parish'              => 'required|string',
            'class'              => 'required|string',
            'school'              => 'required|string',
            'home_parish'         => 'nullable|string',
            'parish_of_residence' => 'nullable|string',
            'dioceses'            => 'required|string',
        ]);

        $user = User::where('id', $id)->first();

        if (!$user) {
            abort(404, 'User not found');
        }

        if ($request->hasFile('photo')) {
            // Delete existing photo if it exists
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            // Upload new photo
            $image = $request->file('photo');
            $file_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'upload/profile/' . $file_name;
            Image::make($image)->resize(300, 300)->save(public_path($imagePath));
            $user->photo = $imagePath;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->parish = $request->parish;
        $user->class = $request->class;
        $user->school = $request->school;
        $user->home_parish = $request->home_parish;
        $user->parish_of_residence = $request->parish_of_residence;
        $user->dioceses = $request->dioceses;
        $user->save();

        $notification = [
            'message'    => 'Profile updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('member.profile.view')->with($notification);
    }

}
