<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ChangePassController extends Controller
{
    public function CPassword()
    {
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashPassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('login')->with($notification);
        }else{
            $notification = array(
                'message' => 'Old Password is incorrect',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
    // Profile Update
    public function PUpdate()
    {
        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile', compact('user'));
            }
        }

    }
    public function UpdateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find(Auth::user()->id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return Redirect()->back()->with('success', 'User Profile Updated Successfully');
            // $notification = array(
            //     'message' => 'User Profile Updated Successfully',
            //     'alert-type' => 'success'
            // );
        }else{
            //     $notification = array(
            return Redirect()->back();
        }
    }
}

