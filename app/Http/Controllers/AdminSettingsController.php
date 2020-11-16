<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_settings()
    {
        $settings = Setting::get();

        return view('admin.settings.index', [
            'settings' => $settings,
        ]);
    }

    public function get_edit_settings($id_encrypted)
    {
        $id = Crypt::decrypt($id_encrypted);
        $setting = Setting::with('setting_options')
            ->find($id);

        return view('admin.settings.edit', [
            'setting' => $setting,
        ]);
    }

    public function edit_settings(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'value' => 'required',
        ]);

        $setting = Setting::find($request->id);
        $setting->value = $request->value;
        $edit = $setting->save();

        if ($edit) {
            Session::flash('edit_success');
            return redirect('/admin/settings/');
        } else {
            Session::flash('error');
            return redirect()->back()->withInput();
        }
    }
}
