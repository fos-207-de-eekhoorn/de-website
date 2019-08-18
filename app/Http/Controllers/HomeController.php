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

        // return $tak_activiteiten;
        // return $tak_activiteiten[0]->activiteiten[0]->start_uur  ;

        return view('home', [
            'tak_activiteiten' => $tak_activiteiten,
        ]);
    }
}
