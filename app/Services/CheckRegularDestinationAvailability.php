<?php

namespace App\Services;

use App\Models\Booking;

class CheckRegularDestinationAvailability
{
    public function __construct(
        //selected destination id
        public string $destinationId,
        //booking date
        public string $bookingDate,
        //selected time
        public string $bookingTime,
        //Quantity of ticket
        public string $ticketQuantity,
        //seat count
        public int  $seatCount = 14
    ) {
    }

    public function bookedSeat(): int
    {
        $booked = Booking::where('destination_id', $this->destinationId)
            ->where('date', $this->bookingDate)
            ->where('schedule_id', $this->bookingTime)
            ->where('type', 'quantity')
            ->where('status', 'confirmed')
            ->withCount('passengers')
            ->get();

        return $booked->map(function ($item, $key) {
            return $item->passengers_count;
        })
            ->sum();
    }

    public function finalSeatCount(): int
    {
        return $this->seatCount - $this->bookedSeat();
    }

    public function check(): bool
    {
        //        dd($this->bookedSeat());
        return $this->finalSeatCount() >= (int) $this->ticketQuantity;
    }
}
