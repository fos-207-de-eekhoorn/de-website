<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\ActiviteitInschrijving;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function PostSetAanwezig(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);

        $update_inschrijving = ActiviteitInschrijving::where('id', $request->id)
            ->first();

        $update_inschrijving->is_aanwezig = $request->status;
        $is_saved = $update_inschrijving->save();

        if ($is_saved) return 'true';
        else return 'false';
    }
}
