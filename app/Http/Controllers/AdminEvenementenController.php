<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\Evenement;
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
        $evenementen = Evenement::get();

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
            'page_content' => 'required_if:has_static_page,on',
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

        if ($request->has_static_page === 'on') {
            $new_evenement->has_static_page = '1';
            $new_evenement->omschrijving = $request->page_content;
        } else {
            $new_evenement->has_static_page = '0';
        }

        $add = $new_evenement->save();

        if ($add) {
            Session::flash('add_success');
            return redirect('/admin/evenementen/');
        } else {
            Session::flash('add_error');
            return redirect()->back()->withInput();
        }

        return redirect('/admin/activiteiten/' . strtolower($tak->naam));
    }

    public function get_edit_evenementen($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);
        $evenement = Evenement::where('id', $id)
            ->first();

        if (is_object($evenement)) {
            return view('admin.evenementen.edit_evenement', [
                'evenement' => $evenement,
            ]);
        } else {
            return view('admin.evenementen.evenementen');
        }
    }

    public function post_edit_evenementen(Request $request)
    {
        $evenement = Evenement::find($request->id);

        $evenement->begin_datum = $request->begin_datum[2] . '-' . $request->begin_datum[1] . '-' . $request->begin_datum[0];
        $evenement->eind_datum = $request->eind_datum[2] . '-' . $request->eind_datum[1] . '-' . $request->eind_datum[0];

        return $evenement;

        if ($request->is_activiteit === 'on') {
            $activiteit->start_uur = $request->start_uur . ':00';
            $activiteit->eind_uur = $request->eind_uur . ':00';
            $activiteit->prijs = $request->prijs;
            $activiteit->locatie = $request->locatie;
            $activiteit->omschrijving = $request->omschrijving;
            $activiteit->is_activiteit = '1';
        } else {
            $activiteit->is_activiteit = '0';
        }

        $edit = $activiteit->save();

        if ($edit) {
            Session::flash('edit_success');
        } else {
            Session::flash('edit_error');
        }

        return redirect('/admin/activiteiten/' . $request->tak);
    }

/*
    public function delete_evenementen(Request $request)
    {
        $delete = Activiteit::destroy($request->id);

        if ($delete) {
            Session::flash('delete_success', $request->id);
        } else {
            Session::flash('delete_error');
        }

        return redirect('/admin/activiteiten/' . $request->tak);
    }

    public function delete_activiteit_undo(Request $request)
    {
        $restore = Activiteit::withTrashed()->find($request->id)->restore();

        if ($restore) {
            Session::flash('restore_success', $request->id);
        } else {
            Session::flash('restore_error');
        }

        return redirect('/admin/activiteiten/' . $request->tak);
    }
*/
}
