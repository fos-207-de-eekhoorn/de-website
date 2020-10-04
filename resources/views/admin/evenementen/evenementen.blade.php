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
            @component('components.breadcrumbs', [
                'childs' => [
                    (object)[
                        'link' => '/admin',
                        'name' => 'Admin',
                    ],
                ],
                'current' => 'Evenementen',
            ])@endcomponent
        </div>

        <div class="col-12">
            <div class="multiple-titles small-margin-bottom align-items-center">
                <h2>Lijst</h2>
            </div>
        </div>

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

                            <td class="table__cell no-wrap">
                                <p>
                                    <a href="{{ url('/admin/evenementen/edit/' . Crypt::encrypt($evenement->id)) }}">
                                        <span class="fa--before"><i class="fas fa-pen"></i></span>Pas aan
                                    </a>
                                </p>

                                {{--
                                <form action="{{ url('/admin/activiteiten/remove') }}" method="POST" class="no-margin-bottom">
                                    @csrf

                                    <input
                                        type="text"
                                        name="id"
                                        value="{{ Crypt::encrypt($activiteit->id) }}"
                                        hidden>
                                    <input
                                        type="text"
                                        name="tak"
                                        value="{{ strtolower($tak->naam) }}"
                                        hidden>

                                    <button class="btn btn--without-style link--error" onclick="
                                        confirm('Ben je zeker dat je deze activiteit wilt verwijderen?')
                                            ? NULL
                                            : event.preventDefault();
                                    ">
                                        <span class="fa--before"><i class="fas fa-times"></i></span>Verwijder
                                    </button>
                                </form>
                                --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection