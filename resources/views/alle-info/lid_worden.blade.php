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

                <p>
                    Onze scouts is opgedeeld in 4 leeftijdsgroepen, de takken.
                </p>

                <div class="row small-gutters">
                    @foreach($takken->take(4) as $tak)
                        <div class="col-6 col-md-3 section section--small-spacing">
                            <div class="card card--align-center cs-{{ $tak->kleur }} section">
                                <h5 class="card__title text--align-center">{{ $tak->korte_naam }}</h5>

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
            </div>
        </div>

        <div class="col-12 col-md-4">
            
        </div>
    </div>
@endsection