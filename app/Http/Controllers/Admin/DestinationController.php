<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::orderBy('type')->get();
        return view('admin.destination.index', [
            'destinations' => $destinations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);

        return view('admin.destination.edit', [
            'destination' => $destination
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
            'seat_count' => 'required',
            'location' => 'required',
            'thumbnail' => File::types(['jpg', 'jpeg', 'png'])
        ]);
        $destination = Destination::find($id);
        $destination->name = $request->name;
        $destination->price = $request->price;
        $destination->type = $request->type;
        $destination->seat_count = $request->seat_count;
        $destination->map_url = $request->map_url;
        $destination->location = $request->location;
        $destination->description = $request->description;

        if ($request->hasFile('thumbnail')) {
            $result = $request->file('thumbnail')->storeOnCloudinary();

            $destination->thumbnail = $result->getPath();
        }

        $destination->save();

        return back()->with('success', 'Data destinasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
