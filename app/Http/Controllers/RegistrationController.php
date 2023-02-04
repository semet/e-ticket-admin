<?php

namespace App\Http\Controllers;

use App\Events\RegistrationSuccessful;
use App\Mail\EmailVerificationMail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{

    public function showForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        RegistrationSuccessful::dispatch($user);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function resendVerification()
    {
        $code = fake()->randomNumber(4, true);
        //delete previous one
        auth()->user()->verificationCode()?->delete();
        auth()->user()->verificationCode()->create([
            'code' => $code
        ]);



        Mail::to(auth()->user()->email)->send(new EmailVerificationMail(auth()->user()));

        return back()->with('success', 'Kode verifikasi berhasil dikirim ke Email anda');
    }


    public function showVerificationForm($id)
    {
        EmailVerification::findOrFail($id);

        return view('auth.verify-email');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $verification = EmailVerification::where('code', $request->code)->first();

        if (!$verification) {
            return back()->with('error', 'Kode tidak valid');
        }

        $verification->user()->update([
            'email_verified_at' => now()
        ]);

        $verification->delete();

        return redirect()->route('home.page');
    }
}
