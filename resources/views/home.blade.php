@extends('layouts.main')

@section('content')
    <section class="section section--extra-small-spacing banner banner--full">
        <img src="{{ asset('/img/banner.jpg') }}" alt="Banner" class="banner__banner">
    </section>

    <div class="row section small-gutters">
        <div class="col-12">
            <h2>Activiteit op {{ Carbon\Carbon::parse($tak_activiteiten[0]->volgende_activiteit[0]->datum)->isoFormat('LL') }}</h2>
        </div>

        @foreach ($tak_activiteiten as $tak)
            <div class="col-12 col-md-6 col-lg-3 volgende-activiteit">
                <div class="volgende-activiteit__inner card cs-{{ $tak->kleur }}">
                    <h3 class="volgende-activiteit__tak">{{ $tak->naam }}</h3>

                    @if (isset($tak->volgende_activiteit[0]))
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
                            {{ str_limit($tak->volgende_activiteit[0]->omschrijving, 200) }}
                        </p>

                        <div class="volgende-activiteit__link">
                            <a href="{{ url('/takken/'. strtolower($tak->naam)) }}">
                                Bekijk meer<span class="fa--after"><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="row section">
        <div class="col-12 col-md-8 col-lg-9">
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

            <div class="section">
                <h3>Bivakken</h3>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <h5>Bevers en welpen</h4>

                        <ul class="list--no-spacing list--list-style-none">
                            <li><span class="fa--before"><i class="fas fa-calendar"></i></span>17 tot 19 april</li>
                            <li><span class="fa--before"><i class="fas fa-map-marker-alt"></i></span>te Poperinge</li>
                        </ul>

                        <a href="{{ url('/evenementen/bivak/bevers-welpen') }}" class="btn btn--primary">Meer info</a>
                    </div>

                    <div class="col-12 col-md-4">
                        <h5>Jonge</h4>

                        <ul class="list--no-spacing list--list-style-none">
                            <li><span class="fa--before"><i class="fas fa-calendar"></i></span>10 tot 13 april</li>
                            <li><span class="fa--before"><i class="fas fa-map-marker-alt"></i></span>te Ieper</li>
                        </ul>

                        <a href="{{ url('/evenementen/bivak/jonge') }}" class="btn btn--primary">Meer info</a>
                    </div>

                    <div class="col-12 col-md-4">
                        <h5>Oude</h4>

                        <ul class="list--no-spacing list--list-style-none">
                            <li><span class="fa--before"><i class="fas fa-calendar"></i></span>4 tot 6 mei</li>
                            <li><span class="fa--before"><i class="fas fa-map-marker-alt"></i></span>te Lokoren</li>
                        </ul>

                        <a href="{{ url('/evenementen/bivak/oude') }}" class="btn btn--primary">Meer info</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3 align-self-start">
            <a href="{{ url('/docs/prutske/editie-2020-maart-april.pdf') }}" class="prutske" target="_blank">
                <img src="{{ asset('/img/kaft-2020-maart-april.jpg') }}" alt="Prutske november - december 2019" class="prutske__kaft">

                <div class="prutske__hover">
                    <h4 class="prutske__cta">
                        Bekijk het prutske hier!
                    </h4>
                </div>
            </a>
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