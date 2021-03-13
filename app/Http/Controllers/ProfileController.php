<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
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
        $validatedData = $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'user_email' => 'required|email',
            'email' => 'required|email',
            'geslacht' => ['required', Rule::in(config('identity.genders'))],
            'telefoon' => 'required',
        ]);

        Auth::user()->update([
            'email' => $request->user_email,
        ]);
        Auth::user()->identity->update($request->only([
            'voornaam',
            'achternaam',
            'voortotem',
            'totem',
            'welpennaam',
            'email',
            'geslacht',
            'telefoon',
        ]));

        return redirect()->route('profile');
    }
}
