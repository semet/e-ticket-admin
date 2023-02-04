<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(Request $request)
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(10)) // you can change auto generate password here and send it via email but you need to add checking that the user need to change the password for security reasons
                ]);
                //TODO: make event to tell user to make new password for hs google account
                Auth::login($newUser);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
