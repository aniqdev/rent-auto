<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\{Caravan, Reservation};
use Carbon\Carbon;
use DateTime;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getSales($availabal_days = [])
    {
        $reservations = Reservation::where('end_date', '>',Carbon::now())
        ->where('status_id', '<>', 9)
        ->whereHas('caravan', function($query) {
            $query->where('tenerife', 0);})
        ->orderby('caravan_id')->orderby('start_date')->get();

        $caravans = Caravan::all();


        $caravan_id = 0;
        $start_date = 0;
        $end_date = 0;

    $result_array = [];
    foreach ($reservations as $reservation) {

        if ($caravan_id === $reservation->caravan_id) {

            $start_date = Carbon::parse($reservation->start_date);
            $end_date = Carbon::parse($end_date);


            $diff = $start_date->diffInDays($end_date) - 1;
            // $diff = $end_date->diffInDays($start_date);

            if (in_array($diff, $availabal_days)) {

                $item_arr = [
                    'caravan_id' => $reservation->caravan_id,
                    'avaliable_from' => $end_date->addDays(1)->format('Y-m-d'), //+1
                    // 'avaliable_from' => $end_date->format('Y-m-d'), //+1
                    'avaliable_to' => $reservation->start_date->subDays(1)->format('Y-m-d'), //-1
                    // 'avaliable_to' => $reservation->start_date->format('Y-m-d'), //-1
                    'day_diff' => $diff,
                    // 'price_from' => $reservation->caravan->price_from,
                    // 'caravan_name' => $reservation->caravan->name,
                    // 'caravan_img' => $reservation->caravan->thumbnail,
                    // 'caravan_slug' => $reservation->caravan->slug,
                    'reservation' => $reservation,
                    // 'start' =>  $end_date->addDays(1)->format('Y-m-d'),
                    // 'end' => $reservation->start_date->subDays(1)->format('Y-m-d'),

                ];

                $result_array[] = (object)$item_arr;


            }
        }

        $caravan_id = $reservation->caravan_id;
        $start_date = $reservation->start_date;
        $end_date = $reservation->end_date;





    }// foreach reservation
    return $result_array;

    }




    public function countOfDays($start_date, $end_date) {
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);

        return $end_date->diff($start_date)->format('%a') ;

        // - 1
    }

    public function getSeasonPriceByCaravan($caravan_id, $date) {
        $date = new DateTime($date);
        $caravan = Caravan::findOrFail($caravan_id);
        $season = $caravan->seasons()->where('start_date', '<=', $date->format('Y-m-d'))->where('end_date', '>=', $date->format('Y-m-d'))->first();
        $day_number = $date->format('N');

        return $season->pivot->{'day_' . $day_number};
    }

    public function calculatePrice($caravan_id, $start_date, $end_date, $accessories = null, $coupon = null, $discount_perc = null) {
        $startDate = new DateTime($start_date);
        $endDate = new DateTime($end_date);
        $total_price = 0;
        $first_day = true;

        while($startDate->format('Y-m-d') <= $endDate->format('Y-m-d')) {
            if($first_day) {
                $total_price += ($this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d')) / 2);
                $first_day = false;
            } else {
                if($startDate->format('Y-m-d') == $endDate->format('Y-m-d')) {
                    $total_price += ($this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d')) / 2);
                } else {
                    $total_price += $this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d'));
                }
            }

            $startDate->modify('+1 day');
        }


        if($this->countOfDays($start_date, $end_date) <= 9) {
            $total_price += 1680;
        }

        if ($this->check_if_sale($days = 3)) {

            $total_price = round($total_price * 0.9);
        }


        if ($this->check_if_sale($days = 4)) {
            $total_price = round($total_price * 0.95);
        }

        return $total_price;
    }









}
