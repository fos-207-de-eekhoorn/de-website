<?php

namespace App\Http\Controllers;

use Crypt;
use App\Models\Tak;
use App\Models\Activiteit;
use App\Models\ActiviteitInschrijving;
use App\Models\Evenement;
use App\Models\Setting;
use App\Http\Shared\CommonHelpers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TakkenController extends Controller
{
    use CommonHelpers;

    public function get_takken()
    {
        return view('takken.index');
    }

    public function get_tak_details(Tak $tak)
    {
        $tak->load([
            'identities' => function ($query) {
                $query->orderBy('contact_volgorde', 'asc');
            },
            'activiteiten' => function ($query) {
                $query->whereDate('datum', '>=', date('Y-m-d'));
            },
            'activiteiten.inschrijvingen',
        ]);

        $takken_evenementen_limit = Setting::where('key', 'takken_evenementen_limit')->first()
            ? (int)Setting::where('key', 'takken_evenementen_limit')->first()->value
            : 2;

        $tak_evenementen = Evenement::whereHas('evenement_tak', function ($query) use($tak) {
                return $query->where('tak_id', $tak->id);
            })
            ->where('active', '1')
            ->whereDate('start_datum', '>=', Carbon::now('Europe/Berlin')->format('Y-m-d'))
            ->with('evenement_tak')
            ->orderBy('start_datum','ASC')
            ->limit($takken_evenementen_limit)
            ->get();

        $limit = $this->get_limit_inschrijvingen_tak($tak->slug);

        return view('takken.details', [
            'tak' => $tak,
            'limit' => $limit,
            'tak_evenementen' => $tak_evenementen,
        ]);
    }

    public function get_tak_inschrijven($id_encrypted)
    {
        try {
            $id = Crypt::decrypt($id_encrypted);
        } catch (DecryptException $e) {
            Session::flash('error_activiteit_not_found');

            return redirect()->route('takken');
        }

        $activiteit = Activiteit::where('id', $id)
            ->with([
                'tak'
            ])
            ->first();

        return view('takken.inschrijven', [
            'activiteit' => $activiteit,
        ]);
    }

    public function post_tak_inschrijven(Request $request)
    {
        $validatedData = $request->validate([
            'activiteit_id' => 'required',
            'voornaam' => 'required',
            'achternaam' => 'required',
        ]);

        $inschrijving = ActiviteitInschrijving::where('activiteit_id', $request->activiteit_id)
            ->where('voornaam', $request->voornaam)
            ->where('achternaam', $request->achternaam)
            ->get()->count();

        $tak = Activiteit::where('id', $request->activiteit_id)
            ->with([
                'tak',
            ])
            ->first()->tak->slug;

        if ($inschrijving > 0) {
            Session::flash('success_inschrijving');
            return redirect()->route('takken.details', ['slug' => $tak]);
        }

        $inschrijvingen = ActiviteitInschrijving::where('activiteit_id', $request->activiteit_id)
            ->with([
                'activiteit',
                'activiteit.tak'
            ])
            ->get();
        $inschrijvingen_amount = $inschrijvingen->count();
        $limit = $this->get_limit_inschrijvingen_tak($tak);

        if ($inschrijvingen_amount < $limit) {
            $new_inschrijving = new ActiviteitInschrijving;
            $new_inschrijving->activiteit_id = $request->activiteit_id;
            $new_inschrijving->voornaam = $request->voornaam;
            $new_inschrijving->achternaam = $request->achternaam;

            $confirm = $new_inschrijving->save();

            if ($confirm) Session::flash('success_inschrijving');
            else {
                Session::flash('error');
                return redirect()->back()->withInput();
            }
        } else Session::flash('error_full');

        return redirect()->route('takken.details', ['tak' => $tak]);
    }
}
