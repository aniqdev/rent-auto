<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaveFormStoreRequest;
use App\Models\LeaveForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LengthException;

class LeaveFormController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveFormStoreRequest $request)
    {
        $leave = new LeaveForm;

        $leave->caravan_id = $request->caravan;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->price = $request->price;
        $leave->reason = $request->reason;
        $leave->message = $request->message;
        $leave->ip = $_SERVER['REMOTE_ADDR'];
        $leave->visited_at = date('Y-m-d h:i:s', strtotime($request->visited));

        if($leave->save()) {
            return response()->json([
                'message' => 'Děkujeme za Váš názor.'
            ]);
        } else {
            return response()->json([
                'error' => 'Vyberte prosím jednu možnost'
            ]);
        }
    }
}
