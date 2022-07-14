<?php

namespace App\View\Components;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Header extends Component
{
    public $home_route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($homeRoute)
    {
        $this->home_route = $homeRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
