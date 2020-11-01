<?php

namespace App\Http\Controllers;

use Auth;
use App\Inschrijving;
use App\Exports\InschrijvingExport;
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
}
