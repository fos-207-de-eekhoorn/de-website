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
        <div class="section--extra-small-spacing col-12">
            <a href="{{ url('/admin/activiteiten') }}"><span class="fa--before"><i class="fas fa-angle-left"></i></span>Terug naar overzicht</a>
        </div>

        <div class="section col-12">
            <div class="wrapper__btn wrapper__btn--right medium-margin-bottom">
                <a href="{{ url('/admin/activiteit/add/' . strtolower($tak->naam)) }}" class="btn btn--secondary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg activiteit toe
                </a>
            </div>

            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    De activiteit is toegevoegd
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
                    'type' => 'info',
                ])
                    De activiteit is aangepast
                @endcomponent
            @endif

            @if (session('edit_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan, als dit meerdere malen gebeurt, contacteer vooral NIET Paco
                @endcomponent
            @endif

            <table class="table activities">
                @foreach ($tak->activiteiten as $activiteit)
                    <tr class="table__row">
                        <td class="table__cell activities__date">
                            <span class="text--xl">{{ Carbon\Carbon::parse($activiteit->datum)->format('j') }}</span><br>
                            {{ Carbon\Carbon::parse($activiteit->datum)->format('M') }}
                        </td>

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

                        <td class="table__cell no-wrap">
                            <p>
                                <a href="{{ url('/admin/activiteit/edit/' . Crypt::encrypt($activiteit->id)) }}">
                                    <span class="fa--before"><i class="fas fa-pen"></i></span>Pass aan
                                </a>
                            </p>

                            <p class="no-margin-bottom">
                                <a href="{{ url('/admin/activiteit/remove/' . Crypt::encrypt($activiteit->id)) }}" class="link--error">
                                    <span class="fa--before"><i class="fas fa-times"></i></span>Verwijder
                                </a>
                            </p>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="medium-margin">
                <a href="{{ url('/admin/activiteit/add/' . strtolower($tak->naam)) }}" class="btn btn--primary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg activiteit toe
                </a>
            </div>
        </div>
    </div>
@endsection
