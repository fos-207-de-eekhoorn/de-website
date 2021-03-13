<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function get_admin()
    {
        $user = User::where('id', Auth::user()->id)
            ->with([
                'identity',
                'identity.tak',
                'identity.roles',
            ])->first();

        return view('admin.index', [
            'user' => $user,
        ]);
    }
}
