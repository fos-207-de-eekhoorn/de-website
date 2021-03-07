<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use App\Models\Tak;
use App\Models\Activiteit;
use App\Models\ActiviteitInschrijving;
use App\Http\Shared\CommonHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActiviteitenController extends Controller
{
    use CommonHelpers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_activiteiten()
    {
        return view('admin.activiteiten.index');
    }

    public function get_activiteiten_tak(Tak $tak)
    {
        $tak->load([
            'activiteiten' => function ($query) {
                $query->whereDate('datum', '>=', date('Y-m-d'));;
            },
        ]);

        return view('admin.activiteiten.tak', [
            'tak' => $tak,
        ]);
    }

    public function get_add_activiteit(Tak $tak)
    {
        return view('admin.activiteiten.add', [
            'tak' => $tak,
        ]);
    }

    public function post_add_activiteit(Request $request)
    {
        $new_activiteit = new Activiteit;

        $new_activiteit->tak_id = $request->tak;
        $new_activiteit->datum = $request->datum;

        if ($request->is_activiteit === 'on') {
            $new_activiteit->start_uur = $request->start_uur . ':00';
            $new_activiteit->eind_uur = $request->eind_uur . ':00';
            $new_activiteit->prijs = $request->prijs;
            $new_activiteit->locatie = $request->locatie;
            $new_activiteit->omschrijving = $request->omschrijving;
            $new_activiteit->is_activiteit = '1';
        } else {
            $new_activiteit->is_activiteit = '0';
        }

        $add = $new_activiteit->save();

        if ($add) {
            Session::flash('add_success');
        } else {
            Session::flash('add_error');
        }

        $slug = Tak::where('id', $request->tak)->first()->slug;

        return redirect()->route('admin.activiteiten.tak', ['tak' => $slug]);
    }

    public function get_edit_activiteit($id_encrypted)
    {
        try {
            $id = Crypt::decrypt($id_encrypted);
        } catch (DecryptException $e) {
            return view('admin.activiteiten.index');
        }

        $activiteit = Activiteit::where('id', $id)
            ->with('tak')
            ->first();

        if (is_object($activiteit)) {
            return view('admin.activiteiten.edit', [
                'activiteit' => $activiteit,
            ]);
        } else {
            return view('admin.activiteiten.index');
        }
    }

    public function post_edit_activiteit(Request $request)
    {
        $activiteit = Activiteit::find($request->id);

        $activiteit->datum = $request->datum;

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

        return redirect()->route('admin.activiteiten.tak', ['tak' => $request->tak]);
    }

    public function delete_activiteit(Request $request)
    {
        $activiteit = Activiteit::where('id', $request->id)
            ->with(['tak'])
            ->first();

        $delete = Activiteit::destroy('id', $request->id);

        if ($delete) {
            Session::flash('delete_success', $request->id);
        } else {
            Session::flash('delete_error');
        }

        return redirect()->route('admin.activiteiten.tak', ['tak' => $activiteit->tak->slug]);
    }

    public function delete_activiteit_undo(Request $request)
    {
        $restore = Activiteit::withTrashed()->find($request->id)->restore();
        $activiteit = Activiteit::where('id', $request->id)
            ->with(['tak'])
            ->first();

        if ($restore) {
            Session::flash('restore_success');
        } else {
            Session::flash('restore_error');
        }

        return redirect()->route('admin.activiteiten.tak', ['tak' => $activiteit->tak->slug]);
    }

    public function get_activiteiten_tak_inschrijvingen(Tak $tak)
    {
        $tak->load([
            'volgende_activiteit' => function ($query) {
                $query->limit(1);
                $query->with([
                    'tak',
                    'inschrijvingen',
                ]);
            },
        ]);

        if (sizeof($tak->volgende_activiteit) > 0) {
            $activiteit = $tak->volgende_activiteit[0];

            return view('admin.activiteiten.inschrijvingen', [
                'activiteit' => $activiteit,
            ]);
        } else {
            Session::flash('no_next_activity');
            return view('admin.activiteiten.index');
        }

    }

    public function get_activiteit_inschrijvingen($id_encrypted)
    {
        try {
            $id = Crypt::decrypt($id_encrypted);
        } catch (DecryptException $e) {
            return view('admin.activiteiten.index');
        }

        $activiteit = Activiteit::where('id', $id)
            ->with([
                'tak',
                'inschrijvingen',
            ])
            ->first();

        if (is_object($activiteit)) {
            return view('admin.activiteiten.inschrijvingen', [
                'activiteit' => $activiteit,
            ]);
        } else {
            return view('admin.activiteiten.index');
        }

    }

    public function delete_activiteit_inschrijvingen(Request $request)
    {
        $delete = ActiviteitInschrijving::destroy('id', $request->id);

        if ($delete) {
            Session::flash('delete_success', $request->id);
        } else {
            Session::flash('delete_error');
        }

        return redirect()->back();
    }

    public function delete_activiteit_inschrijvingen_undo(Request $request)
    {
        $restore = ActiviteitInschrijving::withTrashed()->find($request->id)->restore();

        if ($restore) {
            Session::flash('restore_success');
        } else {
            Session::flash('restore_error');
        }

        return redirect()->back();
    }
}
