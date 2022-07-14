<?php

namespace App\Http\Controllers\Admin;

use App\Exports\{EmailsExport,OngoingCustomersExport,RecenseExport,ReservationsExport};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.exports.index');
    }

    public function export(Request $request) {
        switch($request->export) {
            case 'reservations':
                return Excel::download(new ReservationsExport, 'rezervace.xlsx');
                break;

            case 'newsletter':
                return Excel::download(new EmailsExport, 'newsletter.xlsx');
                break;

            case 'ongoing':
                return Excel::download(new OngoingCustomersExport, 'zakaznici.xlsx');
                break;


            case 'recense':
                return Excel::download(new RecenseExport, 'recense.xlsx');
                break;

            default:
                return;
                break;
        }
    }
}
