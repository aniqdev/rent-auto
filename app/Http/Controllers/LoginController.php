<?php

namespace App\Http\Controllers;

use App\Models\Caravan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if(!Auth::check()) {
            $caravans = Caravan::withCount('reservations')
                ->where('active', 1)
                ->where('tenerife', 0)
                ->orderBy('reservations_count', 'DESC')
                ->limit(4)
                ->get();

            return view('login.login')
                ->with('caravans', $caravans);
        } else {
            return redirect()->route('prihlaseni.profile');
        }
    }

    public function profile()
    {
        if (Auth::check()) {
            $user = User::findOrFail(Auth::id());
            $reservations = $user->reservations()->get();

            //dd($reservations);

            return view('login.profile')
                ->with('user', $user);
        } else {
            return redirect()->route('prihlaseni.login');
        }
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
