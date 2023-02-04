<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\SocialUserCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(10)) // you can change auto generate password here and send it via email but you need to add checking that the user need to change the password for security reasons
                ]);
                if ($newUser) {
                    SocialUserCreated::dispatch($newUser);
                } else {
                    Log::error("Unable to do this");
                }

                Auth::login($newUser);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
