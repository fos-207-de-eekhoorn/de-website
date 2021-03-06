@extends('layouts.app')

@section('title', 'Word lid!')

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
        <div class="col-12 col-md-8 section">
            <div class="section">
                <h2>Lid worden</h2>

                <p>
                    Wil je lid worden van onze scouts? Goed idee! Hier vind je alle nodige info.
                </p>

                <p>
                    Onze scouts is opgedeeld in 4 leeftijdsgroepen, de takken.
                </p>

                <div class="row small-gutters">
                    @foreach($takken->take(4) as $tak)
                        <div class="col-6 col-md-3 section section--small-spacing">
                            <div class="card card--align-center cs-{{ $tak->kleur }} section">
                                <a href="{{ route('takken.details', ['tak' => $tak->slug]) }}" class="link--block">
                                    <h5 class="card__title card__title--link card__title--link--centered">
                                        {{ $tak->korte_naam }}<span class="card__title-link-icon"><i class="fas fa-angle-right"></i></span>
                                    </h5>
                                </a>

                                <div class="card__content text--align-center">
                                    <h3 class="text--bold text--very-small-line-height medium-margin-top">
                                        {{ $tak->jaartal_begin }}<br>
                                        -<br>
                                        {{ $tak->jaartal_eind }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p>
                    Eenmaal wij de inschrijving hebben ontvangen start een proefperiode waarbij je gratis kan deelnemen aan 3 opeenvolgende activiteiten (opeenvolgend vanaf de eerste zaterdag na de bevestingsmail). Als deze proefperiode verlopen is en je wenst verder lid te blijven dan dient het lidgeld betaald te worden.
                </p>

                <div class="wrapper__btn">
                    <a href="{{ route('info.inschrijven') }}" class="btn btn--primary">Schrijf je hier in</a>
                </div>
            </div>

            <div class="section">
                <h3>Wat kost de scouts?</h3>

                <p>
                    Lidgeld bedraagt €38 per kind.
                </p>

                <p>
                    Betalingen gebeuren op het rekeningnummer:<br>
                    <strong>BE71 9730 1630 9269</strong> met vermelding “<strong><i>Naam&nbsp;-&nbsp;Tak&nbsp;-&nbsp;Lidgeld</i></strong>".
                </p>

                <p>
                    Hier is een voorbeeldje: "Marie Lammertyn - Leiding - Lidgeld".
                </p>

                <p>
                    Vind <a href="{{ route('info.kost') }}">hier</a> meer info over wat de scouts kost.
                </p>
            </div>

        </div>

        <div class="col-12 col-md-4 section">
            @component('components.meer_info_el_leiding', [
                'el_leiding' => $el_leiding,
            ])
            @endcomponent
        </div>
    </div>
@endsection