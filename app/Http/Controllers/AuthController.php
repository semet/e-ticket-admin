<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->json()) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            if ($check) {
                $request->session()->regenerate();
                return response()->json([
                    'message' => 'Login successfully'
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Akun tidak ditemukan'
                ], 422);
            }
        }
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
