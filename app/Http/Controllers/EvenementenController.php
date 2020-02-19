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

    public function get_event_bbq()
    {
        return view('evenementen.bbq');
    }

    public function get_event_winterbar()
    {
        return view('evenementen.winterbar');
    }

    public function get_event_halloweentocht()
    {
        return view('evenementen.halloweentocht');
    }

    public function get_event_eikeltjesquiz()
    {
        return view('evenementen.eikeltjesquiz');
    }

    public function get_bivak_bevers_welpen()
    {
        return view('evenementen.bivak.bevers_welpen');
    }

    public function get_bivak_jonge()
    {
        return view('evenementen.bivak.jonge');
    }

    public function get_bivak_oude()
    {
        return view('evenementen.bivak.oude');
    }
}
