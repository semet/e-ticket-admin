<?php

namespace App\View\Components\Admin\Home;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\View\Component;
use Schema;

class TodayFlight extends Component
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
        $today = now()->format('Y-m-d');

        $schedules = Schedule::whereHas('bookings', function (Builder $query) use ($today) {
            $query->where('date',   $today);
        })
            ->with('bookings', function ($query) {
                return $query->withCount('passengers');
            })
            ->get();

        return view('components.admin.home.today-flight', [
            'schedules' => $schedules
        ]);
    }
}
