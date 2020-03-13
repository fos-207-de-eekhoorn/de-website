<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangePasswordForm()
    {
        return view('auth/passwords.change');
    }

    public function changePassword(Request $request)
    {
        if (! (Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with('error', __('passwords.passwords_should_match'));
        }
        if (0 == strcmp($request->get('current-password'), $request->get('new-password'))) {
            //Current password and new password are same
            return redirect()->back()->with('error', __('passwords.new_password_same_as_old'));
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect('/')->with('success', __('passwords.new_password'));
    }
}
