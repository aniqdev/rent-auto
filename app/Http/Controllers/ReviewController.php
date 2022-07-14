<?php

namespace App\Http\Controllers;

use App\Models\{Review, Reservation, Caravan};
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caravan = Caravan::orderBy('sort', 'ASC');
        // $reservations = Reservation::orderBy('sort', 'ASC');
        $reviews = Review::get()->all();
        $reservations = Reservation::limit(30)->get()->all();
        return view('reviews.index',[
            'caravan' => $caravan,
            'reservations' => $reservations,
            'reviews' => $reviews,
        ]);
    }

    // public function indexTenerife()
    // {
    //     return view('reviews.indexTenerife');
    // }
    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function show($id)
    {
        // $caravan = Caravan::findOrFail($id);
        $reservation = Reservation::withTrashed()
        ->findOrFail($id);


        $sign = hash_hmac('sha256', $id, env('HMAC_SECRET'), true);

        $sign = $this->base64url_encode($sign);

        if ($sign === request('sign')) {
            return view('reviews.show')
            ->with('reservation', $reservation);
        }else{
            return abort(401);
        }

        return view('reviews.show')
            ->with('reservation', $reservation);
            // ->with('caravan', $caravan);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
			'recense_caravan' => ' required:recense_caravan|string|max:10000',
			'recense_service' => ' required:recense_service|string|max:10000',
            'rating_service' => 'required',
            'rating_caravan' => 'required',
            'reservation_id' => 'required',
            'caravan_id' => 'required',
		];


        $message =         [
            'name.required' => 'Vyplňte prosím jmeno',
            'recense_service.required' => 'Vyplňte prosím recense caravan',
            'recense_caravan.required' => 'Vyplňte prosím recense servise',
        ];


        $data = $request->validate($rules, $message);



        Review::create($data);


        return view('reviews.thanks');
        // return redirect('reviews.thanks')->route('reviews.thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */


    public function thanks()
    {
        return view('reviews.thanks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
