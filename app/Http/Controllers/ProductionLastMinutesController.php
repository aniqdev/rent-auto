<?php

namespace App\Http\Controllers;

use App\Models\{ProductionLastMinutes, };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductionLastMinutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('production-last-minutes.index',[

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
     * @param  \App\Models\ProductionLastMinutes  $productionLastMinutes
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionLastMinutes $productionLastMinutes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionLastMinutes  $productionLastMinutes
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionLastMinutes $productionLastMinutes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionLastMinutes  $productionLastMinutes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionLastMinutes $productionLastMinutes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionLastMinutes  $productionLastMinutes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionLastMinutes $productionLastMinutes)
    {
        //
    }
}
