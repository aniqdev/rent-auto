<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Caravan,Reservation};
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a results of the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $reservations = Reservation::select('id', 'name', 'last_name', 'phone', 'email', 'company', 'ico', 'dic')
            ->where('id', 'LIKE', "%{$request->text}%")
            ->orWhere('name', 'LIKE', "%{$request->text}%")
            ->orWhere('last_name', 'LIKE', "%{$request->text}%")
            ->orWhere('phone', 'LIKE', "%{$request->text}%")
            ->orWhere('email', 'LIKE', "%{$request->text}%")
            ->orWhere('company', 'LIKE', "%{$request->text}%")
            ->orWhere('ico', 'LIKE', "%{$request->text}%")
            ->orWhere('dic', 'LIKE', "%{$request->text}%")
            ->get();

        $reservations->map(function($reservation) {
            $reservation['type'] = 'reservation';

            return $reservation;
        });

        $caravans = Caravan::select('id', 'name')
            ->where('name', 'LIKE', "%{$request->text}%")
            ->get();

        $caravans->map(function($caravan) {
            $caravan['type'] = 'caravan';

            return $caravan;
        });

        $results = $reservations->merge($caravans);

        return response()->json($results);
    }
}
