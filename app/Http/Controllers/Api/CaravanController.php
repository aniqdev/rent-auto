<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Caravan;
use App\Models\Season;
use Database\Seeders\CaravanSeeder;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaravanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getFreeCaravans($start_date, $end_date) {
        // Find in reservations
    }

    public function getPrice($caravan_id, $start_date, $end_date) {
        //$caravan = Caravan::findOrFail($caravan_id);
        $total_price = 0;

        $start_date = new DateTime($start_date);
		$end_date = new DateTime($end_date);

		//while($start_date->format('Y-m-d') <= $end_date->format('Y-m-d')) {
		while($start_date->format('Y-m-d') < $end_date->format('Y-m-d')) {
            $total_price += $this->getSeasonPriceByCaravan($caravan_id, $start_date->format('Y-m-d'));

            /* $season = $caravan->seasons()->where('start_date', '<=', $start_date->format('Y-m-d'))->where('end_date', '>=', $start_date->format('Y-m-d'))->first();

            $day_number = $start_date->format('N');
            $total_price += $season->pivot->{'day_' . $day_number}; */

            /* echo '<pre>';

            var_dump($start_date->format('d.m.Y') . ' -> ' . $season->pivot->{'day_' . $day_number} . ' | ' . $season->id . ' | ' . $day_number);

            echo '</pre>'; */

            $start_date->modify('+1 day');
        }

        if(Auth::id()) {
            $user_discount = Auth::user()->discount;

            if($user_discount != 0) {
                $discount = ($total_price / 100) * $user_discount;
                $total_price = $total_price - $discount;
            }
        }

        var_dump($total_price);
    }

    public function getSeasonByDate($date) {
        $date = new DateTime($date);
        $season = Season::where('start_date', '<=', $date->format('Y-m-d'))->where('end_date', '>=', $date->format('Y-m-d'))->first();

        return $season;
    }

    public function getSeasonPriceByCaravan($caravan_id, $date) {
        $date = new DateTime($date);
        $caravan = Caravan::findOrFail($caravan_id);
        $season = $caravan->seasons()->where('start_date', '<=', $date->format('Y-m-d'))->where('end_date', '>=', $date->format('Y-m-d'))->first();
        $day_number = $date->format('N');
        
        return $season->pivot->{'day_' . $day_number};
    }
}
