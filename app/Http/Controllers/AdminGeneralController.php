<?php

namespace App\Http\Controllers;

use Auth;
use App\Inschrijving;
use App\Exports\InschrijvingExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AdminGeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_admin()
    {
        return view('admin.index');
    }

    public function get_inschrijvingen()
    {
        $inschrijvingen = Inschrijving::get();

        return view('admin.inschrijvingen', [
            'inschrijvingen' => $inschrijvingen,
        ]);
    }

    public function export_inschrijvingen($format = 'csv')
    {
        return Excel::download(new InschrijvingExport, 'inschrijvingen.'.$format);
    }
}
