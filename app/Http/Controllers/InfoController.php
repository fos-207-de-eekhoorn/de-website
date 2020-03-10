<?php

namespace App\Http\Controllers;

use App\Leider;

class InfoController extends Controller
{
    public function get_alle_info()
    {
        return view('alle-info.algemene_info');
    }

    public function get_lid_worden()
    {
        return view('alle-info.lid_worden');
    }

    public function get_uniform_shop()
    {
        return view('alle-info.uniform_shop');
    }

    public function get_verhuurlijst()
    {
        $responsibles = Leider::find([24, 11, 23]);

        return view('alle-info.verhuurlijst', [
            'responsibles' => $responsibles,
        ]);
    }

    public function get_docs()
    {
        return view('alle-info.docs');
    }

    public function get_kost_scouts()
    {
        return view('alle-info.kost_scouts');
    }

    public function get_trooper()
    {
        return view('alle-info.trooper');
    }
}

