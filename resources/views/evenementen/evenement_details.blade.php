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
            : ((Carbon\Carbon::parse($evenement->start_datum)->monthName === Carbon\Carbon::parse($evenement->eind_datum)->monthName)
                ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                : Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->eind_datum)->monthName)
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-12 col-md-8">
            {!! $evenement->omschrijving !!}
        </div>

        <div class="col-12 col-md-4">
            @component('components.evenement_bar', [
                'start_uur' => $evenement->start_uur_formatted,
                'eind_uur' => $evenement->eind_uur_formatted,
                'locatie' => $evenement->locatie,
                'prijs' => $evenement->prijs,
            ])
            @endcomponent
        </div>
    </div>
@endsection
