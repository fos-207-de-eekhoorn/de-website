@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Inschrijvingen',
    ])
    @endcomponent

    {{-- Contact formulier --}}
    {{-- EL & AEL --}}
    <div class="row section">
        <div class="col-12">
            <div class="multiple-titles small-margin-bottom align-items-center">
                <h2>Lijst</h2>
                <div class="wrapper__btn wrapper__btn--right align-items-center">
                    <span class="fa--before">Export as:</span>
                    <a href="{{ url('/admin/inschrijvingen/export/xlsx') }}" class="btn btn--primary">XLSX</a>
                    <a href="{{ url('/admin/inschrijvingen/export/csv') }}" class="btn btn--secondary">CSV</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="wrapper__table">
                <table class="table">
                    <thead class="table__head">
                        <tr class="table__row table__row--normal-border-bottom">
                            <td class="table__cell"></td>
                            <td class="table__cell table__cell--border-right" colspan="13">Lid</td>
                            <td class="table__cell table__cell--border-right" colspan="10">Voogd 1</td>
                            <td class="table__cell" colspan="10">Voogd 2</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">#</td>

                            <td class="table__cell">Voornaam</td>
                            <td class="table__cell">Achternaam</td>
                            <td class="table__cell">Email</td>
                            <td class="table__cell">Telefoon</td>
                            <td class="table__cell">Geslacht</td>
                            <td class="table__cell">Geboortedatum</td>
                            <td class="table__cell">Straat</td>
                            <td class="table__cell">Nummer</td>
                            <td class="table__cell">Bus</td>
                            <td class="table__cell">Postcode</td>
                            <td class="table__cell">Plaats</td>
                            <td class="table__cell">Land</td>
                            <td class="table__cell table__cell--border-right" width="250">Medische informatie</td>

                            <td class="table__cell">Voornaam</td>
                            <td class="table__cell">Achternaam</td>
                            <td class="table__cell">Email</td>
                            <td class="table__cell">Telefoon</td>
                            <td class="table__cell">Straat</td>
                            <td class="table__cell">Nummer</td>
                            <td class="table__cell">Bus</td>
                            <td class="table__cell">Postcode</td>
                            <td class="table__cell">Plaats</td>
                            <td class="table__cell table__cell--border-right">Land</td>

                            <td class="table__cell">Voornaam</td>
                            <td class="table__cell">Achternaam</td>
                            <td class="table__cell">Email</td>
                            <td class="table__cell">Telefoon</td>
                            <td class="table__cell">Straat</td>
                            <td class="table__cell">Nummer</td>
                            <td class="table__cell">Bus</td>
                            <td class="table__cell">Postcode</td>
                            <td class="table__cell">Plaats</td>
                            <td class="table__cell">Land</td>
                        </tr>
                    </thead>

                    <tbody class="table__body">
                        @foreach($inschrijvingen as $inschrijving)
                            <tr class="table__row">
                                <td class="table__cell">{{ $inschrijving->id }}</td>

                                <td class="table__cell">{{ $inschrijving->voornaam }}</td>
                                <td class="table__cell">{{ $inschrijving->achternaam }}</td>
                                <td class="table__cell">{{ $inschrijving->email }}</td>
                                <td class="table__cell">{{ $inschrijving->telefoon }}</td>
                                <td class="table__cell">{{ $inschrijving->geslacht }}</td>
                                <td class="table__cell">{{ Carbon\Carbon::parse($inschrijving->geboortedatum)->format('j/m/Y') }}</td>
                                <td class="table__cell">{{ $inschrijving->straat }}</td>
                                <td class="table__cell">{{ $inschrijving->nummer }}</td>
                                <td class="table__cell">{{ $inschrijving->bus }}</td>
                                <td class="table__cell">{{ $inschrijving->postcode }}</td>
                                <td class="table__cell">{{ $inschrijving->plaats }}</td>
                                <td class="table__cell">{{ $inschrijving->land }}</td>
                                <td class="table__cell table__cell--border-right">{{ $inschrijving->medisch }}</td>

                                <td class="table__cell">{{ $inschrijving->voogd_1_voornaam }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_achternaam }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_email }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_telefoon }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_straat }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_nummer }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_bus }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_postcode }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_1_plaats }}</td>
                                <td class="table__cell table__cell--border-right">{{ $inschrijving->voogd_1_land }}</td>

                                <td class="table__cell">{{ $inschrijving->voogd_2_voornaam }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_achternaam }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_email }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_telefoon }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_straat }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_nummer }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_bus }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_postcode }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_plaats }}</td>
                                <td class="table__cell">{{ $inschrijving->voogd_2_land }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection