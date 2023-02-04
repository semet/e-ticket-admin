<?php

namespace App\Http\Controllers;

use App\Events\CheckoutSuccess;
use App\Models\Booking;
use App\Services\Midtrans\CreateSnapTokenService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($bookingId)
    {
        $booking  = Booking::findOrFail($bookingId);

        $price = $this->getPrice($booking);

        $snapToken  = $booking->snap_token;

        if (empty($snapToken)) {
            $midtrans = new CreateSnapTokenService($booking, $price);
            $snapToken = $midtrans->getSnapToken();
            $booking->snap_token = $snapToken;
            $booking->save();
        }

        if ($booking->status == 'confirmed') {
            return redirect()->route('invoice', $booking->id);
        }

        return view('checkout', [
            'booking' => $booking,
            'price' => $price,
            'snapToken' =>  $snapToken
        ]);
    }

    public function getPrice(Booking $booking)
    {
        if ($booking->type == 'quantity') {
            return $booking->destination->price * $booking->passengers->count();
        } elseif ($booking->type == 'couple') {
            return config('site.couple_actual_price');
        } elseif ($booking->type == 'family') {
            return config('site.family_actual_price');
        }
    }

    public function processSuccessCheckout($bookingId)
    {
        $booking  = Booking::find($bookingId);

        return redirect()->route('invoice', $booking->id);
        //        return view('mails.confirmation', ['booking' => $booking]);
    }

    public function processPendingOrder($bookingId)
    {
        return view('checkout-pending');
    }
}
