<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Caravan,Coupon,Post,Reservation,Status,Review,ClientGallery};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class DashboardController extends Controller
{

    public function pdf_test()
    {
        $reservation = Reservation::find(220286 );
        $path = 'images/logo-original.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $price = $reservation->total_price;
        $rest = $price * 0.7;
        $deposite = $price * 0.3;
        $dph = $price *0.21;
        $price_per_one = $price - $dph;
        $deposite_pdh = $deposite * 0.21;
        $deposite_per_one = $deposite - $deposite_pdh;
        $extra_price = $reservation->extra_price;
        $extra_price_dph = $extra_price *0.21;
        $extra_price_no_dph = $extra_price - $extra_price_dph;
        $rekapitulace = $price_per_one - $deposite_per_one - $extra_price_no_dph;
        $rekapitulace_dph = $dph - $deposite_pdh - $extra_price_dph;
        $rekapitulace_price = $price - $deposite + $extra_price;
        $year = Carbon::now()->format('Y');
        $total_price = $price + $extra_price;
        return (PDF::loadView('admin.reservations.accountAccept',[
            'reservation' => $reservation,
            'price' => $reservation->total_price,
            'logo' => $logo,
            'rest' =>  $rest,
            'deposite' => $deposite,
            'dph' => $dph,
            'price_per_one' => $price_per_one,
            'deposite_pdh' => $deposite_pdh,
            'deposite_per_one' => $deposite_per_one,
            'rekapitulace' => $rekapitulace,
            'rekapitulace_dph' => $rekapitulace_dph,
            'rekapitulace_price' => $rekapitulace_price,
            'extra_price' => $extra_price,
            'extra_price_dph' => $extra_price_dph,
            'extra_price_no_dph' => $extra_price_no_dph,
            'total_price' => $total_price,
            'year' => $year,
        ]))->stream();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_date = Carbon::now()->formatLocalized('%d %B');
        $caravan_reserved = Caravan::whereHas('reservations', function($query) {
            $query->where('status_id', 7);
        })->count();
        $caravan_count = Caravan::all()->count();
        $posts = Post::limit(5)->get();
        $coupons = Coupon::where('active', 1)->limit(5)->get();

        $reservations = Reservation::where('status_id', '!=', 9)
            ->get();

        //dd($reservations->sum('total_price'));

        return view('admin.dashboard')
            ->with('caravan_reserved', $caravan_reserved)
            ->with('caravan_count', $caravan_count)
            ->with('current_date', $current_date)
            ->with('posts', $posts)
            ->with('coupons', $coupons)
            ->with('reservations', $reservations);
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

    public function readNotifications() {
        $notifications = DB::table('notifications');
    }

    public function options()
    {
        return view('admin.options');
    }


    public function rating()
    {
        $rating = Review::where('reting_service')->get();
        // $avarage_rating =
    }

    public function gallery()
    {
        $galleries = ClientGallery::orderBy('created_at', 'desc')->get();

        // $gallery_public_btn =
        return view('admin.gallery.index',[
            'galleries' => $galleries,
        ]);

    }

    public function galleryUpdate(Request $request)
    {
        $gallery = ClientGallery::find($request->gallery_id);
        $gallery->public_home = $request->new_status == 1 ? 1 : null;

        return [
            'status' => $gallery->save() ? 'ok' : 'error',
            // 'request' => $request->all(),
        ];

        // if (is_null($gallery->public_home)){
        //     $gallery->public_home = 1;
        // }else{
        //     $gallery->public_home = null;
        // }

        // $gallery->save();
        // return redirect()->back();
    }

    public function galleryDelete(ClientGallery $gallery)
    {
        $gallery->delete();
        return redirect()->back();
    }
    // public function galleryShow(ClientGallery $gallery)
    // {
    //     // dd($gallery);
    //     return view('admin.gallery.show',[
    //         'gallery' => $gallery,
    //     ]);
    // }
}
