@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => $evenement->kleur,
            'pattern' => $evenement->banner_patroon,
            'strength' => $evenement->banner_sterkte,
        ],
        'page_title' => $evenement->naam,
        'page_sub_title' => ($evenement->start_datum === $evenement->eind_datum)
            ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
            : (Carbon\Carbon::parse($evenement->start_datum)->monthName === Carbon\Carbon::parse($evenement->eind_datum)->monthName)
                ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                : Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->eind_datum)->monthName
    ])
    @endcomponent



    @component('components.evenement_bar', [
        'naam' => $evenement->naam,
        'start_datum' => Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName,
        'eind_datum' => Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->eind_datum)->monthName,
        'start_uur' => $evenement->start_uur_formatted,
        'eind_uur' => $evenement->eind_uur_formatted,
        'locatie' => $evenement->locatie,
        'prijs' => $evenement->prijs,
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-8">
            {!! $evenement->omschrijving !!}

            <h5>Datum</h5>
            <p>
                {{ $evenement->start_datum }} - {{ $evenement->eind_datum }}
                {{ $evenement->start_datum == $evenement->eind_datum ? "True" : "False" }}
            </p>

            <h5>Tijd</h5>
            <p>
                {{ $evenement->start_uur_formatted }} - {{ $evenement->eind_uur_formatted }}
            </p>

            <h5>Prijs</h5>
            <p>
                {{ $evenement->prijs }}
            </p>

            <h5>Locatie</h5>
            <p>
                {!! $evenement->locatie !!}
            </p>
        </div>
    </div>
@endsection
