<?php

namespace App\View\Components\Partials\Admin;

use App\Models\Destination;
use Illuminate\View\Component;

class Sidebar extends Component
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
        $destinations = Destination::where('status', 'ready')->get();
        return view('components.partials.admin.sidebar',  [
            'destinations' => $destinations
        ]);
    }
}
