<?php

namespace App\Listeners;

use App\Events\CheckoutSuccess;
use App\Mail\InvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoice
{

    //    public string $connection = 'database';
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
     * @param  \App\Events\CheckoutSuccess  $event
     * @return void
     */
    public function handle(CheckoutSuccess $event)
    {
        $event->booking->passengers()->each(function ($passenger) use ($event) {
            return Mail::to($passenger->email)->send(new InvoiceMail($event->booking, $passenger));
        });
    }
}
