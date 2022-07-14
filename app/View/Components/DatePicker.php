<?php

// namespace App\View\Components;

// use App\Models\Lastminute;
// use Carbon\Carbon;
// use Illuminate\View\Component;

// class DatePicker extends Component
// {
//     public $lastminutes;

//     /**
//      * Create a new component instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $now = Carbon::now()->toDateTimeString();
//         $this->lastminutes = Lastminute::select('start_date AS start', 'end_date as end', 'started_at')
//             ->where(function($query) use ($now) {
//                 $query->where('started_at', '<=', $now);
//             })->get(['start', 'end']);

//         if(empty($this->lastminutes)) {
//             $this->lastminutes = collect([[
//                 'start' => '1970-01-01',
//                 'end' => '1970-02-02'
//             ]])->toJson();
//         }
//     }

//     /**
//      * Get the view / contents that represent the component.
//      *
//      * @return \Illuminate\Contracts\View\View|\Closure|string
//      */
//     public function render()
//     {
//         return view('components.date-picker');
//     }
// }
