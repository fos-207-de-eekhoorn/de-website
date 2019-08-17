<?php

namespace App\Http\Controllers;

use App\Http\Shared\CommonHelpers;

class HomeController extends Controller
{
    use CommonHelpers;

    public function get_home()
    {
        return view('home');
    }
}
