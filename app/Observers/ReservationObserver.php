<?php

namespace App\Observers;

use App\Models\History;
use App\Models\Reservation;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class ReservationObserver
{
    /**
     * Handle the Reservation "created" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function created(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "updated" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function updated(Reservation $reservation)
    {
        /* $new_state = Status::find($reservation->status_id);
        $old_state = Status::find($reservation->getOriginal('status_id'));

        $value = 'Uživatel změnil status z ' . $old_state . ' na ' . $new_state;

        $reservation->history()->attach(Auth::id(), [
            'value' => $value
        ]); */
    }

    /**
     * Handle the Reservation "deleted" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function deleted(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "restored" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "force deleted" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        //
    }
}
