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
        $takken = Tak::get();

        return view('takken.takken', [
            'takken' => $takken,
        ]);
    }

    public function get_tak_details($naam)
    {
        $tak = Tak::where('naam', $naam)
            ->with([
                'leiding_tak' => function ($query) {
                    $query->orderBy('is_tl', 'desc');
                    $query->orderBy('contact_volgorde', 'asc');
                },
                'leiding_tak.leider',
                'activiteiten' => function ($query) {
                    $query->whereDate('datum', '>=', date('Y-m-d'));
                },
            ])
            ->first();

        // return $tak;

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

        // return $activiteit;

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

        $new_inschrijving = new ActiviteitInschrijving;
        $new_inschrijving->activiteit_id = $request->activiteit_id;
        $new_inschrijving->voornaam = $request->voornaam;
        $new_inschrijving->achternaam = $request->achternaam;

        $confirm = $new_inschrijving->save();

        if ($confirm) {
            Session::flash('success_inschrijving');

            $activiteit = Activiteit::where('id', $request->activiteit_id)
                ->with([
                    'tak'
                ])
                ->first();

            return redirect('/takken/'.$activiteit->tak->link);
        } else {
            Session::flash('error');
            return redirect()->back()->withInput();
        }
    }
}
