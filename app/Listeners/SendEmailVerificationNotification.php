<?php

namespace App\Listeners;

use App\Events\RegistrationSuccessful;
use App\Mail\EmailVerificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\RegistrationSuccessful  $event
     * @return void
     */
    public function handle(RegistrationSuccessful $event)
    {
        $code = fake()->randomNumber(4, true);
        $event->user->verificationCode()->create([
            'code' => $code,
        ]);
        Mail::to($event->user->email)->send(new EmailVerificationMail($event->user));
    }
}
