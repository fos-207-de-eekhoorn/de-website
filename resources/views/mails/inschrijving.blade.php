@extends('layouts.mail')

@section('body')

    <h1 style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;font-size:2.4rem;color:#333c4e">
        {{ $subject }}
    </h1>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Gegevens kind
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Voornaam: </span>{{ $contact_form->voornaam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Achternaam: </span>{{ $contact_form->achternaam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Email: </span><a href="mailto:{{ $contact_form->email }}">{{ $contact_form->email }}</a><br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Telefoon: </span>{{ $contact_form->telefoon }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Geslacht: </span>{{ $contact_form->geslacht }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Geboortedatum: </span>{{ $contact_form->geboortedatum[2].'-'.$contact_form->geboortedatum[1].'-'.$contact_form->geboortedatum[0] }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Straat: </span>{{ $contact_form->straat }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Nummer: </span>{{ $contact_form->nummer }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Bus: </span>{{ $contact_form->bus }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Postcode: </span>{{ $contact_form->postcode }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Plaats: </span>{{ $contact_form->plaats }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Land: </span>{{ $contact_form->land }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Medisch: </span>{{ $contact_form->medisch }}
    </p>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Gegevens Voogd 1
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Voornaam: </span>{{ $contact_form->voogd_1_voornaam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Achternaam: </span>{{ $contact_form->voogd_1_achternaam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Email: </span><a href="mailto:{{ $contact_form->voogd_1_email }}">{{ $contact_form->voogd_1_email }}</a><br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Telefoon: </span>{{ $contact_form->voogd_1_telefoon }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Straat: </span>{{ $contact_form->voogd_1_straat }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Nummer: </span>{{ $contact_form->voogd_1_nummer }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Bus: </span>{{ $contact_form->voogd_1_bus }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Postcode: </span>{{ $contact_form->voogd_1_postcode }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Plaats: </span>{{ $contact_form->voogd_1_plaats }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Land: </span>{{ $contact_form->voogd_1_land }}
    </p>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Gegevens Voogd 2
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Voornaam: </span>{{ $contact_form->voogd_2_voornaam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Achternaam: </span>{{ $contact_form->voogd_2_achternaam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Email: </span><a href="mailto:{{ $contact_form->voogd_2_email }}">{{ $contact_form->voogd_2_email }}</a><br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Telefoon: </span>{{ $contact_form->voogd_2_telefoon }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Straat: </span>{{ $contact_form->voogd_2_straat }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Nummer: </span>{{ $contact_form->voogd_2_nummer }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Bus: </span>{{ $contact_form->voogd_2_bus }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Postcode: </span>{{ $contact_form->voogd_2_postcode }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Plaats: </span>{{ $contact_form->voogd_2_plaats }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Land: </span>{{ $contact_form->voogd_2_land }}
    </p>

    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <br>
        <br>
        Met vriendelijke groet,<br>
        <br>
        Het automatisch mail system van jullie website<br>
    </p>

    <p class="support" style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;font-size:.8rem;color:#828282;" >
        You're having issues? Email me: <a href="mailto:orry@tradler.co" style="color:#3bafbf;text-decoration:none;" >orry@tradler.co</a>
    </p>

@endsection
