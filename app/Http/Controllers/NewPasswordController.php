<?php

namespace App\Http\Controllers;

use App\Models\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

class NewPasswordController extends Controller
{
    public function show($userId)
    {
        PasswordRequest::where('user_id', $userId)->firstOrFail();

        return view('auth.new-password', [
            'userId' => $userId
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::find($request->userId);
        $user->password = bcrypt($request->password);
        $user->save();

        PasswordRequest::where('user_id', $user->id)->delete();

        return redirect()->route('home.page');
    }
}
