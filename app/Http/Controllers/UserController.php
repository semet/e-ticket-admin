<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function order()
    {
        $orders = Booking::where('user_id', auth()->id())
            ->orderBy('date')
            ->get();

        return view('user.order', [
            'orders' => $orders
        ]);
    }

    public function orderDetails($id)
    {
        $order = Booking::find($id);
        $status = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key'))
        ])
            ->get('https://api.sandbox.midtrans.com/v2/' . $order->number . '/status');

        $decodedStatus = json_decode($status);

        // dd($decodedStatus);
        return view('user.order-details', [
            'order' => $order,
            'status' => $decodedStatus
        ]);
    }

    public function setting()
    {
        return view('user.settings');
    }

    public function message()
    {
        return view('user.message');
    }
}
