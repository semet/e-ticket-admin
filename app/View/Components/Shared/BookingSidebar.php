<?php

namespace App\View\Components\Shared;

use App\Models\Destination;
use App\Models\Schedule;
use Illuminate\View\Component;

class BookingSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Destination $destination,
        public int $quantity,
        public string $date,
        public string $time,
        public string $packet = ''
    )
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
        $bookingTime = Schedule::find($this->time);
        return view('components.shared.booking-sidebar', [
            'bookingTime' => $bookingTime
        ]);
    }
}
