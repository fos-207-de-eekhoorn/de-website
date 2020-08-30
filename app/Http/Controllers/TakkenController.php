<?php

namespace App\Http\Controllers;

use Crypt;
use App\Tak;
use App\Activiteit;
use App\ActiviteitInschrijving;
use App\Http\Shared\CommonHelpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TakkenController extends Controller
{
    use CommonHelpers;

    public function get_takken()
    {
        return view('takken.takken');
    }

    public function get_tak_details($link)
    {
        $tak = Tak::where('link', $link)
            ->with([
                'leiding_tak' => function ($query) {
                    $query->orderBy('is_tl', 'desc');
                    $query->orderBy('contact_volgorde', 'asc');
                },
                'leiding_tak.leider',
                'activiteiten' => function ($query) {
                    $query->whereDate('datum', '>=', date('Y-m-d'));
                },
                'activiteiten.inschrijvingen',
            ])
            ->first();

        if (is_object($tak)) {
            return view('takken.tak_details', [
                'tak' => $tak,
            ]);
        } else { // todo
            return $naam;
            Session::flash('error');

            return redirect('login');
        }
    }

    public function get_tak_inschrijven($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);
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
            ->first()->tak->link;

        if ($inschrijving > 0) {
            Session::flash('success_inschrijving');
            return redirect('/takken/'.$tak);
        }

        $inschrijvingen = ActiviteitInschrijving::where('activiteit_id', $request->activiteit_id)
            ->with([
                'activiteit',
                'activiteit.tak'
            ])
            ->get();
        $inschrijvingen_amount = $inschrijvingen->count();

        if ($inschrijvingen_amount < config('activiteit.max_inschrijvingen.'.$tak)) {
            $new_inschrijving = new ActiviteitInschrijving;
            $new_inschrijving->activiteit_id = $request->activiteit_id;
            $new_inschrijving->voornaam = $request->voornaam;
            $new_inschrijving->achternaam = $request->achternaam;

            $confirm = $new_inschrijving->save();

            if ($confirm) {
                Session::flash('success_inschrijving');
                return redirect('/takken/'.$tak);
            } else {
                Session::flash('error');
                return redirect()->back()->withInput();
            }
        } else {
            Session::flash('error_full');
            return redirect('/takken/'.$tak);
        }
    }
}
