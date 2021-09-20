<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function profileupdate(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ], [
            'name.required' => 'Name is required.',
        ]);
        User::find(Auth::id())->update([
            'name' => $request->name,
        ]);
        return back()->with('namesuccess', 'Name update successfully.');
    }

    public function passwordupdate (Request $request)
    {
        $request->validate([
            'o_pass'=>'required',
            'n_pass'=>'required | min:8 | max:20',
            'c_pass'=>'required',
        ], [
            'o_pass.required' => 'Old password is required.',
            'n_pass.required' => 'New password is required.',
            'n_pass.min' => 'New password must be more than 8 charecters.',
            'n_pass.max' => 'New password maximum 20 charecters.',
            'c_pass.required' => 'Confirm password is required.',
        ]);

        if(Hash::check($request->o_pass, Auth::user()->password))
        {
            if($request->n_pass == $request->c_pass)
            {
                User::find(Auth::id())->update([
                    'password' => bcrypt($request->n_pass) ,
                ]);
                return back()->with('passwordsuccess', 'Password update successfully.');
            }
            else
            {
                return back()->withErrors('Password and Confirm password not match.');
            }
        }
        else
        {
            return back()->withErrors('Old password not match.');
        }
    }

    public function profilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required | image',
        ]);
        if(Auth::user()->profile_photo != 'default.jpg')
        {
            unlink(base_path('public/images/profile_photo/'.Auth::user()->profile_photo));
        }
            $new_image_name = Auth::id().'.'.$request->file('profile_photo')->getClientOriginalExtension();
            Image::make($request->file('profile_photo'))->resize(200, 200)->save(base_path('public/images/profile_photo/'.$new_image_name));
            User::find(Auth::id())->update([
                'profile_photo' => $new_image_name,
            ]);
            return back()->with('imgSuccess' , 'Image Update successfully.');
    }
}
