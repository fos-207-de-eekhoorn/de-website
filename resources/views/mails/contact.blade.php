 @extends('layouts.mail')

@section('body')

    <h1 style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;font-size:2.4rem;color:#333c4e">
        {{ $subject }}
    </h1>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Gegevens
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Naam: </span>{{ $contact_form->naam }}<br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Email: </span><a href="mailto:{{ $contact_form->email }}">{{ $contact_form->email }}</a><br>
        <span style="display: inline-block; width: 100px; font-size: .875rem;">Actief? </span>{{ ($contact_form->actief == 'on') ? 'Ja' : 'Nee' }}<br>
        @if ($contact_form->kind_naam)
            <span style="display: inline-block; width: 80px; font-size: .875rem; margin-left: 20px">- Naam: </span>{{ $contact_form->kind_naam }}<br>
        @endif
        @if ($contact_form->kind_tak)
            <span style="display: inline-block; width: 80px; font-size: .875rem; margin-left: 20px">- Tak: </span>{{ $contact_form->kind_tak }}<br>
        @endif
    </p>

    <h4 style="margin-top:0;margin-bottom:0rem;margin-right:0;margin-left:0;font-size:1.1rem;color:#333c4e">
        Bericht
    </h4>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        {{ $contact_form->bericht }}
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
