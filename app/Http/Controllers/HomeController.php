<?php

namespace App\Http\Controllers;

use App\Tak;
use App\Inschrijving;
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

    public function post_contact(request $request)
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

    public function post_inschrijven(request $request)
    {
        $request->validate([
            // Lid
            'voornaam' => 'required',
            'achternaam' => 'required',
            'geboortedatum' => 'required',
            'straat' => 'required',
            'nummer' => 'required',
            'postcode' => 'required',
            'land' => 'required',

            // Voogd 1
            'voogd_1_voornaam' => 'required',
            'voogd_1_achternaam' => 'required',
            'voogd_1_email' => 'required',
            'voogd_1_telefoon' => 'required',

            // Voogd 2
            'voogd_2_voornaam' => 'required',
            'voogd_2_achternaam' => 'required',
            'voogd_2_email' => 'required',
            'voogd_2_telefoon' => 'required',
        ]);

        $new_inschrijving = new Inschrijving;

        $new_inschrijving->voornaam = $request->voornaam;
        $new_inschrijving->achternaam = $request->achternaam;
        $new_inschrijving->email = $request->email;
        $new_inschrijving->telefoon = $request->telefoon;
        $new_inschrijving->geslacht = $request->geslacht;
        $new_inschrijving->geboortedatum = $request->geboortedatum[0].$request->geboortedatum[1].$request->geboortedatum[2];
        $new_inschrijving->straat = $request->straat;
        $new_inschrijving->nummer = $request->nummer;
        $new_inschrijving->bus = $request->bus;
        $new_inschrijving->postcode = $request->postcode;
        $new_inschrijving->plaats = $request->plaats;
        $new_inschrijving->land = $request->land;
        $new_inschrijving->medisch = $request->medisch;
        $new_inschrijving->voogd_1_voornaam = $request->voogd_1_voornaam;
        $new_inschrijving->voogd_1_achternaam = $request->voogd_1_achternaam;
        $new_inschrijving->voogd_1_email = $request->voogd_1_email;
        $new_inschrijving->voogd_1_telefoon = $request->voogd_1_telefoon;
        $new_inschrijving->voogd_1_straat = $request->voogd_1_straat;
        $new_inschrijving->voogd_1_nummer = $request->voogd_1_nummer;
        $new_inschrijving->voogd_1_bus = $request->voogd_1_bus;
        $new_inschrijving->voogd_1_postcode = $request->voogd_1_postcode;
        $new_inschrijving->voogd_1_plaats = $request->voogd_1_plaats;
        $new_inschrijving->voogd_1_land = $request->voogd_1_land;
        $new_inschrijving->voogd_2_voornaam = $request->voogd_2_voornaam;
        $new_inschrijving->voogd_2_achternaam = $request->voogd_2_achternaam;
        $new_inschrijving->voogd_2_email = $request->voogd_2_email;
        $new_inschrijving->voogd_2_telefoon = $request->voogd_2_telefoon;
        $new_inschrijving->voogd_2_straat = $request->voogd_2_straat;
        $new_inschrijving->voogd_2_nummer = $request->voogd_2_nummer;
        $new_inschrijving->voogd_2_bus = $request->voogd_2_bus;
        $new_inschrijving->voogd_2_postcode = $request->voogd_2_postcode;
        $new_inschrijving->voogd_2_plaats = $request->voogd_2_plaats;
        $new_inschrijving->voogd_2_land = $request->voogd_2_land;

        $inschrijving = $new_inschrijving->save();

        if ($inschrijving) {
            Session::flash('inschrijving_success');
        } else {
            Session::flash('inschrijving_error');
        }

        return redirect('/inschrijven');
    }
}
