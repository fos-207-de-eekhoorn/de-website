@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => $activiteit->tak->naam,
        'page_sub_title' => Carbon\Carbon::parse($activiteit->datum)->format('j/m/Y'),
    ])
    @endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8 medium-margin-bottom">
            <a href="{{ url()->previous() }}">
                <span class="fa--before"><i class="fas fa-angle-left"></i></span>Ga terug
            </a>
        </div>

        <div class="col-12 col-md-8">
            <h2>Inschrijvingen</h2>

            <table class="table activities">
                <thead>
                    <tr class="table__row">
                        <td class="table__cell">Voornaam</td>
                        <td class="table__cell">Achternaam</td>
                        <td class="table__cell">Aanwezig?</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($activiteit->inschrijvingen as $inschrijving)
                        <tr class="table__row">
                            <td class="table__cell">{{ $inschrijving->voornaam }}</td>
                            <td class="table__cell">{{ $inschrijving->achternaam }}</td>
                            <td class="table__cell">{{ $inschrijving->is_aanwezig }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection