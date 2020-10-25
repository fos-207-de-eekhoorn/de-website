<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\Evenement;
use App\EvenementTak;
use App\Activiteit;
use App\Tak;
use App\Http\Shared\CommonHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminEvenementenController extends Controller
{
    use CommonHelpers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_evenementen()
    {
        $evenementen = Evenement::whereDate('eind_datum', '>=', Carbon::now('Europe/Berlin')->subDays(6)->format('Y-m-d'))
            ->orderBy('start_datum','ASC')
            ->orderBy('eind_datum','ASC')
            ->get();

        return view('admin.evenementen.evenementen', [
            'evenementen' => $evenementen,
        ]);
    }

    public function get_add_evenementen()
    {
        $takken = Tak::get();
        $urls = Evenement::pluck('url')->toArray();

        return view('admin.evenementen.add_evenement', [
            'takken' => $takken,
            'urls' => $urls,
        ]);
    }

    public function post_add_evenementen(Request $request)
    {
        $validatedData = $request->validate([
            'naam' => 'required',
            'locatie' => 'required',
            'prijs' => 'required',
            'snelle_info' => 'required',
            'url' => 'required|unique:evenementen,url',
            'start' => 'required',
            'eind' => 'required',
            'banner_color' => 'required_if:has_static_page,off',
            'banner_pattern' => 'required_if:has_static_page,off',
            'banner_pattern' => 'required_if:has_static_page,off',
            'page_content' => 'required_if:has_static_page,off',
        ]);

        $start = explode('T', $request->start);
        $eind = explode('T', $request->eind);

        $new_evenement = new Evenement;

        $new_evenement->naam = $request->naam;
        $new_evenement->locatie = $request->locatie;
        $new_evenement->prijs = $request->prijs;
        $new_evenement->snelle_info = $request->snelle_info;
        $new_evenement->url = $request->url;
        $new_evenement->start_datum = $start[0];
        $new_evenement->eind_datum = $eind[0];
        $new_evenement->start_uur = $start[1];
        $new_evenement->eind_uur = $eind[1];

        if ($request->has_static_page !== 'on') {
            $new_evenement->has_static_page = '0';
            $new_evenement->kleur = $request->banner_color;
            $new_evenement->banner_patroon = $request->banner_pattern;
            $new_evenement->banner_sterkte = $request->banner_strenght;
            $new_evenement->omschrijving = $request->page_content;
        } else {
            $new_evenement->has_static_page = '1';
        }

        $add = $new_evenement->save();

        if (isset($request->tak)) foreach($request->tak as $tak_id) {
            $new_evenement_tak = new EvenementTak;

            $new_evenement_tak->evenement_id = $new_evenement->id;
            $new_evenement_tak->tak_id = $tak_id;

            $new_evenement_tak->save();
        }

        if ($add) {
            Session::flash('add_success');
            return redirect('/admin/evenementen/');
        } else {
            Session::flash('add_error');
            return redirect()->back()->withInput();
        }
    }

    public function get_edit_evenementen($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);
        $takken = Tak::get();
        $evenement = Evenement::where('id', $id)
            ->first();
        $urls = Evenement::pluck('url')->toArray();

        if (is_object($evenement)) {
            return view('admin.evenementen.edit_evenement', [
                'evenement' => $evenement,
                'takken' => $takken,
                'urls' => $urls,
            ]);
        } else {
            return view('admin.evenementen.evenementen');
        }
    }

    public function post_edit_evenementen(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'naam' => 'required',
            'locatie' => 'required',
            'prijs' => 'required',
            'snelle_info' => 'required',
            'url' => 'required|unique:evenementen,url,'.$request->id,
            'start' => 'required',
            'eind' => 'required',
            'banner_color' => 'required_if:has_static_page,off',
            'banner_pattern' => 'required_if:has_static_page,off',
            'banner_pattern' => 'required_if:has_static_page,off',
            'page_content' => 'required_if:has_static_page,off',
        ]);

        $start = explode('T', $request->start);
        $eind = explode('T', $request->eind);

        $evenement = Evenement::find($request->id);

        $evenement->naam = $request->naam;
        $evenement->locatie = $request->locatie;
        $evenement->prijs = $request->prijs;
        $evenement->snelle_info = $request->snelle_info;
        $evenement->url = $request->url;
        $evenement->start_datum = $start[0];
        $evenement->eind_datum = $eind[0];
        $evenement->start_uur = $start[1];
        $evenement->eind_uur = $eind[1];

        if ($request->has_static_page !== 'on') {
            $evenement->has_static_page = '0';
            $evenement->banner_patroon = $request->banner_pattern;
            $evenement->banner_sterkte = $request->banner_strenght;
            $evenement->omschrijving = $request->page_content;
        } else {
            $evenement->has_static_page = '1';
        }

        $edit = $evenement->save();

        $evenement_takken = EvenementTak::where('evenement_id', $request->id)
            ->get();

        if ($request->tak) {
            foreach($evenement_takken as $tak) {
                if (!in_array($tak->tak_id, $request->tak)) {
                    EvenementTak::destroy($tak->id);
                }
            }

            foreach($request->tak as $tak_id) {
                if (!in_array($tak_id, $evenement->evenement_tak_ids)) {
                    $new_evenement_tak = new EvenementTak;
                    $new_evenement_tak->evenement_id = $request->id;
                    $new_evenement_tak->tak_id = $tak_id;
                    $new_evenement_tak->save();
                }
            }
        } else {
            foreach($evenement_takken as $tak) {
                EvenementTak::destroy($tak->id);
            }
        }

        if ($edit) {
            Session::flash('edit_success');
            return redirect('/admin/evenementen/');
        } else {
            Session::flash('edit_error');
            return redirect()->back()->withInput();
        }
    }

    public function delete_activiteit(Request $request)
    {
        $delete = Evenement::destroy($request->id);

        if ($delete) {
            Session::flash('delete_success', $request->id);
        } else {
            Session::flash('delete_error');
        }

        return redirect('/admin/evenementen/');
    }

    public function delete_activiteit_undo(Request $request)
    {
        $restore = Evenement::withTrashed()->find($request->id)->restore();

        if ($restore) {
            Session::flash('restore_success', $request->id);
        } else {
            Session::flash('restore_error');
        }

        return redirect('/admin/evenementen/');
    }
}
