<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Models\{Accessory,Caravan,Coupon,Lastminute,LeaveForm,Reservation,Season,Faktura,Status,User};
use App\Notifications\{ReservationStore,ReservationStoreAdmin,RecenseSend,RestPayCz,RestPayTn,RestPayCzSecond,RestPayTnSecond};
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{

    public function check_if_sale($days)
    {
        $sale_arr = $this->getSales([$days]);


        foreach ($sale_arr as $sale_item) {
            // dump(request('start_date') === $sale_item->avaliable_from);
            // dump(request('end_date') === $sale_item->avaliable_to);
            // dump(request('caravan') == $sale_item->reservation->caravan->id);
            // dump($sale_item->avaliable_from);
            if (
            request('start_date') === $sale_item->avaliable_from &&
            request('end_date') === $sale_item->avaliable_to &&
                (
                    request('caravan') == $sale_item->reservation->caravan->id ||
                    request('caravan_id') == $sale_item->reservation->caravan->id
                )
            ){
                return true;
            }
        }
        // dd(1);
        return false;
    }
    /**
     * Display a reservation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(Request $request)
    {
        $caravan = Caravan::find($request->caravan);
        if (!$caravan) {
            return redirect('/');
        }
        $reasons = LeaveForm::getReasons();
        $accessories = $this->getFreeAccessories($request->start_date, $request->end_date);
        $price = $this->calculatePrice($request->caravan, $request->start_date, $request->end_date);
        $result_array = $this->getSales([3,4]);
        $days_diff = $this->countOfDays($request->start_date, $request->end_date) + 1;
        $is_sale = $this->check_if_sale($days_diff);


        return view('reservations.form')
            ->with('caravan', $caravan)
            ->with('accessories', $accessories)
            ->with('start_date', new DateTime($request->start_date))
            ->with('end_date', new DateTime($request->end_date))
            ->with('price', $price)
            ->with('result_array', $result_array)
            ->with('days_diff', $days_diff)
            ->with('is_sale', $is_sale)
            ->with('reasons', $reasons);
    }

    public function confirmation($id) {
        $reservation = Reservation::findOrFail($id);

        if(Session::has('res_access') && Session::get('res_access') == $id) {
            Session::forget('res_access');

            return view('reservations.confirmation')
                ->with('reservation', $reservation);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        $date_from = Carbon::parse($request->start_date)->format('Y-m-d');
        $date_to = Carbon::parse($request->end_date)->format('Y-m-d');

        $reservations_count = Reservation::where('caravan_id', '=', $request->caravan_id)
            ->where('status_id', '!=', 8)
            ->where('status_id', '!=', 9)
            ->where(function($query) use ($date_from, $date_to) {
                $query->whereBetween('start_date', [$date_from, $date_to]);
                $query->orWhereBetween('end_date', [$date_from, $date_to]);
                $query->orWhere(function($q) use ($date_from, $date_to) {
                    $q->where('start_date', '<=', $date_from)->where('end_date', '>=', $date_to);
                });
            })->count();

        if($reservations_count > 0) {
            flash('Bohužel tento termín již někdo zarezervoval.')->error();

            return redirect()->back();
        }

        if(Auth::check()) {
            $user = Auth::user();
            $user_id = Auth::id();
            $user_discount = $user->reservations_discount;
        } else {
            if(!empty($request->password)) {
                $user = User::firstOrCreate(['email' => $request->email], [
                    'name' => $request->input('name'),
                    'last_name' => $request->input('last_name'),
                    'birthdate' => $request->input('birthdate'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'city' => $request->input('city'),
                    'zip' => $request->input('zip'),
                    'company' => $request->input('company'),
                    'ico' => $request->input('ico'),
                    'dic' => $request->input('dic'),
                    'password' => bcrypt($request->input('password'))
                ]);

                $user_id = $user->id;
            } else {
                $user_id = null;
            }
        }

        $reservation = new Reservation;

        $base_accessories = 0;

        foreach(collect($request->accessories) as $accessory) {
            if(Arr::exists($accessory, 'id')) {
                $model = Accessory::find($accessory['id']);
                if(!$model) continue;

                $base_accessories += (($model->price_per_day * $this->countOfDays($request->start_date, $request->end_date)) + $model->access_charge) * $accessory['count'] ;
            }
        }

        $total_price = $this->calculatePrice($request->caravan_id, $request->start_date, $request->end_date, $request->accessories, $request->coupon, );

        // $this->checkLastminute($request->caravan_id, $request->start_date, $request->end_date)

        $coupon_id = null;

        if(!empty($request->coupon)) {
            $coupon = Coupon::where('name', $request->coupon)->first();

            if($coupon !== null) {
                $coupon_id = $coupon->id;
            }
        }

        $reservation->status_id = 1;
        $reservation->coupon_id = $coupon_id;
        $reservation->caravan_id = $request->caravan_id;
        $reservation->start_date = $request->start_date;
        $reservation->end_date = $request->end_date;
        $reservation->user_id = $user_id;
        $reservation->name = $request->name;
        $reservation->last_name = $request->last_name;
        $reservation->birthdate = \Carbon\Carbon::parse($request->birthdate);
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->address = $request->address;
        $reservation->city = $request->city;
        $reservation->zip = $request->zip;
        $reservation->company = $request->company;
        $reservation->ico = $request->ico;
        $reservation->dic = $request->dic;
        $reservation->comment = $request->text;

        if(!empty($user_discount)) {
            $reservation->discount = $user_discount;
        }

        $reservation->base_deposit = round(($total_price / 100) * 30);
        $reservation->base_price = $this->calculatePrice($request->caravan_id, $request->start_date, $request->end_date);
        $reservation->accessories_price = $base_accessories;
        $reservation->total_price = $total_price;
        $reservation->payment_method = $request->payment_method;

        if($reservation->save()) {
            foreach(collect($request->accessories) as $accessory) {
                if(Arr::exists($accessory, 'id')) {
                    $model = Accessory::findOrFail($accessory['id']);
                    // if(!model)
                    $reservation->accessories()->attach($model->id, [
                        'count' => $accessory['count']
                    ]);
                }
            }

            $reservation->notify(new ReservationStore($reservation));
            $admins = User::role('Administrátor')
                ->orWhere('id', 40)
                ->get();
            Notification::send($admins, new ReservationStoreAdmin($reservation));

            Session::put('res_access', $reservation->id);

            return redirect()->route('rezervace.confirmation', $reservation->id);
        }
    }

    public function test() {
        return view('reservations.test');
    }

    public function getFreeCaravans($start_date, $end_date) {
        // Find in reservations
    }

    public function countOfDays($start_date, $end_date) {
        $start_date = new DateTime($start_date);
        $end_date = new DateTime($end_date);

        return $end_date->diff($start_date)->format('%a') ;

        // - 1
    }

    public function calculatePrice($caravan_id, $start_date, $end_date, $accessories = null, $coupon = null, $discount_perc = null) {
        $startDate = new DateTime($start_date);
        $endDate = new DateTime($end_date);
        $total_price = 0;
        $first_day = true;

        while($startDate->format('Y-m-d') <= $endDate->format('Y-m-d')) {
            if($first_day) {
                $total_price += ($this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d')) / 2);
                $first_day = false;
            } else {
                if($startDate->format('Y-m-d') == $endDate->format('Y-m-d')) {
                    $total_price += ($this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d')) / 2);
                } else {
                    $total_price += $this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d'));
                }
            }

            $startDate->modify('+1 day');
        }

        // if(!empty($accessories)) {
        //     foreach($accessories as $accessory) {
        //         if(isset($accessory['id'])) {
        //             $model = Accessory::findOrFail($accessory['id']);

        //             $total_price += (($model->price_per_day * $this->countOfDays($start_date, $end_date) ) + $model->access_charge) * $accessory['count'];
        //         }
        //     }
        // }

        if($this->countOfDays($start_date, $end_date) <= 9) {
            $total_price += 1680;
        }

        if(!empty($coupon)) {
            $coupon = Coupon::where('name', $coupon)->first();

            if($coupon !== null) {
                if($coupon->type == 'value') {
                    $total_price -= $coupon->discount;
                }

                if($coupon->type == 'percent') {
                    $discount = ($total_price / 100) * $coupon->discount;
                    $total_price -= $discount;
                }
            }
        }

        if(Auth::check()) {
            if(Auth::user()->reservations_discount > 0) {
                $discount = ($total_price / 100) * Auth::user()->reservations_discount;
                $total_price -= $discount;
            }
        }

        if(!empty($discount_perc)) {
            $discount = ($total_price / 100) * $discount_perc;
            $total_price -= $discount;
        }

        if ($this->check_if_sale($days = 3)) {

            $total_price = round($total_price * 0.9);
        }


        if ($this->check_if_sale($days = 4)) {
            $total_price = round($total_price * 0.95);
        }


        if(!empty($accessories)) {
            foreach($accessories as $accessory) {
                if(isset($accessory['id'])) {
                    $model = Accessory::findOrFail($accessory['id']);

                    $total_price += (($model->price_per_day * $this->countOfDays($start_date, $end_date) ) + $model->access_charge) * $accessory['count'];
                }
            }
        }

        return $total_price;
    }

    public function getPrice(Request $request) {
        return $this->calculatePrice($request->caravan_id, $request->start_date, $request->end_date, $request->accessories, $request->coupon,
        );
    }

    // $this->checkLastminute($request->caravan_id, $request->start_date, $request->end_date)

    public function getSeasonByDate($date) {
        $date = new DateTime($date);
        $season = Season::where('start_date', '<=', $date->format('Y-m-d'))->where('end_date', '>=', $date->format('Y-m-d'))->first();

        return $season;
    }

    public function getSeasonPriceByCaravan($caravan_id, $date) {
        $date = new DateTime($date);
        $caravan = Caravan::findOrFail($caravan_id);
        $season = $caravan->seasons()->where('start_date', '<=', $date->format('Y-m-d'))->where('end_date', '>=', $date->format('Y-m-d'))->first();
        $day_number = $date->format('N');

        return $season->pivot->{'day_' . $day_number};
    }

    public function getFreeAccessories($start_date, $end_date) {
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

        $accessories_in_reservations = Accessory::whereHas('reservations', $callback)->with(['reservations' => $callback])->get();

        $final = $accessories->map(function($accessory) use ($accessories_in_reservations) {
            if(!empty($accessories_in_reservations->where('id', $accessory->id))) {
                foreach($accessories_in_reservations->where('id', $accessory->id) as $acc) {
                    $upd = $acc->reservations->sum('pivot.count');

                    $stock = $accessory->stock - $upd;

                    if($stock >= $accessory->max_count) {
                        $accessory->max_count = $accessory->max_count;
                    } else {
                        if($stock > 0) {
                            $accessory->max_count = $stock;
                        } else {
                            $accessory->max_count = 0;
                        }
                    }
                }
            }

            return [
                'id' => $accessory->id,
                'user_id' => $accessory->user_id,
                'name' => $accessory->name,
                'description' => $accessory->description,
                'thumbnail' => $accessory->thumbnail,
                'price_per_day' => $accessory->price_per_day,
                'access_charge' => $accessory->access_charge,
                'max_count' => $accessory->max_count,
                'stock' => $accessory->stock,
                'sort' => $accessory->sort,
            ];
        });

        return $final;
    }

    public function getDetailedPrice(Request $request) {
        $caravan_id = $request->caravan_id;
        $startDate = new DateTime($request->start_date);
        $endDate = new DateTime($request->end_date);
        $data = [];
        $data['days'] = [];

        while($startDate->format('Y-m-d') <= $endDate->format('Y-m-d')) {
            array_push($data['days'], [
                'name' => $startDate->format('d.m.'),
                'season' => $this->getSeasonByDate($startDate->format('Y-m-d'))->name,
                'price' => $this->getSeasonPriceByCaravan($caravan_id, $startDate->format('Y-m-d')),
            ]);

            $startDate->modify('+1 day');
        }

        $data['days'][array_key_first($data['days'])]['price'] /= 2;
        $data['days'][array_key_first($data['days'])]['content'] = 'Cena za půlden';
        $data['days'][array_key_last($data['days'])]['price'] /= 2;
        $data['days'][array_key_last($data['days'])]['content'] = 'Cena za půlden';

        if($this->countOfDays($request->start_date, $request->end_date) <= 9) {
            $data['surcharge']['service']['name'] = 'Servisní poplatek';
            $data['surcharge']['service']['price'] = 1680;
            $data['surcharge']['service']['content'] = 'Více informací naleznete v sekci Rady a informace';
        }

        if(Auth::check()) {
            if (Auth::user()->reservations_discount > 0) {
                $data['discount'] = Auth::user()->reservations_discount;
            }
        }

        return response()->json($data);
    }

    public function checkLastminute($caravan_id, $start_date, $end_date) {

        return null;
        $lastminute = Lastminute::where('caravan_id', $caravan_id)
            ->where('start_date', $start_date)
            ->where('end_date', $end_date)
            ->active()
            ->first();

        if (!empty($lastminute->discount)) {
            $lastminute = $lastminute->discount;
        } else {
            $lastminute = null;
        }

        return $lastminute;
    }






        public function sendCronEmails()
    {

        // $reservation = Reservation::find(211061 );

        // $reservation->notify(new RestPayCz($reservation));




        $reservation_26 = Reservation::where('status_id', 4)
        ->where('30_before_depatr', '=', null )
        ->where('start_date', '>', Carbon::now()->addDays(27)->format('Y-m-d'))
        ->where('start_date', '<', Carbon::now()->addDays(31)->format('Y-m-d'))
        ->get();


        $reservation_30 = Reservation::where('status_id', 4)
        // ->with('caravan')
        ->where('35_before_depatr', '=', null)
        ->where('start_date', '>', Carbon::now()->addDays(31)->format('Y-m-d'))
        ->where('start_date', '<', Carbon::now()->addDays(36)->format('Y-m-d'))
        ->get();



        foreach ($reservation_26 as $reservation) {
            if($reservation->caravan->tenerife) {
                $reservation->notify(new RestPayTnSecond($reservation));
        }else{
                $reservation->notify(new RestPayCzSecond($reservation));
            }
            $reservation->update(['30_before_depatr' => 1]);

        }


        foreach ($reservation_30 as  $reservation) {
        if($reservation->caravan->tenerife) {
                $reservation->notify(new RestPayTn($reservation));
        }else{
                $reservation->notify(new RestPayCz($reservation));
            }
                $reservation->update(['35_before_depatr' => 1]);
        }
    }
}




