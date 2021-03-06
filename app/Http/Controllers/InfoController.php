<?php

namespace App\Http\Controllers;

use App\Models\Inschrijving;
use App\Models\Role;
use App\Models\BlogPost;
use App\Http\Shared\CommonHelpers;
use App\Mail\InschrijvingFormToScouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class InfoController extends Controller
{
    use CommonHelpers;

    public function get_alle_info()
    {
        return view('alle-info.index');
    }

    public function get_lid_worden()
    {
        $el_leiding = $this->get_all_el();

        return view('alle-info.lid_worden', [
            'el_leiding' => $el_leiding,
        ]);
    }

    public function get_uniform_shop()
    {
        $collection = Role::where('key', config('roles.keys.fos_shop'))
            ->with('identities')
            ->first();
        
        $responsibles = $collection->identities;
        $role = $collection->name;

        return view('alle-info.uniform_shop', [
            'responsibles' => $responsibles,
        ]);
    }

    public function get_verhuurlijst()
    {
        $collection = Role::where('key', config('roles.keys.materiaal'))
            ->with('identities')
            ->first();
        
        $responsibles = $collection->identities;
        $role = $collection->name;

        return view('alle-info.verhuurlijst', [
            'responsibles' => $responsibles,
            'role' => $role,
        ]);
    }

    public function get_docs()
    {
        $ael_leden = $this->get_el_leden();

        return view('alle-info.docs', [
            'ael_leden' => $ael_leden,
        ]);
    }

    public function get_kost_scouts()
    {
        return view('alle-info.kost_scouts');
    }

    public function get_trooper()
    {
        return view('alle-info.trooper');
    }

    public function get_jeugdwerkregels()
    {
        $corona_blog_posts = BlogPost::where('category_id', 3)
            ->where('active', 1)
            ->where('live_at', '<=', Carbon::now('Europe/Berlin')->format('Y-m-d H:i:s'))
            ->orderBy('live_at', 'desc')
            ->limit(4)
            ->get();

        return view('alle-info.jeugdwerkregels', [
            'corona_blog_posts' => $corona_blog_posts,
        ]);
    }

    public function get_inschrijven()
    {
        $el_leiding = $this->get_all_el();

        return view('alle-info.inschrijven', [
            'el_leiding' => $el_leiding,
        ]);
    }

    public function post_inschrijven(request $request)
    {
        $recaptcha = new \ReCaptcha\ReCaptcha(config('recaptcha.secret'));
        $resp = $recaptcha->setExpectedHostname('scoutsoostkamp.be')
            ->verify($request['g-recaptcha-response'], $request->ip());

        if ($resp->isSuccess()) {
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
            ]);

            $new_inschrijving = new Inschrijving;

            $new_inschrijving->voornaam = $request->voornaam;
            $new_inschrijving->achternaam = $request->achternaam;
            $new_inschrijving->email = $request->email;
            $new_inschrijving->telefoon = $request->telefoon;
            $new_inschrijving->geslacht = $request->geslacht;
            $new_inschrijving->geboortedatum = $request->geboortedatum[2].'-'.$request->geboortedatum[1].'-'.$request->geboortedatum[0];
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

                $inschrijvingFormObject = new \stdClass();
                $inschrijvingFormObject->voornaam = $request->voornaam;
                $inschrijvingFormObject->achternaam = $request->achternaam;
                $inschrijvingFormObject->email = $request->email;
                $inschrijvingFormObject->telefoon = $request->telefoon;
                $inschrijvingFormObject->geslacht = $request->geslacht;
                $inschrijvingFormObject->geboortedatum = $request->geboortedatum[2].'-'.$request->geboortedatum[1].'-'.$request->geboortedatum[0];
                $inschrijvingFormObject->straat = $request->straat;
                $inschrijvingFormObject->nummer = $request->nummer;
                $inschrijvingFormObject->bus = $request->bus;
                $inschrijvingFormObject->postcode = $request->postcode;
                $inschrijvingFormObject->plaats = $request->plaats;
                $inschrijvingFormObject->land = $request->land;
                $inschrijvingFormObject->medisch = $request->medisch;
                $inschrijvingFormObject->voogd_1_voornaam = $request->voogd_1_voornaam;
                $inschrijvingFormObject->voogd_1_achternaam = $request->voogd_1_achternaam;
                $inschrijvingFormObject->voogd_1_email = $request->voogd_1_email;
                $inschrijvingFormObject->voogd_1_telefoon = $request->voogd_1_telefoon;
                $inschrijvingFormObject->voogd_1_straat = $request->voogd_1_straat;
                $inschrijvingFormObject->voogd_1_nummer = $request->voogd_1_nummer;
                $inschrijvingFormObject->voogd_1_bus = $request->voogd_1_bus;
                $inschrijvingFormObject->voogd_1_postcode = $request->voogd_1_postcode;
                $inschrijvingFormObject->voogd_1_plaats = $request->voogd_1_plaats;
                $inschrijvingFormObject->voogd_1_land = $request->voogd_1_land;
                $inschrijvingFormObject->voogd_2_voornaam = $request->voogd_2_voornaam;
                $inschrijvingFormObject->voogd_2_achternaam = $request->voogd_2_achternaam;
                $inschrijvingFormObject->voogd_2_email = $request->voogd_2_email;
                $inschrijvingFormObject->voogd_2_telefoon = $request->voogd_2_telefoon;
                $inschrijvingFormObject->voogd_2_straat = $request->voogd_2_straat;
                $inschrijvingFormObject->voogd_2_nummer = $request->voogd_2_nummer;
                $inschrijvingFormObject->voogd_2_bus = $request->voogd_2_bus;
                $inschrijvingFormObject->voogd_2_postcode = $request->voogd_2_postcode;
                $inschrijvingFormObject->voogd_2_plaats = $request->voogd_2_plaats;
                $inschrijvingFormObject->voogd_2_land = $request->voogd_2_land;
    
                Mail::send(new InschrijvingFormToScouts($inschrijvingFormObject));

                return redirect()->back();
            } else {
                Session::flash('inschrijving_error');

                return redirect()->back()->withInput();
            }
        } else {
            Session::flash('inschrijving_error_captcha');

            return redirect()->back()->withInput();
        }
    }
}
