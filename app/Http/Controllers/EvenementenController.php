<?php

namespace App\Http\Controllers;

class EvenementenController extends Controller
{
    public function get_alle_evenementen()
    {
        return view('evenementen.evenementen');
    }

    public function get_event_startdag()
    {
        return view('evenementen.startdag');
    }
}
