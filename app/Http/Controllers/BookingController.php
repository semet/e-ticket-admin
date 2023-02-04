<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Passenger;
use App\Services\CheckRegularDestinationAvailability;
use App\Services\CheckSpecialDestinationAvailability;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    protected string $bookingId;
    protected int $quantity;
    public function index(Request $request)
    {
        $destination = Destination::find($request->destinationId);

        return view('booking', [
            'destination' => $destination,
            'bookingDate' => $request->bookingDate,
            'bookingTime' => $request->bookingTime,
            'bookingType' => $request->bookingType,
            'ticketQuantity' => $request->ticketQuantity,
            'bookingPacket' => $request->bookingPacket,
            'familyCount' => $request->familyCount,
        ]);
    }

    public function checkAvailability(Request $request)
    {
//        dd($request->all());
        if($request->destinationType === 'a'){
            $check =  (new CheckSpecialDestinationAvailability(
                bookingDate: $request->bookingDate,
                bookingTime: $request->bookingTime,
                bookingType: $request->bookingType,
                ticketQuantity: $request-> ticketQuantity,
                bookingPacket: $request->bookingPacket,
                familyCount: $request->familyCount
            ))->check();

            return response()->json([
                'available' => $check
            ]);
        }else{
            $check = (new CheckRegularDestinationAvailability(
                destinationId: $request->destinationId,
                bookingDate: $request->bookingDate,
                bookingTime: $request->bookingTime,
                ticketQuantity: $request-> ticketQuantity,
            ))->check();
            return response()->json([
                'available' => $check
            ]);
        }
    }

    public function confirm(Request $request)
    {
        $booking = Booking::create([
            'destination_id' => $request->destinationId,
            'user_id' => auth()->id(),
            'schedule_id' => $request->scheduleId,
            'number' => fake()->randomNumber(8, true),
            'date' => $request->date,
            'status' => $request->status,
            'type' => $request->type
        ]);

        for($i = 0; $i < count($request->nik); $i++ ){
            $data[] = [
                'id' => Str::uuid(),
                'nik' => $request->nik[$i],
                'name' => $request->name[$i],
                'email' => $request->email[$i],
            ];
        }
        $booking->passengers()->createMany($data);

        return redirect()->route('checkout', $booking->id);
    }
}
