<?php

namespace App\Http\Controllers;

use App\Models\{Caravan,Review};
use App\Models\CaravanAttributeCategory;
use App\Models\CaravanCategory;
use App\Models\CaravanTab;
use App\Models\Lastminute;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CaravanController extends Controller
{
    public function check_if_sale($days)
    {
        $sale_arr = $this->getSales([$days]);


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
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {



        if ($slug === 'posll-2-win-r') {
            return redirect('/vozidlo/possl-2-win-r', 302);
        }


        $caravan = Caravan::where('slug', $slug)->firstOrFail();
        $tabs = $caravan->tabs;
        $storno_status = Status::where('name', 'Storno')->first();

        $avg_rating = $caravan->reviews_public->avg('rating_caravan') ?? 0;

        if($caravan->tenerife) {
            $min_days = 6;
        } else {
            /* if($caravan->id == 11) {
                $min_days = 2;
            } else { */
                $min_days = 3;
            /* } */
        }

        $reservations = $caravan->reservations()
            ->select('start_date AS start', 'end_date AS end')
            ->where('status_id', '!=', $storno_status->id)
            ->get();

        $now = Carbon::now()->toDateTimeString();
        $lastminutes = Lastminute::select('start_date AS start', 'end_date as end', 'started_at')
            ->where(function ($query) use ($now, $caravan) {
                $query->where('caravan_id', $caravan->id);
                $query->where('started_at', '<=', $now);
            })->get(['start', 'end']);

        if($lastminutes->count() < 1) {
            $lastminutes = collect([[
                'start' => '1970-01-01',
                'end' => '1970-02-02'
            ]])->toJson();
        }

        $sales = $this->getSales([3,4]);
        $sales = array_filter($sales, function($value) use ($caravan){
            // dd($value);
            return $value->caravan_id == $caravan->id;
        });

        $sales = array_values($sales);

        return view('caravans.show')
            ->with('caravan', $caravan)
            ->with('tabs', $tabs)
            ->with('reservations', $reservations)
            ->with('min_days', $min_days)
            ->with('sales', $sales)
            ->with('lastminutes', $lastminutes)
            ->with('avg_rating', $avg_rating);
    }


    public function compare() {
        $caravans = Caravan::all();
        $categories = CaravanCategory::all();
        /* $categories = CaravanCategory::active()
            ->orderBy('sort', 'ASC')
            ->get(); */

        return view('caravans.compare')
            ->with('caravans', $caravans)
            ->with('categories', $categories);
    }
}
