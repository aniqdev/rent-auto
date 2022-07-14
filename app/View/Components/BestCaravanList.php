<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BestCaravanList extends Component
{
    public $caravans;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caravans)
    {
        $this->caravans = $caravans;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.best-caravan-list');
    }
}
