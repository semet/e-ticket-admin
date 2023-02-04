<?php

namespace App\Services\Midtrans;

use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class UpdateBookingStatus
{
    public function __construct(
        public string $bookingNumber
    )
    {
    }

    public function update(): bool
    {
        try{
            $booking = Booking::where('number', $this->bookingNumber)->first();
            $booking->status = 'confirmed';
            $booking->save();

            return true;
        }catch (\Exception $e) {
            Log::error($e->getMessage());

            return false;
        }
    }
}
