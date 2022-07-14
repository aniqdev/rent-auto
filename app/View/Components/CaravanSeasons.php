<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CaravanSeasons extends Component
{
    public $caravan;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caravan)
    {
        $this->caravan = $caravan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.caravan-seasons');
    }
}
