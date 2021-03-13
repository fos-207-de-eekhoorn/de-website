<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function get_profile()
    {
        $user = User::where('id', Auth::user()->id)
            ->with([
                'identity',
                'identity.tak',
                'identity.roles',
            ])->first();

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function get_edit()
    {
        $user = User::where('id', Auth::user()->id)
            ->with([
                'identity',
            ])->first();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function post_edit(Request $request)
    {
        return $request;
    }
}
