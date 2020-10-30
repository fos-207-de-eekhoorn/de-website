<?php

namespace App\Http\Controllers;

use App\Leider;
use App\Http\Shared\CommonHelpers;

class InfoController extends Controller
{
    use CommonHelpers;

    public function get_alle_info()
    {
        $el = $this->get_all_el();

        return view('alle-info.algemene_info', [
            'el' => $el,
        ]);
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
        $el = $this->get_el();
        $ael_leden = $this->get_ael_leden();

        return view('alle-info.docs', [
            'el' => $el,
            'ael_leden' => $ael_leden,
        ]);
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
