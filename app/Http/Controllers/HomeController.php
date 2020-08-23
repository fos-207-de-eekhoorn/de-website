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
            'el' => $el,
            'ael' => $ael,
        ]);
    }

    public function post_contact_message(request $request)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha(config('recaptcha.secret'));
        $resp = $recaptcha->setExpectedHostname('scoutsoostkamp.be')
            ->verify($request['g-recaptcha-response'], $request->ip());

        if ($resp->isSuccess()) {
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
            $contactFormObject->kind_naam = $request->kind_naam;
            $contactFormObject->kind_tak = $request->kind_tak;

            Mail::send(new ContactForm($contactFormObject));
            Session::flash('contact_form_success');
        } else {
            Session::flash('contact_form_error_captcha');
        }

        return redirect()->back();
    }

    public function get_inschrijven()
    {
        $el = $this->get_el();
        $ael = $this->get_ael();

        return view('inschrijven', [
            'el' => $el,
            'ael' => $ael,
        ]);
    }
}
