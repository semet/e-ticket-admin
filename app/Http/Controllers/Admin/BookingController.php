<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use JsonIncrementalParser;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.index');
    }

    public function getBookings(Request $request)
    {
        $from =  Carbon::parse($request->startDate)->format('Y-m-d');
        $to =  Carbon::parse($request->endDate)->format('Y-m-d');

        $bookings = Booking::query()->whereBetween('date', [$from, $to])
            ->get();

        return DataTables::of($bookings)
            ->addIndexColumn()
            ->addColumn('kode_booking', fn ($booking) => $booking->number)
            ->addColumn('customer_name', fn ($booking) => $booking->user?->name)
            ->addColumn('customer_email', fn ($booking) => $booking->user->email)
            ->addColumn('status', function ($booking) {
                $status = '';
                if ($booking->status == 'confirmed') {
                    $status =
                        '<span class="badge bg-success">' . $booking->status . '</span>   ';
                } elseif ($booking->status == 'pending') {
                    $status =
                        '<span class="badge bg-warning">' . $booking->status . '</span>   ';
                } elseif ($booking->status == 'cancelled') {
                    $status =
                        '<span class="badge bg-danger">' . $booking->status . '</span>   ';
                }
                return $status;
            })
            ->addColumn('nominal', function ($booking) {
                $status = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key'))
                ])
                    ->get('https://api.sandbox.midtrans.com/v2/' . $booking->number . '/status');

                $decodedStatus = json_decode($status);
                return 'Rp. ' . number_format($decodedStatus->gross_amount);
            })
            ->addColumn('action', function ($row) {
                $actionBtn =
                    '<a href="javascript:void(0)" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#showBooking" id=' . "'$row->id'" . '>
                    <i class="fas fa-eye"></i>
                </a>';
                return $actionBtn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $booking = Booking::find($id)->load('schedule');
        $status = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key'))
        ])
            ->get('https://api.sandbox.midtrans.com/v2/' . $booking->number . '/status');

        $decodedStatus = json_decode($status);
        return response()->json([
            'booking' => $booking,
            'details' => $decodedStatus
        ]);
    }
}
