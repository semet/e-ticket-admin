<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile.show');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required'
        ]);
        $admin = Admin::find(auth()->guard('admin')->id());
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->save();
        return back()->with('successUpdateProfile', 'Profile admin berhasil diupdate');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed'
        ]);
        if (!Hash::check($request->oldPassword, auth()->guard('admin')->user()->password)) {
            return back()->with('error', 'Password lama yang anda masukkan tidak valid');
        }

        $admin = Admin::find(auth()->guard('admin')->id());
        $admin->password = Hash::make($request->newPassword);
        $admin->save();
        return back()->with('success', 'Update password admin berhasil');
    }
}
