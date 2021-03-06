@extends('layouts.app')

@section('title', $tak->naam)
@section('meta_description', 'Hier vind je wekelijks de activiteiten van de '.$tak->naam)
@section('meta_image', asset('/img/meta/meta_image_'.$tak->slug.'.png'))

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => $tak->kleur,
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => $tak->naam,
    ])
    @endcomponent

    <div class="row section">
        @if (session('success_inschrijving'))
            <div class="col-12 section section--small-spacing">
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Je bent ingeschreven voor de activiteit. Tot zaterdag!
                @endcomponent
            </div>
        @endif

        @if (session('error_full'))
            <div class="col-12 section section--small-spacing">
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    De activiteit is al volzet.
                @endcomponent
            </div>
        @endif

        <div class="col-12 col-lg-8 section">
            <div class="card card--align-center cs-{{ $tak->kleur }} section">
                <h2 class="card__title">{{ $tak->introductie }}</h2>

                <div class="card__content">
                    <p>
                        {!! $tak->beschrijving !!}
                    </p>
                </div>
            </div>

            <div class="section section--small-spacing">
                <h2>Activiteiten</h2>
                <p>
                    Door de coronamaatregelen kunnen we slechts {{ $limit }} leden toelaten per activiteit. Daarom werken we met inschrijvingen. Wil je deelnemen aan een activiteit? Druk dan op de knop ‘deelnemen aan deze activiteit’ en schrijf je in!
                </p>

                <p>
                    We willen iedereen een gelijke kans geven om deel te nemen. Daarom is het pas mogelijk om vanaf de zondag voor de volgende activiteit in te schrijven.
                </p>

                <p>
                    Ben je ingeschreven maar kan je toch niet meer komen? Stuur dan een berichtje naar de takleiding om de inschrijving te annuleren.
                </p>

                <p>
                    Activiteiten gaan altijd door op <strong>zaterdag van 14u tot 17u</strong>, tenzij anders vermeld.
                </p>
            </div>

            <table class="table activities section">
                @forelse ($tak->activiteiten as $activiteit)
                    <tr class="table__row">
                        <td class="table__cell activities__date">
                            {{ Carbon\Carbon::parse($activiteit->datum)->format('j M') }}
                        </td>

                        @if($activiteit->is_activiteit)
                            <td class="table__cell activities__info">
                                <span class="activities__omschrijving">
                                    {{ $activiteit->omschrijving }}

                                    @if ($activiteit->start_uur != '14:00:00' || $activiteit->eind_uur != '17:00:00')
                                        <span class="activities__detail">
                                            <b>Tijdstip:</b> {{ Carbon\Carbon::parse($activiteit->start_uur)->format('H\ui') }} - {{ Carbon\Carbon::parse($activiteit->eind_uur)->format('H\ui') }}
                                        </span>
                                    @endif

                                    @if (0 < $activiteit->prijs)
                                        <span class="activities__detail">
                                            <b>Prijs:</b> {{ $activiteit->prijs }}
                                        </span>
                                    @endif

                                    @if ($activiteit->locatie != 'Lokaal')
                                        <span class="activities__detail">
                                            <b>Locatie:</b> {{ $activiteit->locatie }}
                                        </span>
                                    @endif
                                </span>

                                @if (Carbon\Carbon::parse($activiteit->datum) < Carbon\Carbon::now()->addDays(6))
                                    <div class="activities__subscribe">
                                        <a
                                            @if ($activiteit->inschrijvingen->count() < $limit)
                                                href="{{ route('takken.inschrijven', ['inschrijving' => Crypt::encrypt($activiteit->id)]) }}"
                                                class="btn btn--primary">Deelnemen aan de activiteit
                                            @else
                                                class="btn btn--primary btn--disabled">Activiteit volzet
                                            @endif
                                        </a>
                                        <span class="activities__amount">Inschrijvingen: {{ $activiteit->inschrijvingen->count() }}</span>
                                    </div>
                                @endif
                            </td>
                        @else
                            <td class="table__cell">
                                <strong>Geen activiteit</strong>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr class="table__row">
                        <td class="table__cell" colspan="2">
                            De nieuwe activiteiten komen snel online!
                        </td>
                    </tr>
                @endforelse
            </table>

            <div class="section">
                <h3>Komende evenementen voor de {{ $tak->naam }}</h3>
                @component('components.calendar', [
                    'evenementen' => $tak_evenementen,
                ])
                @endcomponent
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <h2>{{ $tak->naam }}leiding</h2>
            <div class="row">
                @foreach ($tak->identities as $identity)
                    <div class="col-6">
                        <div class="leiding">

                            <h5 class="leiding__totem">
                                @if ($tak->naam === 'Welpen' && strlen($identity->welpennaam) > 0)
                                    {{ $identity->welpennaam }}  - 
                                @endif

                                @if (strlen($identity->totem) > 0)
                                    {{ $identity->totem }}
                                @else
                                    {{ $identity->voornaam }}
                                @endif @if ($identity->is_tl)
                                    (TL)
                                @endif
                            </h5>

                            <img src="/img/leiding/{{ $identity->foto }}" alt="{{ $identity->totem }}" class="leiding__afbeelding">
                            
                            <div class="leiding__gegevens">
                                <p class="leiding__naam">
                                    {{ $identity->voornaam }} {{ $identity->achternaam }}
                                </p>

                                <p class="leiding__telefoon">
                                    <a href="tel:{{ str_replace('.', '', str_replace('/', '', $identity->telefoon)) }}">{{ $identity->telefoon }}</a>
                                </p>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
