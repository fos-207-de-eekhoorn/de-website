@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Lid worden?',
    ])
    @endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="algemene-info">
                <h2>Lid worden</h2>
                <p>
                    Wil je lid worden van onze scouts? Goed idee! Hier vindt je alle nodige info.
                </p>
                <br>
                <p>
                    Onze scouts is opgedeeld in 4 leeftijdsgroepen, de takken.
                </p>
                <lu>
                    <li>Bevers: 2015-2013 (vanaf 5 jaar)</li>
                    <li>Welpen: 2012-2010</li>
                    <li>JG/V's: 2009-2007</li>
                    <li>OG/V's: 2006-2004</li>
                </lu>
                <br>
                <p>
                    Je kan 3 opeenvolgende zaterdagen gratis proberen, pas hierna wordt er een verbintenis via lidgeld gevraagd.
                </p>
                    <p>
                        Wil je lid worden van onze scouts? Stuur dan een mail naar <a href="mailto:fos207ste@gmail.com">fos207ste@gmail.com</a> met de volgende gegevens:
                    </p>
                    <lu>
                        <li>Naam kind</li>
                        <li>Geboortedatum kind</li>
                        <li>Naam moeder</li>
                        <li>Naam Vader</li>
                        <li>Telefoon moeder</li>
                        <li>Telefoon vader</li>
                        <li>Adres</li>
                        <li>Email-adres</li>
                        <li>Of uw kind aan bepaalde activiteiten niet mag deelnemen</li>
                        <li>Eventuele allergiën, medicatie, ziektes, ...</li>
                        <li>Eventuele opmerkingen</li>
                    </lu>
                    <br>
                    <p>
                        Eenmaal wij de mail hebben ontvangen en verwerkt sturen wij een bevestiging. Vanaf dan start een proefperiode waarbij je <b>gratis</b> kan deelnemen aan 3 opeenvolgende activiteiten (opeenvolgend vanaf de eerste zaterdag na de bevestingsmail). Als deze proefperiode verlopen is en je wenst verder lid te blijven dan dient het lidgeld betaald te worden.
                    </p>
                <br>
                <h4>Wat kost de scouts?</h4>
                <p>Lidgeld bedraagd €38 per kind</p>
                <p> Betalingen gebeuren op het rekeningnummer: <b>BE71 9730 1630 9269</b> met vermelding “NAAM+TAK+LIDGELD".</p>
            </div>
        </div>
    </div>
@endsection