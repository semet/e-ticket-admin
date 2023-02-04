<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Passenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($bookingId)
    {
        $booking = Booking::find($bookingId);
        return view('invoice', [
            'booking' => $booking
        ]);
    }

    public function download($bookingId, $passengerId)
    {
        $booking = Booking::find($bookingId);
        $passenger = Passenger::find($passengerId);

        $pdf = Pdf::loadView('pdfs.invoice', [
            'booking' => $booking,
            'passenger' => $passenger
        ]);
        return $pdf->download('invoice.pdf');
    }
}
