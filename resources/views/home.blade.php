@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing carousel">
        <img src="/img/banner.jpg" alt="Banner" class="carousel__banner">
    </section>

    <div class="row section">
        @foreach ($tak_activiteiten as $tak)
            <div class="col-12 col-md-6 col-lg-3">
                @if (isset($tak->activiteiten[0]))
                    <div class="volgende-activiteit cs-{{ strtolower($tak->naam) }}">
                        <header class="volgende-activiteit__header">
                            <h3 class="volgende-activiteit__titel">{{ $tak->naam }}</h3>
                            <p>
                                {{ Carbon\Carbon::parse($tak->activiteiten[0]->datum)->format('j M') }}
                                @if ($tak->activiteiten[0]->start_uur != '14:00:00' || $tak->activiteiten[0]->eind_uur != '17:00:00')
                                    <br>
                                    {{ Carbon\Carbon::parse($tak->activiteiten[0]->start_uur)->format('H\ui') }} - {{ Carbon\Carbon::parse($tak->activiteiten[0]->eind_uur)->format('H\ui') }}
                                @endif
                                @if (0 < $tak->activiteiten[0]->prijs)
                                    <br>
                                    <span class="text--sm">€</span>{{ number_format($tak->activiteiten[0]->prijs, 2, ',', ' ') }}
                                @endif
                            </p>
                        </header>

                        <p>
                            {{ $tak->activiteiten[0]->omschrijving }}
                        </p>
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
                <li><a href="#">Snelle link</a></li>
                <li><a href="#">Snelle link</a></li>
                <li><a href="#">Snelle link</a></li>
                <li><a href="#">Snelle link</a></li>
            </ul>

        </div>
    </div>

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
@endsection