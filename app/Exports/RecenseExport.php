<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\Reservation;


class RecenseExport implements FromCollection, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reservations = Reservation::select(['email', 'name', 'last_name', 'id', 'start_date', 'end_date'])
            ->get();

        return $reservations;
    }
}
