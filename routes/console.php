<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Notification;
use App\Models\{Reservation, Caravan, Notes, Post, User, Review, Survey, Accessory};
use App\Notifications\ReservationCancel;
use App\Notifications\{OrderShipped,RecenseSend};
use App\Notifications\ReservationStoreAdmin;
use Carbon\Carbon;
use App\Models\Status;
use App\Models\CaravanCategory;
use App\Models\Faktura;


use App\Notifications\RestPayCz;
use App\Notifications\RestPayTn;
use App\Notifications\RestPayCzSecond;
use App\Notifications\RestPayTnSecond;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Artisan:: command('filter-data', function(){
    $caravans = Caravan::all();

    $filter_data = [];
    $transmission = [];
    $motor = [];
    $concerns = [];
    $colors = [];
    foreach ($caravans as $caravan) {
        $filter_data['concerns'][] = $caravan->concern;
        $filter_data['colors'][] = $caravan->color;
        $filter_data['transmission'][] = $caravan->transmission;
        $filter_data['motor'][] = $caravan->motor;
    }

    foreach ($filter_data as &$parametr) {
        $parametr = array_unique($parametr);
    }
    // $concerns = array_unique($concerns);
    // $colors = array_unique($colors);
    print_r($filter_data);
    // print_r($colors);
});

Artisan::command('user', function()
{
    $users = User::where('admin', '=', 1)->get();

    $reservations = Reservation::were('id', '=',  );



    foreach ($users as $user) {
        print_r([
            'name' => $user->name,
            'last_name' => $user->last_name,
        ]);
    }


    foreach ($reservations as $reserv) {
        print_r([
            'note' => $reserv->note,
            'update' => $reserv->updated_at,
        ]);
    }



});



Artisan::command('reserv', function () {

    $reservations = Reservation::where('end_date', '>',Carbon::now())
        ->where('status_id', '<>', 9)->orderby('caravan_id')->orderby('start_date')->get();

    $caravans = Caravan::all();


    $caravan_id = 0;
    $start_date = 0;
    $end_date = 0;

    foreach ($reservations as $reservation) {
    //    echo($reservation->start_date);
    //    echo PHP_EOL;
    if ($caravan_id === $reservation->caravan_id) {
        // $days = $reservation->start_date - $end_date;
        $start_date = Carbon::parse($reservation->start_date);
        $end_date = Carbon::parse($end_date);

        $diff = $start_date->diffInDays($end_date);
        // print_r([
        //     'reservation' => $reservation->id,
        //     'caravan' => $reservation->caravan_id,
        //     'diff with prev' => $diff,

        // ]);
        if ($diff === 3 || $diff === 4) {
            print_r([
                'avalibal ' => $reservation->caravan_id,
                'avaliable_from' => $end_date->addDays(1)->format('Y-m-d'), //+1
                'avaliable_to' => $reservation->start_date->subDays(1)->format('Y-m-d'), //-1
                // 'price_start' => $reservation->base_price,
            ]);
        }
    }
       print_r($reservation->attributesToArray());

       $caravan_id = $reservation->caravan_id;
       $start_date = $reservation->start_date;
       $end_date = $reservation->end_date;

    }
});


// in_array($diff, [1,2,3,4,5,]);




Artisan::command('near', function () {
    $now = Carbon::now();
    $days = Carbon::now()->subDays(10);
    $nearest_reservations = Reservation::whereHas('caravan', function($query) {
            $query->where('tenerife', 0);
        })->where('status_id', '!=', 8)
        ->where('status_id', '!=', 9)
        // ->where('status_id', '!=', 6)
        ->where('status_id', '!=', 1)
        // ->where('status_id', '!=', 7)
        // ->where('contract', 0)
        // ->where('bail', 0)
        // ->where('start_date', '>=', $now->subDays(10)->format('Y-m-d'))
        // ->where('start_date', '<=', $now->addDays(10)->format('Y-m-d'))
        ->where('start_date', '>=', $days->format('Y-m-d'))
        ->where('start_date', '>=', $now->format('Y-m-d'))
        ->orderBy('start_date', 'asc')
        ->get(['id', 'start_date', 'end_date'])->toArray();

        print_r($nearest_reservations) ;
});


Artisan::command('note', function() {
    $notes = Notes::whereHas('users', function($q) {
        $q->with('name');
    });

    print_r($notes);
});




Artisan::command('deposit', function(){
    // $reservation->base_deposit;
    // $depo = round((10098 / 100) * 30);

    $depo = round(152.5);

    echo $depo;

});


// Atrisan::command('asd', function(){
//     // $model->price_per_day
//     // $this->

//     $base_accessories += (( 15 * countOfDays($request->start_date, $request->end_date)) + $model->access_charge) * $accessory['count'];

//     echo $base_accessories;
// });


Artisan::command('mail', function(){

    $reservation_26 = Reservation::where('status_id', 4)
        ->where('30_before_depatr', '=', null )
        ->where('start_date', '>', Carbon::now()->addDays(27)->format('Y-m-d'))
        ->where('start_date', '<', Carbon::now()->addDays(31)->format('Y-m-d'))
        // ->get(['id', 'email', 'start_date', '30_before_depatr'])->toArray();
        ->get();


    $reservation_30 = Reservation::where('status_id', 4)
        // ->with('caravan')
        ->where('35_before_depatr', '=', null)
        ->where('start_date', '>', Carbon::now()->addDays(31)->format('Y-m-d'))
        ->where('start_date', '<', Carbon::now()->addDays(36)->format('Y-m-d'))
        // ->get(['id', 'email', 'start_date', '35_before_depatr'])->toArray();
        ->get();

    // foreach ($reservation_30 as $reservation) {
    //     print_r($reservation->start_date->format('Y-m-d'));
    //     echo PHP_EOL;
    //     $reservation->notify(new OrderShipped($reservation));
    //     $reservation->update(['30_before_depatr' => 1]);
    // }

    // print_r(Carbon::now()->addDays(26)->format('Y-m-d'));
    // print_r($reservation_26);
    // print_r(Carbon::now()->addDays(30)->format('Y-m-d'));
    // print_r($reservation_30);


    foreach ($reservation_26 as $reservation) {
        if($reservation->caravan->tenerife) {
            $reservation->notify(new OrderShipped($reservation));
    }else{
            $reservation->notify(new OrderShipped($reservation));
        }
        $reservation->update(['30_before_depatr' => 1]);

    }


    foreach ($reservation_30 as  $reservation) {
        // print_r($reservation->caravan->tenerife);
        // echo PHP_EOL;
        if($reservation->caravan->tenerife) {

                $reservation->notify(new OrderShipped($reservation));
                // $reservation->update(['35_before_depatr' => 1]);

        }else{

                $reservation->notify(new OrderShipped($reservation));
            }
            $reservation->update(['35_before_depatr' => 1]);


    }


    // $reservation->notify(new OrderShipped($reservation));

    // $user = User::find(121);

    // $res = Notification::send($user, new ReservationStoreAdmin($reservation));

    // var_dump($res);


});

Artisan::command('mailll', function() {
    $reservation_26 = Reservation::where('status_id', 4)
        // ->where('30_before_depatr', '=', null )
        ->where('start_date', '>', Carbon::now()->addDays(27)->format('Y-m-d'))
        ->where('start_date', '<', Carbon::now()->addDays(31)->format('Y-m-d'))
        ->get(['id', 'start_date'])->toArray();


        $reservation_30 = Reservation::where('status_id', 4)
        // ->with('caravan')
        // ->where('35_before_depatr', '=', null)
        ->where('start_date', '>', Carbon::now()->addDays(31)->format('Y-m-d'))
        ->where('start_date', '<', Carbon::now()->addDays(36)->format('Y-m-d'))
        ->get(['id', 'start_date'])->toArray();


        print_r(Carbon::now()->addDays(26)->format('Y-m-d'));
        print_r($reservation_26);
        print_r(Carbon::now()->addDays(30)->format('Y-m-d'));
        print_r($reservation_30);



        // foreach ($reservation_26 as $reservation) {
        //     if($reservation->caravan->tenerife) {
        //         $reservation->notify(new RestPayTnSecond($reservation));
        // }else{
        //         $reservation->notify(new RestPayCzSecond($reservation));
        //     }
        //     $reservation->update(['30_before_depatr' => 1]);

        // }


        // foreach ($reservation_30 as  $reservation) {
        // if($reservation->caravan->tenerife) {
        //         $reservation->notify(new RestPayTn($reservation));
        // }else{
        //         $reservation->notify(new RestPayCz($reservation));
        //     }
        //         $reservation->update(['35_before_depatr' => 1]);
        // }




});



Artisan::command('days', function(){

    $reservation = Reservation::find(211211);
    $start_date = $reservation->start_date;

    $res = Carbon::now()->diffInDays($start_date, false);

    $price = $reservation->total_price;

    $end = $price - $reservation->base_deposit;

    // echo $res;
    // echo <br></br>;
    // echo $end;

    print_r($res);
    // print_r($end);

});



Artisan::command('send_mail', function(){
    // $now = Carbon::now();
    // $remind_reservations = Reservation::where('status_id', [4])
    //     // ->where('tenerife', 0)
    //     ->where('start_date', '>=', $now->format('Y-m-d'))
    //     // ->where('start_date', '>=', $now->addDays(30)->format('Y-m-d'))
    //     ->where('start_date', '<=', $now->addDays(35)->format('Y-m-d'))
    //     ->orderBy('start_date', 'asc')
    //     ->get();

    // $reservation = Reservation::where('status_id', '=', 4)
    // ->where('start_date')
    // ->where('start_date', '>=', $now->format('Y-m-d'))
    // ->where('start_date', '<=', $now->addDays(35)->format('Y-m-d'))
    // ->orderBy('start_date', 'asc')
    // ->get();



    $now = Carbon::now();
    $remind_reservations = Reservation::where('status_id', 4)
        // ->where('contract', null)
        ->where('start_date', '>=', $now->format('Y-m-d'))
        // ->where('start_date', '>=', $now->addDays(10)->format('Y-m-d'))
        ->where('start_date', '<=', $now->addDays(35)->format('Y-m-d'))
        ->orderBy('start_date', 'asc')
        ->get();


    // $reservation = Reservation::find(220279 );
    // $reservation = Reservation::where('start_date');
    // $start_date = $reservation->start_date;

    // $res = Carbon::now()->diffInDays($start_date, false);




    // if($reservation->status_id == Status::where('name', 'Záloha zaplacena, čeká na zaplacení nájmu')->first()->id){
    //     if($res <= 35){
    //         $reservation->notify(new OrderShipped($reservation));
    //     }
    // }

    // if($reservation->notify(new OrderShipped($reservation)) == true){

    // }

        // print_r($remind_reservations);
        print_r(count($remind_reservations));
});




Artisan::command('canary', function(){

        $categories = CaravanCategory::with(['caravans' => function($q){
            $q->where('tenerife', 1);
        }])->get(['id', 'name'])->toArray();


        print_r($categories);

});


Artisan::command('aktual', function() {
    $blogs = Post::whereIn('id', [3,4,5])
    ->get(['id', 'name', 'slug'])->toArray();

    print_r($blogs);
});



Artisan::command('sale', function(){



    $date_from = Carbon::parse('2022-08-16 11:00:00');
    $date_to = Carbon::parse('2022-08-20 11:00:00');


    $reservations = Reservation::whereBetween('start_date', [$date_from, $date_to])
    ->orWhereBetween('end_date', [$date_from, $date_to])
    ->orWhere(function($q) use ($date_from, $date_to) {
        $q->where('start_date', '<=', $date_from)->where('end_date', '>=', $date_to);
    })->get()->toArray();


    print_r($reservations);
});


Artisan::command('last', function(){

        $reservations = Reservation::where('end_date', '>',Carbon::now())
            ->where('status_id', '<>', 9)->whereHas('caravan', function($query) {
                $query->where('tenerife', 0);})->orderby('caravan_id')->orderby('start_date')->get();

        $caravans = Caravan::all();


        $caravan_id = 0;
        $start_date = 0;
        $end_date = 0;

    $result_array = [];
    foreach ($reservations as $reservation) {
            //    echo($reservation->start_date);
            //    echo PHP_EOL;

            //    echo ($reservation->caravan_id);
            //    echo PHP_EOL;


        if ($caravan_id === $reservation->caravan_id) {
            // $days = $reservation->start_date - $end_date;
            $start_date = Carbon::parse($reservation->start_date);
            $end_date = Carbon::parse($end_date);


            $diff = $start_date->diffInDays($end_date)-1;

            // print_r($diff);



            // print_r($reservation);

            // print_r( [
            //     'reservation' => $reservation->id,
            //     'caravan' => $reservation->caravan_id,
            //     'diff with prev' => $diff,

            // ]);
            // print_r($reservation->attributesToArray());
            if ($diff === 3 || $diff === 4) {

                // $avaliable = $reservation->caravan_id;
                // $avaliable_from = $end_date->addDays(1)->format('Y-m-d');
                // $avaliable_to = $reservation->start_date->subDays(1)->format('Y-m-d');
                // $day_diff = $diff;
                $item_arr = [
                    'avalibal ' => $reservation->caravan_id,
                    // 'avaliable_from' => $end_date->addDays(1)->format('Y-m-d'), //+1
                    'avaliable_from' => $end_date->format('Y-m-d'), //+1
                    // 'avaliable_to' => $reservation->start_date->subDays(1)->format('Y-m-d'), //-1
                    'avaliable_to' => $reservation->start_date->format('Y-m-d'), //-1
                    'day_diff' => $diff,
                    'price_from' => $reservation->caravan->price_from,
                    'caravan_name' => $reservation->caravan->name,
                    'caravan_img' => $reservation->caravan->thumbnail,
                ];
                $result_array[] = $item_arr;
                // print_r([

                //     // 'price_start' => $reservation->base_price,
                // ]);





            }
        }

        // $res = compact($reservation->attributesToArray());
        // print_r($res);

        // print_r($reservation->attributesToArray());

        // $avalibal = $reservation->caravan_id;
        // $avaliable_from = $end_date->addDays(1)->format('Y-m-d'); //+1
        // $avaliable_to = $reservation->start_date->subDays(1)->format('Y-m-d'); //-1
        // $day_diff = $diff;

        $caravan_id = $reservation->caravan_id;
        $start_date = $reservation->start_date;
        $end_date = $reservation->end_date;



    }
    //view
    // foreach ($result_array as $result_item) {
    //     $result_item['caravan_name'];
    // }

    print_r($result_array);
});



Artisan::command('recense', function(){
    $reservations = Reservation::select(['email', 'name', 'last_name', 'id', 'start_date', 'end_date'])
    ->get()->toArray();

print_r( $reservations);
});



Artisan::command('num', function(){

    // $last = Reservation::orderBy('deposite_counter', 'desc')->pluck('deposite_counter')->first();


    $last = Reservation::orderBy('rest_counter', 'desc')->pluck('rest_counter')->first();

print_r($last);

});


Artisan::command('reg', function(){
$reg = Reservation::where('user_id', '!=', null)
->where('status_id', '=', [4,6,7,8])
->get(['id', 'status_id', 'user_id', 'name', 'last_name'])->toArray();



// $reg_count = count($reg ['user_id']);

print_r( $reg);
});


Artisan::command('test-count', function(){
    $reservation = Reservation::with('accessories')->find(220079)->get();

    var_dump($reservation->reservation_accessory->count);
});


Artisan::command('test-dayss', function(){
    // $reservation = Reservation::find(220283);
    $reservation = Reservation::find(220079)->toArray();

    print_r($reservation);

    // print_r(count($reservation->pivot->reservation_accessory));


    if (!is_null($reservation->deposite_date) &&
        !is_null($reservation->deposite_date) &&
        $reservation->deposite_date->format('Y-m-d H:i:s') === $reservation->rest_pay_date->format('Y-m-d H:i:s'))
    {
        // var_dump('match');
    }else{
        // var_dump('else');
    }

});


Artisan::command('list-review', function(){

    $now = '2022-01-01';
    $reservation_review = Reservation::where('status_id', 8)
    ->where('end_date', '<', Carbon::now()->subDay(3)->format('Y-m-d'))
    ->where('review_block', '=', null)
    ->where('review_sended', '=', null)
    ->orderBy('created_at')
    ->limit(50)
    ->get(['id', 'start_date', 'end_date', 'status_id','review_sended', 'email', 'review_block' ])->toArray();


    print_r($reservation_review);
});

Artisan::command('send-review', function(){
        $reservation_review = Reservation::where('status_id', 8)
        ->where('end_date', '<', Carbon::now()->subDay(3)->format('Y-m-d'))
        ->where('review_block', '=', null)
        ->where('review_sended', '=', null)
        ->orderBy('created_at')
        ->limit(50)
        ->get();

        foreach ($reservation_review as $reservation) {
            $reservation->notify(new RecenseSend($reservation));

            $reservation->update(['review_sended' => 1]);
        }
});

Artisan::command('rating', function(){

    $reviews = Review::get(['id', 'reservation_id', 'caravan_id', 'name', 'rating_caravan', 'rating_service']);

    // print_r($reviews);
    $result_array = [];
    foreach ($reviews as $key => $review) {
        $item_arr = [
            // 'id ' => $review->id,
            // 'reservation_id' => $review->reservation_id,
            // 'rating_carvan' => $review->rating_carvan,
            'rating_caravan' => $review->rating_caravan,
        ];
        $result_array[] = $item_arr;


    }

    $res = array_column($result_array, 'rating_caravan');
    $res_sum = array_sum($res);
    $res_count = count($res);
    $avg = $res_sum / $res_count;

    print_r($avg);







});



Artisan::command('accessory', function() {
    $start_date = '2022-06-30';
    $end_date = '2022-07-17';
    $accessories = Accessory::orderBy('sort', 'ASC')->get();

    $start_date = Carbon::createFromFormat('Y-m-d', $start_date)->toDateString();
    $end_date = Carbon::createFromFormat('Y-m-d', $end_date)->toDateString();

    $callback = function($query) use ($start_date, $end_date) {
        $query->select('id', 'start_date', 'end_date');
        $query->where('status_id', '!=', 8); // Vráceno
        $query->where('status_id', '!=', 9); // Storno
        $query->whereBetween('start_date', [$start_date, $end_date]);
        $query->orWhereBetween('end_date', [$start_date, $end_date]);
        $query->orWhere(function ($q) use ($start_date, $end_date) {
            $q->where('start_date', '<=', $start_date)->where('end_date', '>=', $end_date);
        });
    };

    $accessories_in_reservations = Accessory::whereHas('reservations', $callback)->with(['reservations' => $callback])->get()->toArray();

    print_r($accessories_in_reservations);
});



Artisan::command('time-check', function(){
    $datetime1 = strtotime('2009-10-11 12:12:00');
    $datetime2 = strtotime('2009-10-11 12:12:00');

    if ($datetime1 == $datetime2) {
        echo 'datetime2 is equal than datetime1';
    }else{
        echo 'false';
    }
});


Artisan::command('num-check', function() {
    $n = 123;
    $a = substr('00000' . $n , -5);
    echo $a;

});


Artisan::command('gallery-list', function(){
    // $today = Carbon::now();
    $reservation_gallery = Reservation::where('status_id', 7)
    ->where('sended_foto', '=', null)
    ->where('start_date', '<', Carbon::now()->format('Y-m-d'))
    ->orderBy('created_at')
    ->get(['id', 'start_date', 'end_date', 'status_id', 'email' ])->toArray();


    print_r($reservation_gallery);
});
// Artisan::command('code', function(){

//     $str = 'hello';

//     $code = __encode($str, 'your key');

//     $str = __decode($code, 'your key');

//     echo $str;

//     echo $code;
// });


// function __encode($text, $key)
// {
//     $td = mcrypt_module_open ("tripledes", '', 'cfb', '');
//     $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
//     if (mcrypt_generic_init ($td, $key, $iv) != -1)
//         {
//         $enc_text=base64_encode(mcrypt_generic ($td,$iv.$text));
//         mcrypt_generic_deinit ($td);
//         mcrypt_module_close ($td);
//         return $enc_text;
//         }
// }

// function strToHex($string)
// {
//     $hex='';
//     for ($i=0; $i < strlen($string); $i++)
//     {
//         $hex .= dechex(ord($string[$i]));
//     }

//     return $hex;
// }

// function __decode($text, $key)
// {
//         $td = mcrypt_module_open ("tripledes", '', 'cfb', '');
//         $iv_size = mcrypt_enc_get_iv_size ($td);
//         $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
//         if (mcrypt_generic_init ($td, $key, $iv) != -1) {
//                 $decode_text = substr(mdecrypt_generic ($td, base64_decode($text)),$iv_size);
//                 mcrypt_generic_deinit ($td);
//                 mcrypt_module_close ($td);
//                 return $decode_text;
//         }
// }

// function hexToStr($hex)
// {
//     $string='';
//     for ($i=0; $i < strlen($hex)-1; $i+=2)
//     {
//         $string .= chr(hexdec($hex[$i].$hex[$i+1]));
//     }
//     return $string;
// }
