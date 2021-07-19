<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
    public function upload(Request $request){
    
        //file upload
            $name = Auth::user()->id.'_'.time().'.'.$request->file('upload')->extension();
            $path = 'assets/profile_image';
            $image = $request->file('upload');
            $image->move(public_path($path), $name);
        //database update
        //getting old image name
        $oldimage = User::where('id',Auth::user()->id)->first();
        //delete old image
        if($oldimage->user_image_name){ 
            $image_path = public_path($path).'/'. $oldimage->user_image_name;
            if (file_exists($image_path)) {
                  unlink($image_path);             
              }
        }
        //update database
        User::where('id', Auth::user()->id)
            ->update(['user_image_name' => $name]);
        //////////////

        return back()->withStatus(__('Profile successfully updated.'));
    }
}

