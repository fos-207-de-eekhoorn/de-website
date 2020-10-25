<?php

namespace App\Http\Controllers;

use App\Evenement;
use App\Leider;
use Illuminate\Support\Facades\Session;

class EvenementenController extends Controller
{
    public function get_alle_evenementen()
    {
        $evenementen = Evenement::where('active', 1)
            ->whereDate('eind_datum', '>=', date('Y-m-d'))
            ->orderBy('start_datum', 'asc')
            ->with([
                'evenement_tak',
                'evenement_tak.tak',
            ])
            ->get();

        return view('evenementen.evenementen', [
            'evenementen' => $evenementen,
        ]);
    }

    public function get_evenement_details($url)
    {
        $evenement = Evenement::where('url', $url)
            ->with([
                'evenement_tak',
                'evenement_tak.tak',
            ])
            ->first();

        if (is_object($evenement)) {
            return view('evenementen.evenement_details', [
                'evenement' => $evenement,
            ]);
        } else {
            Session::flash('warning_not_found');

            return redirect('evenementen');
        }
    }

    public function get_event_startdag()
    {
        return view('evenementen.startdag');
    }

    public function get_event_sneukeltocht()
    {
        return view('evenementen.sneukeltocht');
    }

    public function get_event_spaghetti_avond()
    {
        return view('evenementen.spaghetti_avond');
    }

    public function get_event_bbq()
    {
        return view('evenementen.bbq');
    }

    public function get_event_winterbar()
    {
        return view('evenementen.winterbar');
    }

    public function get_event_halloweentocht()
    {
        return view('evenementen.halloweentocht');
    }

    public function get_event_eikeltjesquiz()
    {
        return view('evenementen.eikeltjesquiz');
    }

    public function get_bivak_bevers_welpen()
    {
        $takleiders_ids = [2, 10];
        $takleiders_ids_ordered = implode(',', $takleiders_ids);
        $takleiders = Leider::whereIn('id', $takleiders_ids)
            ->orderByRaw("FIELD(id, $takleiders_ids_ordered)")
            ->get();

        return view('evenementen.bivak.bevers_welpen', [
            'takleiders' => $takleiders,
        ]);
    }

    public function get_bivak_jonge()
    {
        $takleiders_ids = [18];
        $takleiders_ids_ordered = implode(',', $takleiders_ids);
        $takleiders = Leider::whereIn('id', $takleiders_ids)
            ->orderByRaw("FIELD(id, $takleiders_ids_ordered)")
            ->get();

        return view('evenementen.bivak.jonge', [
            'takleiders' => $takleiders,
        ]);
    }

    public function get_bivak_oude()
    {
        $takleiders_ids = [25];
        $takleiders_ids_ordered = implode(',', $takleiders_ids);
        $takleiders = Leider::whereIn('id', $takleiders_ids)
            ->orderByRaw("FIELD(id, $takleiders_ids_ordered)")
            ->get();

        return view('evenementen.bivak.oude', [
            'takleiders' => $takleiders,
        ]);
    }

    public function get_kamp()
    {
        $takleiders_ids = [2, 10, 18, 25];
        $takleiders_ids_ordered = implode(',', $takleiders_ids);
        $takleiders = Leider::whereIn('id', $takleiders_ids)
            ->orderByRaw("FIELD(id, $takleiders_ids_ordered)")
            ->get();

        return view('evenementen.kamp', [
            'takleiders' => $takleiders,
        ]);
    }
}
