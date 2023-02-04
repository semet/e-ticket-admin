<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Destination;

class CheckSpecialDestinationAvailability
{
    public function __construct(
        //booking date
        public string $bookingDate,
        //selected time
        public string $bookingTime,
        //type of booking "quantity|packet"
        public string $bookingType,
        //Quantity of ticket if the booking type is quantity
        public string $ticketQuantity,
        //whether it is 'single|family|couple' if customer select "packet" in bookingType
        public string|null $bookingPacket,
        //Number of family member
        public string|null $familyCount,
        //seat count
        public int  $seatCount = 8
    ) {
    }

    public function specialDestinationId()
    {
        return Destination::where('type', 'a')
            ->first()
            ->id;
    }

    public function bookedSeat(): int
    {
        $booked =  Booking::where('destination_id', $this->specialDestinationId())
            ->where('date', $this->bookingDate)
            ->where('schedule_id', $this->bookingTime)
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
        //check if there is Packet (couple/family) booking. if exists, minus the seat count by -4
        $packetBooking = Booking::where('destination_id', $this->specialDestinationId())
            ->where('date', $this->bookingDate)
            ->where('schedule_id', $this->bookingTime)
            ->where('status', '!=', 'confirmed')
            ->where('status', 'confirmed')
            ->first();
        return $packetBooking ? $this->seatCount - 4 : $this->seatCount - $this->bookedSeat();
    }

    public function check(): bool
    {
        //        dd($this->bookedSeat().'-'.$this->ticketQuantity);
        //        dd($this->ticketQuantity);
        if ($this->bookingType === 'quantity') {
            return $this->checkBasedOnQuantity();
        } else {
            return $this->checkBasedOnPacket();
        }
    }

    public function checkBasedOnQuantity(): bool
    {
        //        dd($this->finalSeatCount() >= (int) $this->ticketQuantity);
        //        dd($this->finalSeatCount());
        return $this->finalSeatCount() >= (int) $this->ticketQuantity;
    }

    public function checkBasedOnPacket(): bool
    {
        return $this->finalSeatCount() >= 4;
    }
}
