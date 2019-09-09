<?php

namespace App\Http\Controllers;

use App\Tak;
use App\Http\Shared\CommonHelpers;

class HomeController extends Controller
{
    use CommonHelpers;

    public function get_home()
    {
        $tak_activiteiten = Tak::with([
                'volgende_activiteit',
            ])
            ->limit(4)
            ->get();

        return view('home', [
            'tak_activiteiten' => $tak_activiteiten,
        ]);
    }

    public function get_contact()
    {
        return view('contact');
    }

    public function get_privacy()
    {
        return view('privacy');
    }
}
