@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Alle evenementen',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
        	<h2>Alle evenementen</h2>

            <div class="row">
                @foreach($evenementen as $evenement)
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
