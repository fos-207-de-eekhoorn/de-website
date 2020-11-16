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
            <h2>Activiteit op {{ $next_saturday->isoFormat('LL') }}</h2>
        </div>

        @foreach ($tak_activiteiten as $tak)
            <div class="col-12 col-md-6 col-lg-3 volgende-activiteit">
                <div class="volgende-activiteit__inner card cs-{{ (isset($tak->volgende_activiteit[0]) && $tak->volgende_activiteit[0]->is_activiteit && Carbon\Carbon::parse($tak->volgende_activiteit[0]->datum)->diffInDays($next_saturday) < 7) ? $tak->kleur : 'grey-extra-light' }}">
                    <h3 class="volgende-activiteit__tak">{{ $tak->naam }}</h3>

                    @if (isset($tak->volgende_activiteit[0])
                        && $tak->volgende_activiteit[0]->is_activiteit
                        && Carbon\Carbon::parse($tak->volgende_activiteit[0]->datum)->diffInDays($next_saturday) < 7)
                        @if (Carbon\Carbon::parse($tak->volgende_activiteit[0]->datum) != $next_saturday)
                            <div class="volgende-activiteit__info volgende-activiteit__info--active volgende-activiteit__info--important">
                                <span class="volgende-activiteit__icon"><i class="fas fa-calendar"></i></span>
                                {{ Carbon\Carbon::parse($tak->volgende_activiteit[0]->datum)->isoFormat('LL') }}
                            </div>
                        @endif

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
            <div class="section section--small-spacing">
                @component('components.current_fase', [
                    'with_link' => 1,
                ])@endcomponent
            </div>

            <div class="section section--small-spacing">
                <h4>Evenementen kalender</h4>

                @component('components.calendar', [
                    'evenementen' => $evenementen,
                ])
                @endcomponent
            </div>
        </div>

        <div class="col-12 col-md-4 section">
            <h4>Nieuwtjes</h4>

            @component('components.next_blog_posts', [
                'next_blog_posts' => $next_blog_posts,
                'columns' => 1,
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
@endsection
