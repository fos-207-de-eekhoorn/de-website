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
        $responsibles_ids = [27, 25, 37, 31];
        $responsibles_ids_ordered = implode(',', $responsibles_ids);
        $responsibles = Leider::whereIn('id', $responsibles_ids)
            ->orderByRaw("FIELD(id, $responsibles_ids_ordered)")
            ->get();

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

    public function get_jeugdwerkregels()
    {
        return view('alle-info.jeugdwerkregels');
    }
}
