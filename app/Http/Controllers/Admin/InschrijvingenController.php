<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Inschrijving;
use App\Exports\InschrijvingExport;
use Maatwebsite\Excel\Facades\Excel;

class InschrijvingenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
