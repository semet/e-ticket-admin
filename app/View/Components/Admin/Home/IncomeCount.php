<?php

namespace App\View\Components\Admin\Home;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class IncomeCount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $today = Carbon::today()->toDateString();

        $total = Booking::whereDate('created_at', $today)->get()
            ->map(function ($booking) {
                $status = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key'))
                ])
                    ->get('https://api.sandbox.midtrans.com/v2/' . $booking->number . '/status');

                return json_decode($status);
            })
            ->filter(function ($data) {

                if (isset($data->signature_key)) {
                    return $data->transaction_status == 'capture' || $data->transaction_status == 'settlement';
                } else {
                    return null;
                }
            })
            ?->sum('gross_amount');

        return view('components.admin.home.income-count', [
            'total' => 'Rp. ' . number_format($total)
        ]);
    }
}
