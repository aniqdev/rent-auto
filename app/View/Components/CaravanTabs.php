<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CaravanTabs extends Component
{
    public $caravan;
    public $tabs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caravan, $tabs)
    {
        $this->caravan = $caravan;
        $this->tabs = $tabs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.caravan-tabs');
    }
}
