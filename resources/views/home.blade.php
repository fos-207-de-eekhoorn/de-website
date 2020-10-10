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

    <div class="row section">
        <div class="col-12 col-md-8 section">
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

        <div class="col-12 col-md-4 section">
            <h4>Evenementen kalender</h4>

            <div class="calendar">
                <div class="calendar__divider"></div>

                @forelse($evenementen as $evenement)
                    <p class="calendar__date calendar__date--{{ $evenement->kleur }}">
                        <span class="calendar__day">{{ Carbon\Carbon::parse($evenement->start_datum)->format('j') }}</span>
                        <span class="calendar__month">{{ Carbon\Carbon::parse($evenement->start_datum)->format('M') }}</span>
                    </p>

                    <div class="calendar__info">
                        <h5 class="calendar__name">{{ $evenement->naam }}</h5>
                        <div class="calendar__details">
                            <span class="calendar__icon icon fa--before"><i class="fas fa-clock"></i></span>
                            <span class="calendar__time">{{ $evenement->start_uur }}</span>
                            <span class="calendar__icon icon fa--before"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="calendar__location">{{ $evenement->locatie }}</span>
                        </div>
                    </div>

                    <div class="calendar__divider"></div>
                @empty
                    <div class="calendar__no-event">Geen geplande evenementen</div>
                    <div class="calendar__divider"></div>
                @endforelse
            </div>

            <p class="text--align-right small-margin-top no-margin-bottom">
                <a href="{{ '/evenementen' }}" class="text--align-right">
                    Alle activiteiten<span class="fa--after"><i class="fas fa-angle-right"></i></span>
                </a>
            </p>
        </div>

        <div class="col-12 col-md-4 section">
            @component('components.current_fase', [
                'with_link' => 1,
            ])@endcomponent
        </div>

        <div class="col-12 col-md-8 section">
            <h2>Woordje van de eenheidsleiding</h2>

            <h5>Beste leden, ouders en vrienden van de Eekhoorn.</h5>

            {!! $voorwoord->text !!}

            <p>
                Stevige linker ,<br>
                {{ $el->voortotem }} {{ $el->totem }}
            </p>
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
