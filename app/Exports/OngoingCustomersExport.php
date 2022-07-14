<?php

namespace App\Exports;

use App\Models\Reservation;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class OngoingCustomersExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        $current_year = Carbon::now()->year;

        $reservations = Reservation::select(['id', 'caravan_id', 'start_date', 'end_date', 'name', 'last_name', 'email', 'phone'])
            ->where('status_id', 8)
            ->whereRaw("YEAR(start_date) < ?", [$current_year])
            ->get();

        foreach($reservations as $key => $reservation) {
            $check_current = Reservation::where('email', $reservation->email)
                ->whereRaw("YEAR(start_date) = ?", [$current_year])
                ->count();

            if($check_current > 0) {
                $reservations->forget($key);
            }
        }

        return $reservations->unique('email');
    }

    public function headings(): array
    {
        return [
            'Rezervace',
            'Karavan',
            'Datum zapůjčení od',
            'Datum zapůjčení do',
            'Jméno',
            'Příjmení',
            'E-mail',
            'Telefon',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_TEXT,
        ];
    }
}
