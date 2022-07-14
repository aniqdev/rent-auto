<?php

namespace App\Http\Controllers;

use App\Models\CaravanTenerife;
use Illuminate\Http\Request;
use App\Http\Requests\SearchCaravansByDateRangeRequest;
use App\Models\{Caravan, Post};
use App\Models\CaravanCategory;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CaravanTenerifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tenerife(SearchCaravansByDateRangeRequest $request)
    {
        if($request->has('dateFrom') && !empty($request->dateFrom) && $request->has('dateTo') && !empty($request->dateTo)) {
            $date_from = Carbon::parse($request->dateFrom)->format('Y-m-d');
            $date_to = Carbon::parse($request->dateTo)->format('Y-m-d');

            $reservations = Reservation::whereBetween('start_date', [$date_from, $date_to])
                ->orWhereBetween('end_date', [$date_from, $date_to])
                ->orWhere(function($q) use ($date_from, $date_to) {
                    $q->where('start_date', '<=', $date_from)->where('end_date', '>=', $date_to);
                })->get();

            $reservations = $reservations->where('status_id', '!=', 9)->pluck('caravan_id');

            $caravans = Caravan::whereNotIn('id', $reservations)->where('tenerife', 1)->active()->orderBy('sort', 'ASC')->get();

            $categories = CaravanCategory::with(['caravans' => function ($query) use ($reservations) {
                $query->active();
                $query->where('tenerife', 1);
                $query->whereNotIn('id', $reservations);
            }])->orderBy('sort', 'ASC')->get();
        } else {
            $caravans = Caravan::where('tenerife', 1)->active()->orderBy('sort', 'ASC')->get();
            $categories = CaravanCategory::with(['caravans' => function ($query) {
                $query->active();
                $query->where('tenerife', 1);
            }])->orderBy('sort', 'ASC')->get();
        }




        $posts = Post::whereIn('id', [3,4,5])
        ->get();

        return view('caravancategories.tenerife')
            ->with('categories', $categories)
            ->with('posts', $posts)
            ->with('caravans', $caravans);
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
     * @param  \App\Models\CaravanTenerife  $caravanTenerife
     * @return \Illuminate\Http\Response
     */
    public function show(CaravanTenerife $caravanTenerife)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaravanTenerife  $caravanTenerife
     * @return \Illuminate\Http\Response
     */
    public function edit(CaravanTenerife $caravanTenerife)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaravanTenerife  $caravanTenerife
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaravanTenerife $caravanTenerife)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaravanTenerife  $caravanTenerife
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaravanTenerife $caravanTenerife)
    {
        //
    }
}
