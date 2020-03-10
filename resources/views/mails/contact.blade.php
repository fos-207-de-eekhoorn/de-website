 @extends('layouts.mail')

@section('body')

    <h1 style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;font-size:2.4rem;color:#333c4e">
        {{ $subject }}
    </h1>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Naam
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        {{ $contact_form->naam }}
    </p>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Email
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <a href="mailto:{{ $contact_form->email }}">{{ $contact_form->email }}</a>
    </p>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Bericht
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        {{ $contact_form->bericht }}
    </p>

    <h3 style="margin-top:0;margin-bottom:0.5rem;margin-right:0;margin-left:0;font-size:1.4rem;color:#333c4e">
        Is deze persoon actief in onze scouts?
    </h3>
    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
    @if ($contact_form->actief = 'on')
        Jup
    @else
        Nope
    @endif
    </p>

    <p style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;" >
        <br>
        <br>
        Met vriendelijke groet,<br>
        <br>
        Het automatisch mail system van jullie website<br>
    </p>

    <p class="support" style="margin-top:0;margin-bottom:1rem;margin-right:0;margin-left:0;font-size:.8rem;color:#828282;" >
        You're having issues? Email me: <a href="mailto:verpoort.orry@gmail.com" style="color:#3bafbf;text-decoration:none;" >verpoort.orry@gmail.com</a>
    </p>

@endsection
