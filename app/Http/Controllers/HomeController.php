<?php

namespace App\Http\Controllers;

use App\Leider;
use App\Http\Shared\CommonHelpers;

class HomeController extends Controller
{
    use CommonHelpers;

    public function get_home()
    {
        $leiding = Leider::where('id', 1)
            ->with([
                'leider_tak'
            ])
            ->get();
        return $leiding;
        return view('home');
    }
}
