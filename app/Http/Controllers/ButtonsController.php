<?php

namespace App\Http\Controllers;

use App\Models\{Buttons, Reservation};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ButtonsController extends Controller
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
        $buttons = new Buttons;

        $buttons->user_id = Auth::id();
        $buttons->reservation_id = Reservation::id();
        $buttons->contract = $request->contract;
        $buttons->bail = $request->bail;

        // if ($buttons->save()) {
        //     flash('Button bylo úspešně vytvořeno.')->success();
        // } else {
        //     flash('Button se nepodařilo vytvořit.')->error();
        // }

        return redirect()
            ->route('admin.prislusenstvi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buttons  $buttons
     * @return \Illuminate\Http\Response
     */
    public function show(Buttons $buttons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buttons  $buttons
     * @return \Illuminate\Http\Response
     */
    public function edit(Buttons $buttons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buttons  $buttons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buttons = Buttons::findOrFail($id);

        $buttons->user_id = Auth::id();
        $buttons->reservation_id = Reservation::id();
        $buttons->contract = $request->contract;
        $buttons->bail = $request->bail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buttons  $buttons
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buttons $buttons)
    {
        //
    }
}
