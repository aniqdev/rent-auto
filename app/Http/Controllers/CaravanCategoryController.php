<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCaravansByDateRangeRequest;
use App\Models\Caravan;
use App\Models\CaravanCategory;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaravanCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchCaravansByDateRangeRequest $request)
    {

        if ($request === 'kategorie') {
            return redirect('/pujcovna-praha', 302);
        }


        if($request->has('dateFrom') && !empty($request->dateFrom) && $request->has('dateTo') && !empty($request->dateTo)) {
            $date_from = Carbon::parse($request->dateFrom)->format('Y-m-d');
            $date_to = Carbon::parse($request->dateTo)->format('Y-m-d');

            $reservations = Reservation::whereBetween('start_date', [$date_from, $date_to])
                ->orWhereBetween('end_date', [$date_from, $date_to])
                ->orWhere(function($q) use ($date_from, $date_to) {
                    $q->where('start_date', '<=', $date_from)->where('end_date', '>=', $date_to);
                })->get();

            $reservations = $reservations->where('status_id', '!=', 9)->pluck('caravan_id');

            $caravans = Caravan::whereNotIn('id', $reservations)->where('tenerife', 0)->active()->orderBy('sort', 'ASC')->get();

            $categories = CaravanCategory::with(['caravans' => function ($query) use ($reservations) {
                $query->active();
                $query->where('tenerife', 0);
                $query->whereNotIn('id', $reservations);
            }])->orderBy('sort', 'ASC')->get();
        } else {
            $caravans = Caravan::where('tenerife', 0)->active()->orderBy('sort', 'ASC')->get();
            $categories = CaravanCategory::with(['caravans' => function ($query) {
                $query->active();
                $query->where('tenerife', 0);
            }])->orderBy('sort', 'ASC')->get();
        }


        return view('caravancategories.index')
            ->with('categories', $categories)
            ->with('caravans', $caravans);
    }
}


// ->where('tenerife', 0)
