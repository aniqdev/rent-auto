<?php

namespace App\View\Components;

use App\Models\Reservation;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Notification extends Component
{
    public $notifications;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->notifications = DB::table('notifications')
            ->where('type', 'App\Notifications\ReservationStore')
            ->whereNull('read_at')
            ->leftJoin('reservations', 'notifications.notifiable_id', 'reservations.id')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
