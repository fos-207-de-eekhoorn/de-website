<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Crypt;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
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
        try {
            $id = Crypt::decrypt($id_encrypted);
        } catch (DecryptException $e) {
            return view('admin.settings.index');
        }

        $setting = Setting::with('setting_options')
            ->find($id);

        if (is_object($setting)) {
            return view('admin.settings.edit', [
                'setting' => $setting,
            ]);
        } else {
            return view('admin.settings.index');
        }
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
            return redirect()->route('admin.settings');
        } else {
            Session::flash('error');
            return redirect()->back()->withInput();
        }
    }
}
