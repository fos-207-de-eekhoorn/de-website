<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\Tak;
use App\Activiteit;
use App\ActiviteitInschrijving;
use App\Http\Shared\CommonHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    use CommonHelpers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_activiteiten()
    {
        $takken = Tak::get();

        return view('admin.activiteiten.activiteiten', [
            'takken' => $takken,
        ]);
    }

    public function get_activiteiten_tak($tak)
    {
        $tak = Tak::where('link', $tak)
            ->with([
                'activiteiten' => function ($query) {
                    $query->whereDate('datum', '>=', date('Y-m-d'));;
                },
            ])
            ->first();

        if (is_object($tak)) {
            return view('admin.activiteiten.activiteiten_tak', [
                'tak' => $tak,
            ]);
        } else {
            $takken = Tak::get();

            Session::flash('error');

            return view('admin.activiteiten.activiteiten', [
                'takken' => $takken,
            ]);
        }
    }

    public function get_add_activiteit($link)
    {
        $tak = Tak::where('link', $link)->first();
        $takken = Tak::get();

        return view('admin.activiteiten.add_activiteit', [
            'tak' => $tak,
            'takken' => $takken,
        ]);
    }

    public function post_add_activiteit(Request $request)
    {
        $new_activiteit = new Activiteit;

        $new_activiteit->tak_id = $request->tak;
        $new_activiteit->datum = $request->datum[2] . '-' . $request->datum[1] . '-' . $request->datum[0];

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

        $tak = $tak = Tak::where('id', $request->tak)->first();

        return redirect('/admin/activiteiten/' . strtolower($tak->naam));
    }

    public function get_edit_activiteit($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);
        $activiteit = Activiteit::where('id', $id)
            ->with('tak')
            ->first();

        if (is_object($activiteit)) {
            return view('admin.activiteiten.edit_activiteit', [
                'activiteit' => $activiteit,
            ]);
        } else {
            return view('admin.activiteiten.activiteiten');
        }
    }

    public function post_edit_activiteit(Request $request)
    {
        $activiteit = Activiteit::find($request->id);

        $activiteit->datum = $request->datum[2] . '-' . $request->datum[1] . '-' . $request->datum[0];

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

        return redirect('/admin/activiteiten/' . $activiteit->tak->link);
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

        return redirect('/admin/activiteiten/' . $activiteit->tak->link);
    }

    public function get_activiteiten_tak_inschrijvingen($tak)
    {
        $tak = Tak::where('link', $tak)
            ->with([
                'volgende_activiteit' => function ($query) {
                    $query->limit(1);
                    $query->with([
                        'tak',
                        'inschrijvingen',
                    ]);
                },
            ])
            ->first();

        $activiteit = $tak->volgende_activiteit[0];

        return view('admin.activiteiten.inschrijvingen', [
            'activiteit' => $activiteit,
        ]);
    }

    public function get_activiteit_inschrijvingen($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);

        $activiteit = Activiteit::where('id', $id)
            ->with([
                'tak',
                'inschrijvingen',
            ])
            ->first();

        return view('admin.activiteiten.inschrijvingen', [
            'activiteit' => $activiteit,
        ]);
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
