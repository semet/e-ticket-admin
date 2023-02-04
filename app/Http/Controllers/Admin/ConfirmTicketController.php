<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConfirmTicketController extends Controller
{
    public function showForm($bookingId, $passengerId)
    {
        $passenger = Passenger::where('booking_id', $bookingId)
            ->where('id', $passengerId)
            ->first();
        return view('admin.confirm-ticket', [
            'passenger' => $passenger
        ]);
    }

    public function approve(Request $request)
    {
        $password = Admin::first()->password;
        if (!Hash::check($request->password, $password)) {
            return back()->with('error', 'Password salah');
        }
        $passenger = Passenger::find($request->passengerId);
        $passenger->is_claimed = 1;
        $passenger->save();

        return back();
    }
}
