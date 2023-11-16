<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class MembersManagementController extends Controller
{

    private function processPhoto(Request $request, User $user = null)
    {
        if ($request->hasFile('photo')) {
            // Delete existing photo if it exists
            if ($user && $user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }

            // Upload new photo
            $image = $request->file('photo');
            $file_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $imagePath = 'upload/profile/' . $file_name;
            Image::make($image)->resize(300, 300)->save(public_path($imagePath));

            return $imagePath;
        } elseif ($user && $user->photo) {
            // No new photo selected, retain the existing one
            return $user->photo;
        }

        return null;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->latest()->get();
        return view('admin.members.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'role'                => 'nullable',
            'parish_of_residence' => 'nullable|string',
            'dioceses'            => 'required|string',
            'password'             => 'required|confirmed|string|min:6|max:10',
        ]);

        $user = new User();
        $user->photo = $this->processPhoto($request);

        $user->name = $request->name;
        $user->inter_dioceses = $request->inter_dioceses ? 1 : 0;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->parish = $request->parish;
        $user->class = $request->class;
        $user->school = $request->school;
        $user->role = $request->role ?? 'member';
        $user->home_parish = $request->home_parish;
        $user->parish_of_residence = $request->parish_of_residence;
        $user->dioceses = $request->dioceses;
        $user->password = Hash::make($request->password);
        $user->save();

        $notification = [
            'message'    => 'Registration successful',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.member.all')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $user = User::where('username',$username)->first();
        return view('admin.members.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $member)
    {
        $user = User::where('username', $member)->first();
        return view('admin.members.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $member)
    {
        //dd($request);

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
            'role'                => 'nullable',
            'parish_of_residence' => 'nullable|string',
            'dioceses'            => 'required|string',
        ]);

        $user = User::where('username', $member)->first();
        $user->photo = $this->processPhoto($request, $user);

        $user->name = $request->name;
        $user->inter_dioceses = $request->inter_dioceses ? 1 : 0;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->parish = $request->parish;
        $user->class = $request->class;
        $user->school = $request->school;
        $user->role = $request->role ?? 'member';
        $user->home_parish = $request->home_parish;
        $user->parish_of_residence = $request->parish_of_residence;
        $user->dioceses = $request->dioceses;
        $user->save();

        $notification = [
            'message'    => 'Profile updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.member.all')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role == "admin"){

            $user = User::findOrFail($id);
            if ($user && $user->photo){
                unlink(public_path($user->photo));
            }
            if ($user) {
                $user->delete();
                $notification = [
                    'message' => 'User deleted successfully',
                    'alert-type' => 'error',
                ];
                return redirect()->route('admin.member.all')->with($notification);
            }
        }else{
            $notification = [
               'message' => 'You are not authorized to delete this user',
                'alert-type' => 'error',
            ];
            return redirect()->route('admin.member.all')->with($notification);
        }
    }
}
