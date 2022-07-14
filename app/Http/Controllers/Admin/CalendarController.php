<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Caravan,Reservation};
use Illuminate\Http\Request;

class CalendarController extends Controller
{


    public function lastMinuteSale()
    {
        // $caravans = Caravan::with(['reservations' => function($query) {
        //     $query->where('status_id', '!=', 9);
        // }, 'reservations.status', 'reservations.accessories'])->get();

        // dd($caravans);

        // return;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->hasPermissionTo('Zobrazit kalendář')) {
            return redirect()->route('admin.dashboard');
        }

        $caravans = Caravan::with(['reservations' => function($query) {
            $query->where('status_id', '!=', 9);
        }, 'reservations.status', 'reservations.accessories'])->get();

        // dd($caravans);

        //$reservations = Reservation::all();

        return view('admin.calendars.index')
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
}
