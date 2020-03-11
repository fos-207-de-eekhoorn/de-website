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

        //return $takken;

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

    public function edit_activiteit($id_encrypted)
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
