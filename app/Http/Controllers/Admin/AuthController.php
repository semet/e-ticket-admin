<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($admin) {
            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }
        return back()->with('error', 'Email / Password tidak valid');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('admin.login.show');
    }
}
