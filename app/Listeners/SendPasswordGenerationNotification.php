<?php

namespace App\Listeners;

use App\Events\SocialUserCreated;
use App\Mail\SocialUserNewPasswordMail;
use App\Models\PasswordRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendPasswordGenerationNotification
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
     * @param  \App\Events\SocialUserCreated  $event
     * @return void
     */
    public function handle(SocialUserCreated $event)
    {
        PasswordRequest::create([
            'id' => Str::uuid(),
            'user_id' => $event->user->id
        ]);

        Mail::to($event->user->email)->send(new SocialUserNewPasswordMail($event->user));
    }
}
