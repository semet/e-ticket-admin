<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $user = User::all();


            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('name', fn ($user) => (string)$user->name)
                ->addColumn('username', fn ($user) => $user->username)
                ->addColumn('email', fn ($user) => $user->email)
                ->addColumn('phone', fn ($user) => $user->phone)
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
