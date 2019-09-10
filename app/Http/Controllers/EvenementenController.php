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

    public function get_event_sneukeltocht()
    {
        return view('evenementen.sneukeltocht');
    }

    public function get_event_spaghetti_avond()
    {
        return view('evenementen.spaghetti_avond');
    }
}
