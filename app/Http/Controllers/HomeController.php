<?php

namespace App\Http\Controllers;

use App\Tak;
use App\Http\Shared\CommonHelpers;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    use CommonHelpers;

    public function get_home()
    {
        $tak_activiteiten = Tak::with([
                'volgende_activiteit',
            ])
            ->limit(4)
            ->get();

        $carousels = (object) [
        // $carousels = [
            'homepage' => $this->ignore_files(Storage::disk('public')->files('img/carousel/homepage/')),
            'general' => $this->ignore_files(Storage::disk('public')->files('img/carousel/general/')),
        ];

        // return $carousels;

        return view('home', [
            'tak_activiteiten' => $tak_activiteiten,
            'carousels' => $carousels,
        ]);
    }

    public function get_contact()
    {
        $el = $this->get_el();
        $ael = $this->get_ael();

        return view('contact', [
            'ael' => $ael,
        ]);
    }

    public function post_contact_message(request $request)
    {
        $validatedData = $request->validate([
            'naam' => 'required',
            'email' => 'required|email',
            'bericht' => 'required',
        ]);

        $contactFormObject = new \stdClass();
        $contactFormObject->naam = $request->naam;
        $contactFormObject->email = $request->email;
        $contactFormObject->bericht = $request->bericht;
        $contactFormObject->actief = $request->actief ? $request->actief : 'off';

        Mail::send(new ContactForm($contactFormObject));
        Session::flash('contact_form_success');

        return redirect()->back();
    }
}
