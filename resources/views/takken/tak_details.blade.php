@extends('layouts.main')

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

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="card card--align-center cs-{{ $tak->kleur }}">
                <h2 class="card__title">{{ $tak->introductie }}</h2>

                <div class="card__content">
                    <p>
                        {!! $tak->beschrijving !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row section">
        <div class="col-12 col-lg-8">
            <div class="section">
                <h2>Activiteiten</h2>
                <p>
                    De activiteiten gaan elke zaterdag door van 14u tot 17u in het lokaal, tenzij anders vermeld. Hier vindt u alle geplande activiteiten voor de komende maanden!
                </p>
                @if (strlen($tak->activiteiten_beschrijving) > 0)
                    <p>
                        In mei en juni draaien al onze activiteiten rond het thema 'beroepen'. Elke zaterdag maken de bevers kennis met een nieuw beroep. We proberen deze activiteiten zo leerzaam en leuk mogelijk te maken!
                    </p>
                @endif
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

                                @if (Carbon\Carbon::parse($activiteit->datum) <  Carbon\Carbon::now()->addDays(6)->addHours(12))
                                    <div class="activities__subscribe">
                                        <a href="#" class="btn btn--primary">Deelnemen aan de activiteit</a>
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
        </div>

        <div class="col-12 col-lg-4">
            <h2>{{ $tak->naam }}leiding</h2>
            <div class="row">
                @foreach ($tak->leiding_tak as $leider)
                    <div class="col-6">
                        <div class="leiding">

                            <h5 class="leiding__totem">
                                @if ($tak->naam === 'Welpen' && strlen($leider->leider->welpennaam) > 0)
                                    {{ $leider->leider->welpennaam }} 
                                @elseif (strlen($leider->leider->totem) > 0)
                                    {{ $leider->leider->totem }}
                                @else
                                    {{ $leider->leider->voornaam }}
                                @endif @if ($leider->is_tl)
                                    (TL)
                                @endif
                            </h5>

                            <img src="/img/leiding/{{ $leider->leider->foto }}" alt="{{ $leider->leider->totem }}" class="leiding__afbeelding">
                            
                            <div class="leiding__gegevens">
                                <p class="leiding__naam">
                                    {{ $leider->leider->voornaam }} {{ $leider->leider->achternaam }}
                                </p>

                                <p class="leiding__telefoon">
                                    <a href="tel:{{ str_replace('.', '', str_replace('/', '', $leider->leider->telefoon)) }}">{{ $leider->leider->telefoon }}</a>
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
