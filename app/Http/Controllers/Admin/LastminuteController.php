<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Caravan,Lastminute};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LastminuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastminutes = Lastminute::all();

        return view('admin.lastminutes.index')
            ->with('lastminutes', $lastminutes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('Vytvořit lastminute')) {
            return redirect()->route('admin.dashboard');
        }

        $caravans = Caravan::all();

        return view('admin.lastminutes.create')
            ->with('caravans', $caravans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastminute = new Lastminute;

        $lastminute->user_id = Auth::id();
        $lastminute->caravan_id = $request->caravan_id;
        $lastminute->name = $request->name;
        $lastminute->description = $request->description;
        $lastminute->discount = $request->discount;
        $lastminute->start_date = $request->start_date;
        $lastminute->end_date = $request->end_date;
        $lastminute->started_at = $request->started_at;
        $lastminute->ended_at = $request->ended_at;

        if($lastminute->save()) {
            flash('Termín byl úspešně vytvořen.')->success();
        } else {
            flash('Termín se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.lastminute.index');
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
        $lastminute = Lastminute::findOrFail($id);
        $caravans = Caravan::all();

        return view('admin.lastminutes.edit')
            ->with('lastminute', $lastminute)
            ->with('caravans', $caravans);
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
        $lastminute = Lastminute::findOrFail($id);

        $lastminute->caravan_id = $request->caravan_id;
        $lastminute->name = $request->name;
        $lastminute->description = $request->description;
        $lastminute->discount = $request->discount;
        $lastminute->start_date = $request->start_date;
        $lastminute->end_date = $request->end_date;
        $lastminute->started_at = $request->started_at;
        $lastminute->ended_at = $request->ended_at;

        if($lastminute->save()) {
            flash('Termín byl úspešně upraven.')->success();
        } else {
            flash('Termín se nepodařilo upravit.')->error();
        }

        return redirect()
            ->route('admin.lastminute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('Smazat příslušenství')) {
            return redirect()->route('admin.dashboard');
        }

        $lastmin = Lastminute::findOrFail($id);

        if($lastmin->delete()) {
            flash('Příslušenství ' . $lastmin->name . ' bylo úspešně smazáno.')->success();
        } else {
            flash('Něco se pokazilo, příslušenství ' . $lastmin->name . ' nebylo smazáno.')->error();
        }

        return redirect()->route('admin.lastminute.index');
    }

    public function restore($id) {
        if(!auth()->user()->hasPermissionTo('Smazat lastminute')) {
            return redirect()->route('admin.dashboard');
        }

        $lastminute = Lastminute::withTrashed()->findOrFail($id);

        if($lastminute->restore()) {
            flash('Lastminute ' . $lastminute->name . ' byl úspešně obnoven.')->success();
        } else {
            flash('Něco se pokazilo, lastminute ' . $lastminute->name . ' nebyl obnoven.')->error();
        }

        return redirect()->route('admin.lastminute.index');
    }
}
