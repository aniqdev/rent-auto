<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Caravan,Discount};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Discount::all();

        return view('admin.discounts.index')
            ->with('rules', $rules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caravans = Caravan::all();

        return view('admin.discounts.create')
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
        $rule = new Discount;

        $rule->user_id = Auth::id();
        $rule->name = $request->name;
        $rule->description = $request->description;
        $rule->flag = $request->flag;
        $rule->priority = $request->priority;
        $rule->started_at = $request->started_at;
        $rule->ended_at = $request->ended_at;
        $rule->min_price = $request->min_price ?? 0;
        $rule->min_days = $request->min_days ?? 0;
        $rule->max_days = $request->max_days ?? 0;
        $rule->quantity = $request->quantity ?? 0;
        $rule->start_date = $request->start_date;
        $rule->end_date = $request->end_date;
        $rule->register_restriction = (isset($request->restrictions) && in_array('register', $request->restrictions)) ? 1 : 0;
        $rule->caravan_restriction = (isset($request->restrictions) && in_array('caravan', $request->restrictions)) ? 1 : 0;
        $rule->reduction_percent = (isset($request->reductions) && in_array('percent', $request->reductions)) ? $request->amount : 0;
        $rule->reduction_amount = (isset($request->reductions) && in_array('amount', $request->reductions)) ? $request->amount : 0;
        $rule->reduction_days = (isset($request->reductions) && in_array('days', $request->reductions)) ? $request->amount : 0;
        $rule->active = ($request->active) ? 1 : 0;

        $rule->save();

        if($rule->caravan_restriction) {
            foreach($request->caravans as $caravan) {
                $rule->caravans()->attach($caravan);
            }
        }

        if($rule->id !== null && !empty($rule->id)) {
            flash('Pravidlo bylo úspešně vytvořeno.')->success();
        } else {
            flash('Pravidlo se nepodařilo vytvořit.')->error();
        }

        return redirect()
            ->route('admin.slevy.index');
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
