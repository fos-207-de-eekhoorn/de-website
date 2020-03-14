@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => $evenement->naam,
        'page_sub_title' => ($evenement->start_datum === $evenement->eind_datum)
            ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
            : (Carbon\Carbon::parse($evenement->start_datum)->monthName === Carbon\Carbon::parse($evenement->eind_datum)->monthName)
                ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                : Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->eind_datum)->monthName
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
        	<h2>Alle evenementen</h2>

            <div class="row">
                <div class="col-12 col-md-4">
                    <h3>{{ $evenement->naam }}</h3>

                    <div>
                        {!! $evenement->omschrijving !!}
                    </div>

                    <h5>Datum</h5>
                    <p>
                        {{ $evenement->start_datum }} - {{ $evenement->eind_datum }}
                    </p>

                    <h5>Tijd</h5>
                    <p>
                        {{ $evenement->start_uur }} - {{ $evenement->eind_uur }}
                    </p>

                    <h5>Prijs</h5>
                    <p>
                        {{ $evenement->prijs }}
                    </p>

                    <h5>Locatie</h5>
                    <p>
                        {{ $evenement->locatie }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
