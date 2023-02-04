<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PassengerController extends Controller
{
    public function index()
    {
        return view('admin.passenger.index');
    }

    public function getPassengers(Request $request)
    {
        if ($request->ajax()) {
            $passenger = Passenger::all();


            return DataTables::of($passenger)
                ->addIndexColumn()
                ->addColumn('nik', fn ($passenger) => (string)$passenger->nik)
                ->addColumn('name', fn ($passenger) => $passenger->name)
                ->addColumn('email', fn ($passenger) => $passenger->email)
                ->addColumn('action', function ($row) {
                    $actionBtn =
                        '<a href="javascript:void(0)" class="btn btn-info btn-sm text-white">
                        <i class="fas fa-eye"></i>
                    </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
