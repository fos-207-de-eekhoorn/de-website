@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'images' => [
            [
                'image' => asset('/img/banner.jpg'),
                'alt' => 'Banner',
            ],
        ],
        'page_title' => 'FOS 207 \'De Eekhoorn\'',
    ])
    @endcomponent

    <div class="row section">
        @foreach ($tak_activiteiten as $tak)
            <div class="col-12 col-md-6 col-lg-3">
                @if (isset($tak->volgende_activiteit[0]))
                    <div class="volgende-activiteit card cs-{{ strtolower($tak->naam) }}">
                        <h3 class="volgende-activiteit__tak">{{ $tak->naam }}</h3>

                        <div class="volgende-activiteit__algemene-info">
                            <div class="volgende-activiteit__timing">
                                <h5 class="volgende-activiteit__datum">
                                    {{ Carbon\Carbon::parse($tak->volgende_activiteit[0]->datum)->format('j M') }}
                                </h5>
                                <p class="volgende-activiteit__tijd">
                                    {{ Carbon\Carbon::parse($tak->volgende_activiteit[0]->start_uur)->format('H\ui') }} - {{ Carbon\Carbon::parse($tak->volgende_activiteit[0]->eind_uur)->format('H\ui') }}
                                </p>
                            </div>

                            @if (0 < $tak->volgende_activiteit[0]->prijs)
                                <h6 class="volgende-activiteit__prijs">
                                    <span class="text--sm">€</span>{{ number_format($tak->volgende_activiteit[0]->prijs, 2, ',', ' ') }}
                                </ph6>
                            @endif
                        </div>

                        <p class="volgende-activiteit__omschrijving">
                            {{ str_limit($tak->volgende_activiteit[0]->omschrijving, 200) }}
                        </p>

                        <a href="{{ url('/takken/'. strtolower($tak->naam)) }}" class="volgende-activiteit__meer">Bekijk meer ></a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="row section">
        <div class="col-12 col-md-6 col-lg-8">
            <div class="algemene-info">
                <h2>Welkom!</h2>
                <p>
                    Welkom op de website van FOS 207 de eekhoorn. Wij zijn een scouts die zich al bijna 55 jaar inzet om de Oostkampse jeugd een toptijd te bezorgen.
                </p>

                <p>
                    We hebben een sterke samenwerkingsband met de gemeente Oostkamp. We hechten hiernaast ook veel belang aan goed georganiseerde/voorbereide activiteiten en we vinden vooral een goede communicatie naar ouders toe uiterst belangrijk. We willen gasten echt een totaalpakket aanbieden, een onvergetelijke levenservaring.
                </p>

                <p>
                    We zijn een eerder kleinere jeugdbeweging. Dit betekent dat wij al onze gasten kennen en dat ieder lid belangrijk is. Wij geven wekelijkse activiteiten waarbij nieuwe leden 1 maand gratis mogen uitproberen. Tijdens deze wekelijkse activiteiten leren we de gasten zo goed mogelijk kennen en tegen het grote zomerkamp zullen zij een onmisbaar deel van de groep zijn.
                </p>

                <p>
                    Als echte scouts hechten wij veel belang aan het outdoorleven. Scouts is je amuseren buiten in de natuur. Wij werken ook met enkele tradities. Zo zijn wij één van de weinige scoutsen die nog werken met een raadsrots, met teervoeten en badges en met totemnamen. Deze totems gebruiken we altijd als aanspreeknaam en zijn een grote eer om te krijgen.
                </p>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <h2>Snelle links</h2>
            <ul>
                <li><a href="{{ url('/alle-info/lid-worden') }}">Ik wil lid worden</a></li>
                <li><a href="{{ url('/alle-info/uniform-shop') }}">Mijn uniform</a></li>
                <li><a href="{{ url('/evenementen/startdag') }}">Startdag</a></li>
            </ul>

        </div>
    </div>

    {{--
    <div class="row section">
        <div class="col-12">
            <h2>Aankomende evenementen</h2>
        </div>

        <div class="col-12 col-lg-4">
            <h3>Startdag</h3>
            <div>
                <img src="/img/evenement-startdag.jpg" alt="Startdag">
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <h3>Startdag</h3>
            <div>
                <img src="/img/evenement-startdag.jpg" alt="Startdag">
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <h3>Startdag</h3>
            <div>
                <img src="/img/evenement-startdag.jpg" alt="Startdag">
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <h3>Startdag</h3>
            <div>
                <img src="/img/evenement-startdag.jpg" alt="Startdag">
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <h3>Startdag</h3>
            <div>
                <img src="/img/evenement-startdag.jpg" alt="Startdag">
            </div>
        </div>
    </div>
    --}}
@endsection