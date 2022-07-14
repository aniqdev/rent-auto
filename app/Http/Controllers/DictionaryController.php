<?php

namespace App\Http\Controllers;

use App\Models\Caravan;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictionaries = Dictionary::whereNotNull('published_at')
            ->orderBy('name')
            ->get();

        $dictionaries = $dictionaries->groupBy(function($item, $key) {
            return strtoupper(mb_substr($item->name, 0, 1));
        });

        $caravans = Caravan::withCount('reservations')
            ->where('active', 1)
            ->where('tenerife', 0)
            ->orderBy('reservations_count', 'DESC')
            ->limit(4)
            ->get();

        return view('dictionaries.index')
            ->with('dictionaries', $dictionaries)
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $dictionary = Dictionary::where('slug', $slug)->first();

        return view('dictionaries.show')
            ->with('dictionary', $dictionary)
            ->withShortcodes();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function edit(Dictionary $dictionary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dictionary $dictionary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dictionary $dictionary)
    {
        //
    }
}
