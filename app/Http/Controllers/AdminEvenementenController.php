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
        $evenementen = Evenement::orderBy('start_datum','ASC')
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
    }

    public function get_edit_evenementen($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);
        $evenement = Evenement::where('id', $id)
            ->first();
        $urls = Evenement::pluck('url')->toArray();

        if (is_object($evenement)) {
            return view('admin.evenementen.edit_evenement', [
                'evenement' => $evenement,
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
            'page_content' => 'required_if:has_static_page,on',
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

        if ($request->has_static_page === 'on') {
            $evenement->has_static_page = '1';
            $evenement->omschrijving = $request->page_content;
        } else {
            $evenement->has_static_page = '0';
        }

        $edit = $evenement->save();
        // $edit = 0;

        if ($edit) {
            Session::flash('edit_success');
            return redirect('/admin/evenementen/');
        } else {
            Session::flash('edit_error');
            return redirect()->back()->withInput();
        }
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
