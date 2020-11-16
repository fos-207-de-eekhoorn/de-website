<?php

namespace App\Http\Controllers;

use Auth;
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
        $settings = setting::get();

        return view('admin.settings.index', [
            'settings' => $settings,
        ]);
    }
}
