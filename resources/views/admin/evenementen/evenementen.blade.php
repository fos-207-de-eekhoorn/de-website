@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'salmon',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Evenementen',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            <table class="table activities">
                <thead class="table__head">
                    <tr class="table__row">
                        <th class="table__cell table__cell--left">Evenement</th>
                        <th class="table__cell">Datum</th>
                        <th class="table__cell">Active</th>
                        <th class="table__cell"></th>
                    </tr>
                </thead>

                <tbody class="table__body">
                    @foreach($evenementen as $evenement)
                        <tr class="table__row">
                            <td class="table__cell">
                                {{ $evenement->naam }}
                            </td>

                            <td class="table__cell">
                                {{ ($evenement->start_datum === $evenement->eind_datum)
                                    ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                                    : ((Carbon\Carbon::parse($evenement->start_datum)->monthName === Carbon\Carbon::parse($evenement->eind_datum)->monthName)
                                        ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                                        : Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->eind_datum)->monthName) }}
                            </td>

                            <td class="table__cell">
                                {{ $evenement->active }}
                            </td>

                            <td class="table__cell"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection