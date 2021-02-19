<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Inschrijving;
use App\Exports\InschrijvingExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class GeneralController extends Controller
{
    public function get_admin()
    {
        return view('admin.index');
    }
}
