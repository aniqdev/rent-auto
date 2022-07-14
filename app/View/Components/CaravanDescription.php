<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CaravanDescription extends Component
{
    public $floor_plan;
    public $video;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($video, $floorplan)
    {
        $this->video = $video;
        $this->floor_plan = $floorplan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.caravan-description');
    }
}
