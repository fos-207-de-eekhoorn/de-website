@extends('layouts.app')

@section('title')
    Admin - Evenementen
@endsection

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

                <a href="{{ route('admin.evenementen.add') }}" class="btn btn--primary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg evenement toe
                </a>
            </div>

            <div class="ajax-error" style="display: none;">
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Dit zou niet mogen gebeuren, bel Paco.
                @endcomponent
            </div>

            <div class="ajax-fail" style="display: none;">
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gelopen. Best eens de pagina refreshen.
                @endcomponent
            </div>

            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Het evenement is toegevoegd.
                @endcomponent
            @endif

            @if (session('edit_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Je evenement is aangepast.
                @endcomponent
            @endif

            @if (session('delete_success'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    Je evenement is verwijderd.
                    <form action="{{ route('admin.evenementen.remove.undo') }}" method="POST" class="medium-margin-left" style="display: inline;">
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
                    Er is iets fout gegaan. Als dit meerdere malen gebeurt, contacteer vooral NIET Paco! Laat hem gerust!
                @endcomponent
            @endif

            @if (session('restore_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Je evenement is terug gezet.
                @endcomponent
            @endif

            @if (session('restore_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Geen paniek, Paco kan deze terugzetten.
                @endcomponent
            @endif

            <div class="wrapper__table">
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
                            <tr class="table__row
                                @if ( Carbon\Carbon::parse($evenement->eind_datum) < Carbon\Carbon::now('Europe/Berlin') )
                                    table__row--non-active
                                @elseif ( Carbon\Carbon::parse($evenement->start_datum) < Carbon\Carbon::now('Europe/Berlin') )
                                    table__row--active
                                @endif
                            ">
                                <td class="table__cell">
                                    {{ $evenement->naam }}
                                </td>

                                <td class="table__cell">
                                    {{ ($evenement->start_datum === $evenement->eind_datum)
                                        ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                                        : ((Carbon\Carbon::parse($evenement->start_datum)->monthName === Carbon\Carbon::parse($evenement->eind_datum)->monthName)
                                            ? Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName
                                            : Carbon\Carbon::parse($evenement->start_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->start_datum)->monthName . ' - ' . Carbon\Carbon::parse($evenement->eind_datum)->format('j') . ' ' . Carbon\Carbon::parse($evenement->eind_datum)->monthName) }}
                                    {{ Carbon\Carbon::parse($evenement->eind_datum)->format('Y') !== Carbon\Carbon::now('Europe/Berlin')->format('Y')
                                        ? Carbon\Carbon::parse($evenement->eind_datum)->format('Y')
                                        : ''}}
                                </td>

                                <td class="table__cell">
                                    @if ( Carbon\Carbon::parse($evenement->eind_datum) >= Carbon\Carbon::now('Europe/Berlin') )
                                        <div class="toggle-switch">
                                            <input
                                                type="checkbox"
                                                id="toggle-{{ $evenement->id }}"
                                                class="toggle-switch__input"
                                                value="{{ $evenement->id }}"
                                                @if ($evenement->active) checked @endif
                                                hidden>
                                            <label class="toggle-switch__slider" for="toggle-{{ $evenement->id }}"></label>
                                        </div>
                                    @else
                                        Gepasseerd
                                    @endif
                                </td>

                                <td class="table__cell no-wrap">
                                    <p @if ( Carbon\Carbon::parse($evenement->eind_datum) < Carbon\Carbon::now('Europe/Berlin') ) class="no-margin-bottom" @endif>
                                        <a href="{{ route('evenementen.details', [$evenement->url]) }}">
                                            <span class="fa--before"><i class="fas fa-eye"></i></span>Bekijk evenement
                                        </a>
                                    </p>

                                    @if ( Carbon\Carbon::parse($evenement->eind_datum) >= Carbon\Carbon::now('Europe/Berlin') )
                                        <p>
                                            <a href="{{ route('admin.evenementen.edit', [Crypt::encrypt($evenement->id)]) }}">
                                                <span class="fa--before"><i class="fas fa-pen"></i></span>Pas aan
                                            </a>
                                        </p>

                                        <form action="{{ route('admin.evenementen.remove.post') }}" method="POST" class="no-margin-bottom">
                                            @csrf

                                            <input
                                                type="text"
                                                name="id"
                                                value="{{ Crypt::encrypt($evenement->id) }}"
                                                hidden>

                                            <button class="btn btn--without-style link--error" onclick="
                                                confirm('Ben je zeker dat je dit evenement wilt verwijderen?')
                                                    ? NULL
                                                    : event.preventDefault();
                                            ">
                                                <span class="fa--before"><i class="fas fa-times"></i></span>Verwijder
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        (function($){
            $('.toggle-switch__input').change(function() {
                $.ajax({
                    url: "{{ route('api.evenementen.set_active') }}",
                    type: "post",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id':  $(this).val(),
                        'status': $(this).prop('checked') ? 1 : 0
                    }
                }).done(function(data) {
                    if (data == 'false') {
                        $(this).prop('checked', !$(this).prop('checked'));
                        $('.ajax-error').slideDown(300);
                    } else {
                        $('.ajax-error').slideUp(300);
                        $('.ajax-fail').slideUp(300);
                    }
                }).fail(function() {
                    $(this).prop('checked', !$(this).prop('checked'));
                    $('.ajax-fail').slideDown(300);
                });
            });
        })(jQuery);
    </script>
@endsection