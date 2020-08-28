<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\ActiviteitInschrijving;
use Illuminate\Http\Request;

class ApiAdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function PostSetAanwezig(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'activiteit_id' => 'required',
            'status' => 'required',
        ]);

        $update_inschrijving = ActiviteitInschrijving::where('id', $request->id)
            ->where('activiteit_id', $request->activiteit_id)
            ->first();

        $update_inschrijving->is_aanwezig = $request->status;
        $is_saved = $update_inschrijving->save();

        return $update_inschrijving;
    }
}
