<?php

namespace App\Http\Controllers;

use Auth;
use App\Inschrijving;
use Carbon\Carbon;

class AdminGeneralController extends Controller
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
}
