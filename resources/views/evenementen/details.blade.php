@extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => $evenement->kleur,
            'pattern' => $evenement->banner_patroon,
            'strength' => $evenement->banner_sterkte,
        ],
        'page_title' => $evenement->naam,
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-12 col-md-8 order-2 order-md-1">
            {!! $evenement->omschrijving !!}
        </div>

        <div class="col-12 col-md-4 order-1 order-md-2">
            @component('components.evenement_bar', [
                'start_datum' => $evenement->start_datum,
                'start_uur' => $evenement->start_uur_formatted,
                'eind_datum' => $evenement->eind_datum,
                'eind_uur' => $evenement->eind_uur_formatted,
                'locatie' => $evenement->locatie,
                'prijs' => $evenement->prijs,
            ])
            @endcomponent
        </div>
    </div>
@endsection
