<?php

namespace App\View\Components\Admin\Home;

use App\Models\Booking;
use Illuminate\View\Component;

class UserCount extends Component
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
        $data = Booking::with('passengers')
            ->get()
            ->map(function ($booking) {
                return count($booking->passengers);
            });
        return view('components.admin.home.user-count', [
            'data' => $data[0]
        ]);
    }
}
