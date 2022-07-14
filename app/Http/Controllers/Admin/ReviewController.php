<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Caravan,Coupon,Post,Reservation,Status,Review};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{

    public function preIndex()
    {
        $reviews = Review::get()->all();

        // $last_key = end(array_keys($reviews));
        foreach ($reviews as $key => $review) {
            # code...
        }
        return view('admin.review.preindex',[
            'reviews' => $reviews,
            'review' => $review,
        ]);
    }

    public function review()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get()->all();
        // dd($reviews[0]->recense_service);

        return view('admin.review.index',[
        'reviews' => $reviews,
    ]);
    }

    public function reviewShow(Review $review)
    {
        return view('admin.review.show', [
            'review' => $review,
        ] );
    }

    public function reviewUpdateServis(Review $review)
    {
        if (is_null($review->public)){
            $review->public = 1;
        }else{
            $review->public = null;
        }

        $review->save();
        return redirect()->back();

    }

    public function reviewUpdateCaravan(Review $review)
    {
        if (is_null($review->public_caravan)){
            $review->public_caravan = 1;
        }else{
            $review->public_caravan = null;
        }

        $review->save();
        return redirect()->back();
    }

    public function reviewDelete(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.review', $review);
    }
}
