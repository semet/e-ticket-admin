<?php

namespace App\Providers;

use App\Events\CheckoutSuccess;
use App\Events\RegistrationSuccesfull;
use App\Events\RegistrationSuccessful;
use App\Events\SocialUserCreated;
use App\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendInvoice;
use App\Listeners\SendPasswordGenerationNotification;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        RegistrationSuccessful::class => [
            SendEmailVerificationNotification::class,
        ],
        CheckoutSuccess::class => [
            SendInvoice::class
        ],
        SocialUserCreated::class => [
            SendPasswordGenerationNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
