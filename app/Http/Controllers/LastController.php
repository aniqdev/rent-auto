<?php

namespace App\Http\Controllers;

use App\Models\{Last, Caravan, Reservation, Calendar, CaravanCategory, Accessory, Coupon, Season, Status, User};
use Illuminate\Support\Facades\Auth;
use DateTime;

use App\Http\Requests\SearchCaravansByDateRangeRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class LastController extends Controller
{

    public function check_if_sale_last($days)
    {
        $sale_arr = $this->getSales([$days]);

        // dd($sale_arr);

        foreach ($sale_arr as $sale_item) {
            // dump(request('start_date') === $sale_item->avaliable_from);
            // dump(request('end_date') === $sale_item->avaliable_to);
            // dump(request('caravan') == $sale_item->reservation->caravan->id);
            // dump($sale_item->avaliable_from);
            if (
            request('start_date') === $sale_item->avaliable_from &&
            request('end_date') === $sale_item->avaliable_to &&
                (
                    request('caravan') == $sale_item->reservation->caravan->id ||
                    request('caravan_id') == $sale_item->reservation->caravan->id
                )
            ){
                return true;
            }

        }
        // dd(1);
        return false;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchCaravansByDateRangeRequest $request)
    {
        $caravans = Caravan::get();

        foreach ($caravans as $key => $caravan) {
            # code...
        }

        // $reservations = Reservation::with('status')
        // ->get();

        $sales = $this->getSales([3,4]);
        // dump($sales);
        foreach ($sales as $key => &$sale) {
            // dump($sale);
            $sale->price = $this->calculatePriceForSales($sale->caravan_id, $sale->avaliable_from, $sale->avaliable_to, $sale->day_diff);
        }
        // $salece = $this->calculatePrice($sale->caravan_id, $sale->avaliable_from, $sale->avaliable_to,);
        // dd($sales);






        // dump($sale);
        // dd($sales);
        // $sales = array_filter($sales, function($value) use ($caravan){
        //     // dd($value);
        //     return $value->caravan_id == $caravan->id;
        // });

        // $sales = array_values($sales);

        // dd($sales);

        return view('last.index', [
            'result_array' => $sales,
            'sales' => $sales,
            // 'price' => $price,
            // 'reservations' => $reservations,

        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Last  $last
     * @return \Illuminate\Http\Response
     */
    public function show( $slug )
    {

        $caravan = Caravan::where('slug', $slug)->firstOrFail();
        $tabs = $caravan->tabs;
        // $discount =
        return view('last.show', [
            'caravan' => $caravan,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Last  $last
     * @return \Illuminate\Http\Response
     */
    public function edit(Last $last)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Last  $last
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Last $last)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Last  $last
     * @return \Illuminate\Http\Response
     */
    public function destroy(Last $last)
    {
        //
    }

    public function getSeasonPriceByCaravan($caravan_id, $date) {
        $date = new DateTime($date);
        $caravan = Caravan::findOrFail($caravan_id);
        $season = $caravan->seasons()->where('start_date', '<=', $date->format('Y-m-d'))->where('end_date', '>=', $date->format('Y-m-d'))->first();
        $day_number = $date->format('N');

        return $season->pivot->{'day_' . $day_number};
    }

    public function calculatePriceForSales($caravan_id, $start_date, $end_date, $days) {
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

            $total_price += 1680;

        if ($days = 3) {

            $total_price = round($total_price * 0.9);
        }


        if ($days = 4) {
            $total_price = round($total_price * 0.95);
        }

        return $total_price;
    }


}
