@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Activiteiten',
        'page_sub_title' => $tak->naam,
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
                    (object)[
                        'link' => '/admin/activiteiten',
                        'name' => 'Activiteiten',
                    ],
                ],
                'current' => $tak->naam,
            ])@endcomponent
        </div>

        <div class="section col-12">
            <div class="wrapper__btn wrapper__btn--right medium-margin-bottom">
                <a href="{{ url('/admin/activiteiten/prutske?tak=' . $tak->link) }}" class="btn btn--secondary">
                    Export voor het prutske
                </a>

                <a href="{{ url('/admin/activiteiten/add/' . $tak->link) }}" class="btn btn--primary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg activiteit toe
                </a>
            </div>

            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    De activiteit is toegevoegd.
                @endcomponent
            @endif

            @if (session('add_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Neem screenshots en stuur door naar Paco, hij is jouw vriend!
                @endcomponent
            @endif

            @if (session('edit_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    De activiteit is aangepast.
                @endcomponent
            @endif

            @if (session('edit_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Als dit meerdere malen gebeurt, contacteer vooral NIET Paco!
                @endcomponent
            @endif

            @if (session('delete_success'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    De activiteit is verwijderd.
                    <form action="{{ url('/admin/activiteiten/remove-undo') }}" method="POST" class="medium-margin-left" style="display: inline;">
                        @csrf

                        <input
                            type="text"
                            name="id"
                            value="{{ Crypt::encrypt(session('delete_success')) }}"
                            hidden>

                        <button class="btn btn--without-style link--error">
                            <span class="fa--before"><i class="fas fa-times"></i></span>Maak ongedaan
                        </button>
                    </form>
                @endcomponent
            @endif

            @if (session('delete_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Als dit meerdere malen gebeurt, contacteer vooral NIET Paco!
                @endcomponent
            @endif

            @if (session('restore_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    De activiteit is terug gezet.
                @endcomponent
            @endif

            @if (session('restore_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Geen paniek, Paco kan deze terugzetten.
                @endcomponent
            @endif

            <table class="table activities">
                @foreach ($tak->activiteiten as $activiteit)
                    <tr class="table__row">
                        <td class="table__cell activities__date">
                            <span class="text--xl">{{ Carbon\Carbon::parse($activiteit->datum)->format('j') }}</span><br>
                            {{ Carbon\Carbon::parse($activiteit->datum)->format('M') }}
                        </td>

                        @if($activiteit->is_activiteit)
                            <td class="table__cell">
                                {{ $activiteit->omschrijving }}

                                <br><br>

                                <span class="
                                    {{ ($activiteit->start_uur != '14:00:00' || $activiteit->eind_uur != '17:00:00')
                                        ? NULL
                                        : 'text-color--light text--xs'
                                    }}
                                ">
                                    Tijdstip: {{ Carbon\Carbon::parse($activiteit->start_uur)->format('H\ui') }} - {{ Carbon\Carbon::parse($activiteit->eind_uur)->format('H\ui') }}
                                </span><br>

                                <span class="
                                    {{ $activiteit->prijs > 0
                                        ? NULL
                                        : 'text-color--light text--xs'
                                    }}
                                ">
                                    Prijs: <span class="text--unit">€</span>{{ $activiteit->prijs }}
                                </span><br>

                                <span class="
                                    {{ $activiteit->locatie != 'Lokaal'
                                        ? NULL
                                        : 'text-color--light text--xs'
                                    }}
                                ">
                                    Locatie: {{ $activiteit->locatie }}
                                </span>
                            </td>
                        @else
                            <td class="table__cell">
                                Geen activiteit
                            </td>
                        @endif

                        <td class="table__cell no-wrap">
                            <p>
                                <a href="{{ url('/admin/activiteiten/inschrijvingen/' . Crypt::encrypt($activiteit->id)) }}">
                                    <span class="fa--before"><i class="fas fa-file-alt"></i></span>
                                    @if (Carbon\Carbon::now() < Carbon\Carbon::parse($activiteit->datum))
                                        Inschrijvingen
                                    @else
                                        Aanwezigheden
                                    @endif
                                </a>
                            </p>

                            <p>
                                <a href="{{ url('/admin/activiteiten/edit/' . Crypt::encrypt($activiteit->id)) }}">
                                    <span class="fa--before"><i class="fas fa-pen"></i></span>Pas aan
                                </a>
                            </p>

                            <form action="{{ url('/admin/activiteiten/remove') }}" method="POST" class="no-margin-bottom">
                                @csrf

                                <input
                                    type="text"
                                    name="id"
                                    value="{{ Crypt::encrypt($activiteit->id) }}"
                                    hidden>

                                <button class="btn btn--without-style link--error" onclick="
                                    confirm('Ben je zeker dat je deze activiteit wilt verwijderen?')
                                        ? NULL
                                        : event.preventDefault();
                                ">
                                    <span class="fa--before"><i class="fas fa-times"></i></span>Verwijder
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="medium-margin">
                <a href="{{ url('/admin/activiteiten/add/' . $tak->link) }}" class="btn btn--primary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg activiteit toe
                </a>
            </div>
        </div>
    </div>
@endsection
