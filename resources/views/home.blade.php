@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing banner banner--full banner--with-hover-effect">
        @component('components.carousel', [
            'name' => 'homepage',
            'images' => $carousels->homepage,
            'type' => 'full-width'
        ])
        @endcomponent

        <h1 class="banner__title text-color--white text--shadow-hard">
            FOS207<br>
            De Eekhoorn
        </h1>
    </section>

    {{--
    <div class="row section section--small-spacing small-gutters">
        <div class="col-12">
            <h2>Activiteit op {{ Carbon\Carbon::parse($tak_activiteiten[0]->volgende_activiteit[0]->datum)->isoFormat('LL') }}</h2>
        </div>

        @foreach ($tak_activiteiten as $tak)
            <div class="col-12 col-md-6 col-lg-3 volgende-activiteit">
                <div class="volgende-activiteit__inner card cs-{{ $tak->kleur }}">
                    <h3 class="volgende-activiteit__tak">{{ $tak->naam }}</h3>

                    @if (isset($tak->volgende_activiteit[0]) && $tak->volgende_activiteit[0]->is_activiteit)
                        <div class="volgende-activiteit__info
                            {{ ($tak->volgende_activiteit[0]->start_uur != '14:00:00' || $tak->volgende_activiteit[0]->eind_uur != '17:00:00')
                                ? 'volgende-activiteit__info--active'
                                : NULL
                            }}
                        ">
                            <span class="volgende-activiteit__icon"><i class="fas fa-clock"></i></span>
                            {{ Carbon\Carbon::parse($tak->volgende_activiteit[0]->start_uur)->format('H\ui') }} - {{ Carbon\Carbon::parse($tak->volgende_activiteit[0]->eind_uur)->format('H\ui') }}
                        </div>

                        <div class="volgende-activiteit__info
                            {{ $tak->volgende_activiteit[0]->locatie != 'Lokaal'
                                ? 'volgende-activiteit__info--active'
                                : NULL
                            }}
                        ">
                            <span class="volgende-activiteit__icon"><i class="fas fa-map-marker-alt"></i></span>
                            {{ $tak->volgende_activiteit[0]->locatie }}
                        </div>

                        <div class="volgende-activiteit__info
                            {{ $tak->volgende_activiteit[0]->prijs > 0
                                ? 'volgende-activiteit__info--active'
                                : NULL
                            }}
                        ">
                            <span class="volgende-activiteit__icon"><i class="fas fa-euro-sign"></i></span>
                            {{ number_format($tak->volgende_activiteit[0]->prijs, 2, ',', ' ') }}
                        </div>

                        <p class="volgende-activiteit__info volgende-activiteit__info--active">
                            <span class="volgende-activiteit__icon"><i class="fas fa-comment-alt"></i></span>
                            {{ str_limit($tak->volgende_activiteit[0]->omschrijving, 256) }}
                        </p>
                    @else
                        <strong>Geen activiteit</strong>
                    @endif

                    <div class="volgende-activiteit__link">
                        <a href="{{ url('/takken/'. $tak->link) }}">
                            Alle activiteiten<span class="fa--after"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    --}}

    <div class="row section">
        <div class="col-12">
            <h2>Het kamp gaat door!</h2>
            <p>
                Vind <a href="{{ url('/evenementen/kamp') }}">hier</a> alle informatie over kamp dat je nodig hebt voor jouw spruit!
            </p>

            <h3>Fosshop</h3>
            <p>
                Indien uw zoon/dochter nog zaken uit de fosshop nodig heeft voor kamp, kan u dit document invullen en doorsturen naar <a href="mailto:eekhoorn.fosshop@gmail.com">eekhoorn.fosshop@gmail.com</a>. Dit ten laatste tegen <strong>8 juli</strong>.
            </p>
            <p>
                Verdere info kan u terugvinden in het document.<br>
                <a href="{{ asset('/docs/Bestelformulier-FOSSHOP.pdf') }}" target="_blank"><span class="fa--before icon"><i class="fas fa-file-pdf"></i></span>Bestelformulier-FOSSHOP.pdf</a><br>
                <a href="{{ asset('/docs/Bestelformulier-FOSSHOP.docx') }}" target="_blank"><span class="fa--before icon"><i class="fas fa-file-word"></i></span>Bestelformulier-FOSSHOP.docx</a>
            </p>

            <h5 class="medium-margin-top">Vragen?</h5>
            <p>
                Contacteer ons gerust als jullie nog vragen of bezorgdheden hebben.<br>
                <a href="{{ url('/contact') }}">Contact pagina</a>
            </p>
        </div>
    </div>

    <div class="row section">
        <div class="col-12">
            <div class="algemene-info section">
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
    </div>

    <div class="section">
        @component('components.carousel', [
            'name' => 'general',
            'images' => $carousels->general,
            'type' => 'normal'
        ])
        @endcomponent
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
