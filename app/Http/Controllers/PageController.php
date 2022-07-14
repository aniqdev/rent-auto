<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSendRequest;
use App\Models\Accessory;
use App\Models\{Caravan,CaravanCategory,Reservation};
use App\Models\Page;
use App\Models\Season;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ValidatedInput;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {


        if ($slug === 'poznejte-kanarske-ostrovy-na-maximum') {
            return redirect('/pujcovna-obytnych-vozu-tenerife', 302);
        }
        // if($request->has('dateFrom') && !empty($request->dateFrom) && $request->has('dateTo') && !empty($request->dateTo)) {
        //     $date_from = Carbon::parse($request->dateFrom)->format('Y-m-d');
        //     $date_to = Carbon::parse($request->dateTo)->format('Y-m-d');

        //     $reservations = Reservation::whereBetween('start_date', [$date_from, $date_to])
        //         ->orWhereBetween('end_date', [$date_from, $date_to])
        //         ->orWhere(function($q) use ($date_from, $date_to) {
        //             $q->where('start_date', '<=', $date_from)->where('end_date', '>=', $date_to);
        //         })->get();

        //     $reservations = $reservations->where('status_id', '!=', 9)->pluck('caravan_id');

        //     $caravans = Caravan::whereNotIn('id', $reservations)->active()->orderBy('sort', 'ASC')->get();

        //    if( $categories = CaravanCategory::with(['caravans' => function ($query) use ($reservations) {
        //         $query->active();
        //         $query->whereNotIn('id', $reservations);
        //     }])->orderBy('sort', 'ASC')->get();
        // } else {
        //     $caravans = Caravan::active()->orderBy('sort', 'ASC')->get();
        //     $categories = CaravanCategory::with(['caravans' => function ($query) {
        //         $query->active();
        //     }])->orderBy('sort', 'ASC')->get();
        // }




        $page = Page::where('slug', $slug)->first();
        $caravans = Caravan::withCount('reservations')
            ->where('active', 1)
            ->where('tenerife', 0)
            ->orderBy('reservations_count', 'DESC')
            ->limit(4)
            ->get();

        return view('pages.show')
            ->with('page', $page)
            ->with('caravans', $caravans)
            // ->with('categories', $categories)
            ->withShortcodes();
    }

    public function contact(ContactSendRequest $request) {
        $request->validate(['g-recaptcha-response' => 'required|captcha',]);
        Mail::send('mail.contact.form', ['email' => $request->email, 'name' => $request->name, 'text' => $request->text, ], function ($message) use ($request) {
            $message->from(env('MAIL_USERNAME', 'noreply@topobytnevozy.cz'), env('APP_NAME'));
            $message->to('info@topobytnevozy.cz', 'TopObytneVozy.cz');
            $message->replyTo($request->email, $request->name);
            $message->subject('Zpráva z kontaktního formuláře');

            // info@topobytnevozy.cz
        });


        return back()->with('success', 'Vaše zpráva byla úspěšně odeslána.');
    }

    public function priceList() {
        $current_year = date('Y');
        $next_year = $current_year++;

        $caravans = Caravan::active()->orderBy('sort', 'ASC')->get();
        $accessories = Accessory::orderBy('sort', 'ASC')->get();
        $seasons = Season::orderBy('id', 'ASC')
            ->whereRaw('SUBSTR(start_date, 1, 4) = ?', [$current_year])
            ->orWhereRaw('SUBSTR(start_date, 1, 4) = ?', [$next_year])
            ->get();

        return view('pages.pricelist')
            ->with('caravans', $caravans)
            ->with('accessories', $accessories)
            ->with('seasons', $seasons);
    }
}
