<?php

namespace App\View\Components\Admin\Profile;

use Illuminate\View\Component;

class Account extends Component
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
        $admin = auth()->guard('admin')->user();
        return view('components.admin.profile.account', [
            'admin' => $admin
        ]);
    }
}
