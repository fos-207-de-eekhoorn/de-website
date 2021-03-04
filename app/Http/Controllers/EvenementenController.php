<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Identity;
use App\Models\Role;
use App\Http\Shared\CommonHelpers;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class EvenementenController extends Controller
{
    use CommonHelpers;

    public function get_alle_evenementen()
    {
        $evenementen = Evenement::where('active', '1')
            ->whereDate('eind_datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'))
            ->orderBy('start_datum','ASC')
            ->with([
                'evenement_tak',
                'evenement_tak.tak',
            ])
            ->get();

        return view('evenementen.index', [
            'evenementen' => $evenementen,
        ]);
    }

    public function get_evenement_details(Evenement $evenement)
    {
        $evenement->load([
            'evenement_tak',
            'evenement_tak.tak',
        ]);

        return view('evenementen.details', [
            'evenement' => $evenement,
        ]);
    }

    public function get_event_startdag() { return view('evenementen.startdag'); }
    public function get_event_sneukeltocht() { return view('evenementen.sneukeltocht'); }
    public function get_event_spaghetti_avond() { return view('evenementen.spaghetti_avond'); }
    public function get_event_bbq() { return view('evenementen.bbq'); }
    public function get_event_winterbar() { return view('evenementen.winterbar'); }
    public function get_event_halloweentocht() { return view('evenementen.halloweentocht'); }
    public function get_event_eikeltjesquiz() { return view('evenementen.eikeltjesquiz'); }

    public function get_bivak_bevers_welpen()
    {
        $takleiders_ids = [2, 10];
        $takleiders_ids_ordered = implode(',', $takleiders_ids);
        $takleiders = Identity::whereIn('id', $takleiders_ids)
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
        $takleiders = Identity::whereIn('id', $takleiders_ids)
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
        $takleiders = Identity::whereIn('id', $takleiders_ids)
            ->orderByRaw("FIELD(id, $takleiders_ids_ordered)")
            ->get();

        return view('evenementen.bivak.oude', [
            'takleiders' => $takleiders,
        ]);
    }

    public function get_kamp($year = null)
    {
        $kampen = array_keys(config('evenementen.kampen'));

        if ($year) {
            if (!in_array($year, $kampen)) return view('evenementen.kamp_not_found', ['year' => $year]);
            $takleiders = $this->get_identities_through_ids(
                config('evenementen.kampen')[$year]['tl_ids'],
                ['tak']
            );
        } else {
            $year = array_key_last(config('evenementen.kampen'));
            $takleiders = $this->get_all_tl();
        }

        return view('evenementen.kamp_'.$year, [
            'takleiders' => $takleiders,
            'year' => $year,
        ]);
    }
}
