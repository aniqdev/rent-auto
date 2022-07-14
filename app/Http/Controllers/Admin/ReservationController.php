<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ReservationController as ControllersReservationController;
use App\Models\{Accessory, Caravan, Reservation, Status, User, Faktura, Notes};
use App\Notifications\{ReservationCancel,ReservationDeposit,ReservationDepositCash,
    ReservationPayTotalPrice,ReservationPayTotalPriceCash,ReservationPayTotalPriceWithDeposit,
    ReservationPayTotalPriceWithDepositCash,Paid,RecenseSend,RestPayCz,RestPayTn,RestPayCzSecond,RestPayTnSecond, SendGallery};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Arr;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

// use DateTime;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if(!auth()->user()->hasPermissionTo('Zobrazit rezervace')) {
            return redirect()->route('admin.dashboard');
        }

        $now = Carbon::now();



        $statuses = Status::orderBy('sort', 'ASC')->pluck('name', 'id');
        $caravans = Caravan::orderBy('sort', 'ASC')->pluck('name', 'id');

        if($request->has('deleted') && $request->deleted)
            $reservations = Reservation::withTrashed()->orderBy('id', 'desc');
        else
            $reservations = Reservation::orderBy('id', 'desc');

        if($request->has('caravan') && !empty($request->caravan)) {
            $reservations->where('caravan_id', $request->caravan);
        }

        if($request->has('status') && !empty($request->status)) {
            $reservations->where('status_id', $request->status);
        }

        if($request->has('daysToStart') && !empty($request->daysToStart)) {
            $days = Carbon::now()->subDays($request->daysToStart);

            $reservations->where('start_date', '>=', $days->format('Y-m-d'))
                ->where('start_date', '>=', $now->format('Y-m-d'));
        }

        if($request->has('daysFromStart') && !empty($request->daysFromStart)) {
            $days = Carbon::now()->addDays($request->daysFromStart);

            $reservations->where('start_date', '<=', $days->format('Y-m-d'))
                ->where('start_date', '>=', $now->format('Y-m-d'));
        }

        $reservations = $reservations->paginate(30);





        $now = Carbon::now();
        $nearest_reservations = Reservation::whereHas('caravan', function($query) {
                $query->where('tenerife', 1);
            })
            ->where(function($query)
            {
                $query->whereNull('bail')->orWhereNull('contract');
            })
            ->whereNotIn('status_id', [1,6,7,8,9])
            ->where('start_date', '>=', $now->format('Y-m-d'))
            ->where('start_date', '<=', $now->addDays(10)->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get();

        $now = Carbon::now();
        $remind_reservations = Reservation::whereNotIn('status_id', [1,6,7,8,9])
            ->where('contract', null)
            ->where('start_date', '>=', $now->format('Y-m-d'))
            // ->where('start_date', '>=', $now->addDays(10)->format('Y-m-d'))
            ->where('start_date', '<=', $now->addDays(25)->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get();

        return view('admin.reservations.index')
            ->with('reservations', $reservations->appends($request->except('page')))
            ->with('caravans', $caravans)
            ->with('statuses', $statuses)
            ->with('nearest_reservations', $nearest_reservations)
            ->with('remind_reservations', $remind_reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $admin = auth()->user();

        $caravans = Caravan::all()->pluck('name', 'id');
        $accessories = Accessory::all();

        return view('admin.reservations.create')
            ->with('caravans', $caravans)
            ->with('accessories', $accessories)
            ->with('admin', $admin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::withTrashed()
            ->with('notes.author:id,name,last_name')
            ->findOrFail($id);

        if($reservation->days_to_start <= 30) {
            $statuses = Status::where('name', '!=', 'Čeká na platbu zálohy')
                ->where('name', '!=', 'Záloha zaplacena, čeká na zaplacení nájmu')
                ->get();
        } else {
            $statuses = Status::all();
        }

        $pdf_buttons_disabled_class = ($reservation->deposite_date === null && $reservation->rest_pay_date === null) ? 'disabled' : '';
        $pdf_button_rest_disabled_class = ($reservation->rest_pay_date === null) ? 'disabled' : '';
        $pdf_button_deposite_disabled_class = $reservation->deposite_date === null  ? 'disabled' : '';
        $recenze_disabled_class = ($reservation->review_block == 1 || $reservation->status_id != 8) ? 'disabled' : '';
        $client_image_class = $reservation->status_id != 7 ? 'disabled' : '';

        return view('admin.reservations.show')
            ->with('reservation', $reservation)
            ->with('statuses', $statuses)
            ->with('pdf_buttons_disabled_class', $pdf_buttons_disabled_class)
            ->with('recenze_disabled_class', $recenze_disabled_class)
            ->with('client_image_class', $client_image_class)
            ->with('pdf_button_deposite_disabled_class', $pdf_button_deposite_disabled_class)
            ->with('pdf_button_rest_disabled_class', $pdf_button_rest_disabled_class)
            // ->with('notes', $reservation->notes)
            ->with('res_note', $reservation->note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $admins = User::role('Administrátor')->get();
        $accessories = Accessory::orderBy('sort', 'ASC')->pluck('name', 'id',);
        $reservation = Reservation::findOrFail($id);
        $caravan = Caravan::findOrFail($reservation->caravan->id);
        $storno_status = Status::where('name', 'Storno')->first();
        $reservations = $caravan->reservations()
            ->select('start_date AS start', 'end_date AS end')
            ->where('status_id', '!=', $storno_status->id)
            ->where('id', '!=', $reservation->id)
            ->get();

        $free_accessories = $this->getFreeAccessories($reservation->start_date->format('Y-m-d'), $reservation->end_date->format('Y-m-d'));

        $free_accessories = array_column($free_accessories->toArray(), null, 'id');
        $reservation_accessories = [];
        foreach ($reservation->accessories as $res_accessory) {
            $reservation_accessories[$res_accessory->id] = $res_accessory;
        }



        foreach ($accessories as $acc_id => $accessorie)

        $max = isset($free_accessories[$acc_id]) ? $free_accessories[$acc_id]['max_count'] : 0;

        if (isset($reservation_accessories[$acc_id])) {
            $current =  $reservation_accessories[$acc_id]->pivot->count;
        }else{
            $current = 0;
        }
        $max = $max + $current;

        return view('admin.reservations.edit')
            ->with('reservation', $reservation)
            ->with('reservations', $reservations)
            ->with('admins', $admins)
            ->with('free_accessories', $free_accessories)
            ->with('reservation_accessories', $reservation_accessories)
            ->with('accessories', $accessories);
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

        $reservation = Reservation::findOrFail($id);


        $reservation->start_date = $request->start_date;
        $reservation->end_date = $request->end_date;
        $reservation->name = $request->name;
        $reservation->last_name = $request->last_name;
        $reservation->address = $request->address;
        $reservation->city = $request->city;
        $reservation->zip = $request->zip;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
        $reservation->company = $request->company ?? null;
        $reservation->ico = $request->ico ?? null;
        $reservation->dic = $request->dic ?? null;
        $reservation->note = $request->note ?? null;
        $reservation->review_block = $request->review_block;


        if (is_null($reservation->deposite_date) && !is_null($request->deposite_date)) {
            $reservation->deposite_date = $request->deposite_date;
            $last = Reservation::orderBy('deposite_counter', 'desc')->pluck('deposite_counter')->first();
            $reservation->deposite_counter = $last + 1;
        }

        if (is_null($reservation->rest_pay_date) && !is_null($request->rest_pay_date)) {
            $reservation->rest_pay_date = $request->rest_pay_date;
            if (is_null($reservation->deposite_date)) {
                $reservation->deposite_date = $request->rest_pay_date;
            }
            $last = Reservation::orderBy('rest_counter', 'desc')->pluck('rest_counter')->first();
            $reservation->rest_counter = $last + 1;
        }


        if($reservation->caravan->tenerife) {
            $reservation->contract = $request->contract ?? null;
            $reservation->bail = $request->bail ?? null;
        }

        $accessories_price = 0;

        // dd($request->accessories);
        foreach(collect($request->accessories) as $accessory) {
            if(Arr::exists($accessory, 'id')) {
                $model = Accessory::find($accessory['id']);
                if(!$model) continue;

                $accessories_price += (($model->price_per_day * $this->countOfDays($request->start_date, $request->end_date)) + $model->access_charge) * $accessory['count'] ;
            }
        }

        $reservation->accessories_price = $accessories_price;

        // $accessories = [];

        // foreach($reservation->accessories as $accessory) {
        //     $accessories[$accessory->id]['id'] = $accessory->id;
        //     $accessories[$accessory->id]['count'] = $accessory->pivot->count;
        // } OLD CODE

        $accessories = $request->accessories;

        $price = new ControllersReservationController;
        $price = $price->calculatePrice($reservation->caravan->id, $request->start_date, $request->end_date, $accessories, (!empty($reservation->coupon->name)) ? $reservation->coupon->name : null, $price->checkLastminute($reservation->caravan->id, $request->start_date, $request->end_date));

        $reservation->extra_price = $price - $reservation->total_price;

        if($reservation->save()) {

            $acc_sync_arr = [];
            foreach(collect($request->accessories) as $accessory) {
                if(Arr::exists($accessory, 'id')) {
                    $model = Accessory::find($accessory['id']);
                    if(!$model || $accessory['count'] == 0) continue;
                    $acc_sync_arr[$model->id] = ['count' => $accessory['count']];
                }
            }

            $reservation->accessories()->sync($acc_sync_arr);

            flash('Rezervace byla úspešně upravena.')->success();
        } else {
            flash('Rezervaci se nepodařilo upravit.')->error();
        }



        return redirect()
            ->route('admin.rezervace.show', $reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //&& $reservation->deposite_date != null
        // $reservation->rest_pay_date != null
    }

    public function updateStatus(Request $request) {
        $reservation = Reservation::findOrFail($request->reservation);

        if($request->status_id == Status::where('name', 'Čeká na platbu zálohy')->first()->id) {
            if($reservation->payment_method == 'cash') {
                $reservation->notify(new ReservationDepositCash($reservation));
            } elseif($reservation->payment_method == 'bankwire') {
                $reservation->notify(new ReservationDeposit($reservation));
            }
        } elseif($request->status_id == Status::where('name', 'Záloha zaplacena, čeká na zaplacení nájmu')->first()->id ) {
            if($reservation->payment_method == 'cash') {
                $reservation->notify(new ReservationPayTotalPriceCash($reservation));
            } elseif($reservation->payment_method == 'bankwire') {
                $reservation->notify(new ReservationPayTotalPrice($reservation));
            }
        } elseif($request->status_id == Status::where('name', 'Čeká na zaplacení nájmu a zálohy')->first()->id) {
            if ($reservation->payment_method == 'cash') {
                $reservation->notify(new ReservationPayTotalPriceWithDepositCash($reservation));
            } elseif ($reservation->payment_method == 'bankwire') {
                $reservation->notify(new ReservationPayTotalPriceWithDeposit($reservation));
            }
        } elseif($request->status_id == Status::where('name', 'Nájem zaplacen')->first()->id)
            {
                $reservation->notify(new Paid($reservation));
        } elseif($request->status_id == Status::where('name', 'Storno')->first()->id) {
            $reservation->notify(new ReservationCancel($reservation));
        }

        $reservation->status_id = $request->status_id;

        if($reservation->save()) {
            return response('Successful', 200);
        } else {
            return response('Denied', 406);
        }
    }

    public function settings() {
        return view('admin.reservations.settings');
    }

    public function reservationDeposite($id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation->status_id == 2) {
            if($reservation->payment_method == 'cash') {
                $reservation->notify(new ReservationDepositCash($reservation));
            } elseif($reservation->payment_method == 'bankwire') {
                $reservation->notify(new ReservationDeposit($reservation));
            };
        }elseif ($reservation->status_id == 5){
            if($reservation->payment_method == 'cash') {
                $reservation->notify(new ReservationDepositCash($reservation));
            } elseif($reservation->payment_method == 'bankwire') {
                $reservation->notify(new ReservationDeposit($reservation));
            };
        };

        return redirect()->back();
    }


    public function sendRecenseTest($id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation->status_id == 8) {
            $reservation->notify(new RecenseSend($reservation));
        }

        return redirect()->back();
    }

    public function sendClientFotoTest($id)
    {
        $reservation = Reservation::findOrFail($id);
        if ($reservation->status_id == 7) {
            $reservation->notify(new SendGallery($reservation));
        }

        return redirect()->back();
    }

    // public function sendCronRecense(Request $request)
    // {
    //     $reservation_review = Reservation::where('status_id', 8)
    //     ->where('end_date', '<', Carbon::now()->subDay(3)->format('Y-m-d'))
    //     ->where('review_block', '=', null)
    //     ->where('review_sended', '=', null)
    //     ->get();

    //     foreach ($reservation_review as $reservation) {
    //         $reservation->notify(new RecenseSend($reservation));

    //         $reservation->update(['review_sended' => 1]);
    //     }

    //     return redirect()->back();
    // }



    // public function sendCronFoto(Request $request)
    // {
    //     $reservation_gallery = Reservation::where('status_id', 7)
    //     ->where('sended_foto', '=', null)
    //     ->where('start_date', '<', Carbon::now()->format('Y-m-d'))
    //     ->orderBy('created_at')
    //     ->get();

    //         foreach ($reservation_gallery as $reservation) {
    //         $reservation->notify(new SendGallery($reservation));

    //         $reservation->update(['sended_foto' => 1]);
    //     }
    //     return redirect()->back();
    // }


    public function generateReservationList($id) {
        $reservation = Reservation::findOrFail($id);
        $path = 'images/logo-admin.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.reservations.reservationList', [
            'reservation' => $reservation,
            'logo' => $logo
        ]);

        //return $pdf->stream();
        return $pdf->download('Rezervacni-list_' . $reservation->id . '.pdf');
    }

    public function generateReservationInvoice($id, $action = 'download') {
        $reservation = Reservation::findOrFail($id);
        $path = 'images/logo-original.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        if($reservation->days_from_created >= 30) {
            $price = $reservation->base_deposit;
        } else {
            $price = $reservation->total_price;
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.reservations.depositInvoice', [
            'reservation' => $reservation,
            'price' => $price,
            'logo' => $logo
        ]);

        if($action == 'download') {
            return $pdf->download('Zalohova-faktura_' . $reservation->id . '.pdf');
        } elseif($action == 'raw') {
            return $pdf;
        }
    }

    public function generateReservationAccount($id, $action = 'download')
    {
        $reservation = Reservation::findOrFail($id);
        $dph = $reservation->base_deposit * 0.21;
        $zaklad = $reservation->base_deposit - $dph;
        $deposite = $reservation->base_deposit;
        $price_total = $reservation->total_price;
        $rest_price = $price_total - $deposite;
        $path = 'images/logo-original.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);



        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.reservations.depositAccept', [
            'reservation' => $reservation,
            'deposite' => $deposite,
            'price_total' => $price_total,
            'rest_price' => $rest_price,
            'dph' => $dph,
            'zaklad' => $zaklad,
            'logo' => $logo,
        ]);

        if(empty($reservation->deposite_date)) {
            flash('Bohužel tento termín již někdo zarezervoval.')->error();

            return redirect()->back();
        }

        if($action == 'download') {
            return $pdf->download('Accept-deposit_' . $reservation->id . '.pdf');
        } elseif($action == 'raw') {
            return $pdf;
        }
    }

    public function generateReservationInvoiceRest($id, $action = 'download')
    {
        $reservation = Reservation::findOrFail($id);
        $path = 'images/logo-original.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);



        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.reservations.payRestInvoice', [
            'reservation' => $reservation,
            'price' => $reservation->total_price,
            'logo' => $logo
        ]);



        if($action == 'download') {
            return $pdf->download('Zbytek-factura_' . $reservation->id . '.pdf');
        } elseif($action == 'raw') {
            return $pdf;
        }
    }

    public function generateReservationAccounteTotal($id, $action = 'download')
    {
        $reservation = Reservation::findOrFail($id);
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


        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.reservations.accountAccept', [
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
        ]);



        if(empty($reservation->rest_pay_date)) {
            flash('Bohužel tento termín již někdo zarezervoval.')->error();

            return redirect()->back();
        }

        if($action == 'download') {
            return $pdf->download('Accept-account_' . $reservation->id . '.pdf');
        } elseif($action == 'raw') {
            return $pdf;
        }
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
        // dd($accessories_in_reservations);s


        // foreach ($accessories_in_reservations as $key => $accessorie) {
        //     dump($accessorie->reservations);
        // }
        // dd($accessories_in_reservations);


        // foreach ($accessories_in_reservations as $acc) {
        //     dump($acc->reservations->sum('pivot.count'));
        // }

        // dd($accessories_in_reservations);

        $final = $accessories->map(function($accessory) use ($accessories_in_reservations) {
            // $stock =  $real_max_count = 0;
            $stock = $accessory->stock;
            $real_max_count = $accessory->max_count;

            // $real_max_count = 0;
            if(!empty($accessories_in_reservations->where('id', $accessory->id))) {
                foreach($accessories_in_reservations->where('id', $accessory->id) as $acc) {
                    // loop with one iteration
                    $upd = $acc->reservations->sum('pivot.count'); // booked

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

            // $test = $stock;
            // dd($stock);
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
                'real_stock' => $stock,
                'real_max_count' => $real_max_count,
            ];
        });

        // dd($final);
        return $final;
    }

public function countOfDays($start_date, $end_date) {
    $start_date = new \DateTime($start_date);
    $end_date = new \DateTime($end_date);

    return $end_date->diff($start_date)->format('%a') ;

    // - 1
}



}
