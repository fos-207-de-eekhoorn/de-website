@extends('layouts.main')

@section('content')
    <div class="row section">
        <div class="col-12">
            <div class="carousel">
                <img src="/img/{{ $tak->foto }}" alt="{{ $tak->naam }}" class="carousel__banner">
            </div>
        </div>
    </div>

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="card card--align-center cs-bevers">
                <h2 class="card__title">{{ $tak->introductie }}</h2>

                <div class="card__content">
                    <p>
                        {{ $tak->beschrijving }}
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
                    De activiteiten gaan elke zaterdag door van 14u tot 17u in het lokaal, tenzij anders vermeld.Hier vindt u alle geplande activiteiten voor de bevers voor de komende maanden!
                </p>
                @if (strlen($tak->activiteiten_beschrijving) > 0)
                    <p>
                        In mei en juni draaien al onze activiteiten rond het thema 'beroepen'. Elke zaterdag maken de bevers kennis met een nieuw beroep. We proberen deze activiteiten zo leerzaam en leuk mogelijk te maken!
                    </p>
                @endif
            </div>

            <table class="table activities section">
                @foreach ($tak->activiteiten as $activiteit)
                    <tr class="table__row">
                        <td class="table__cell activities__date">{{ Carbon\Carbon::parse($activiteit->datum)->format('j M') }}</td>
                        <td class="table__cell">{{ $activiteit->omschrijving }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="col-12 col-lg-4">
            <h2>{{ $tak->naam }}leiding</h2>
            <div class="row">
                @foreach ($tak->leiding_tak as $leider)
                    <div class="col-6">
                        <div class="leiding">
                            <p class="leiding__naam">
                                @if ($leider->is_tl)Takleiding: @endif
                                @if (strlen($leider->leider->totem) > 0)
                                    {{ $leider->leider->totem }}
                                @else
                                    {{ $leider->leider->voornaam }}
                                @endif
                            </p>

                            <img src="/img/leiding/{{ $leider->leider->foto }}" alt="{{ $leider->leider->totem }}" class="leiding__afbeelding">
                            
                            <div class="leiding__gegevens">
                                <p>{{ $leider->leider->voornaam }} {{ $leider->leider->achternaam }}</p>
                                <p><a href="tel:{{ str_replace('.', '', str_replace('/', '', $leider->leider->telefoon)) }}">{{ $leider->leider->telefoon }}</a></p>
                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
