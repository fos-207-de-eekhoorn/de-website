<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\Tak;
use App\activiteit;
use App\Http\Shared\CommonHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function get_activiteiten_tak($naam)
    {
        $tak = Tak::where('naam', $naam)
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

    public function get_add_activiteit($tak = NULL) {
        $takken = Tak::get();

        $data = [
            'takken' => $takken,
        ];

        if ($tak) {
            $tak = Tak::where('naam', $tak)->first();

            if (is_object($tak)) {
                $data = [
                    'tak' => $tak,
                    'takken' => $takken,
                ];
            }
        }

        return view('admin.activiteiten.add_activiteit', $data);
    }

    public function post_add_activiteit(Request $request) {
        $new_activiteit = new Activiteit;

        $new_activiteit->tak_id = $request->tak;
        $new_activiteit->datum = $request->datum[2] . '-' . $request->datum[1] . '-' . $request->datum[0];
        $new_activiteit->start_uur = $request->start_uur . ':00';
        $new_activiteit->eind_uur = $request->eind_uur . ':00';
        $new_activiteit->prijs = $request->prijs;
        $new_activiteit->locatie = $request->locatie;
        $new_activiteit->omschrijving = $request->omschrijving;

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
        $activiteit->start_uur = $request->start_uur . ':00';
        $activiteit->eind_uur = $request->eind_uur . ':00';
        $activiteit->prijs = $request->prijs;
        $activiteit->locatie = $request->locatie;
        $activiteit->omschrijving = $request->omschrijving;

        $edit = $activiteit->save();

        if ($edit) {
            Session::flash('edit_success');
        } else {
            Session::flash('edit_error');
        }

        return redirect('/admin/activiteiten/' . $request->tak);
    }
}
