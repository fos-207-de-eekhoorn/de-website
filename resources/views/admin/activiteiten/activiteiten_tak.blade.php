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
            @if (session('edit_success'))
                @component('components.flash_message', [
                    'type' => 'success',
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

            <table class="table activities section">
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
                            <a href="{{ url('/admin/activiteit/edit/' . Crypt::encrypt($activiteit->id)) }}"><span class="fa--before"><i class="fas fa-pen"></i></span>Pass aan</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
