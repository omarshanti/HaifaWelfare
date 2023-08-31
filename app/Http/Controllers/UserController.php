<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit() {
        return view('admin.profile.profile');
    }

    public function update($id,Request $request) {

        $request->validate([
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $user = User::find($id);
        $photo = $user->photo;
        if ($request->has('photo')) {
            if(File::exists(public_path('assets/profile'.$user->photo))){
                File::delete(public_path('assets/profile'.$user->photo));
            }
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('assets/profile'), $photo);
        }

        $status = $user->update([
            'name' => $request->name,
            'photo' => $photo,
        ]);
        if ($request->password !== null) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
        if ($status) {
            toastr()->success('User Updated Successfully.');
            return redirect()->back();
        } else {
            toastr()->failed('User Not Updated Successfully.');
            return redirect()->back();
        }

    }
}
