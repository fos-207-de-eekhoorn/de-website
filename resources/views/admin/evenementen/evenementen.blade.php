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

                <a href="{{ url('/admin/evenementen/add/') }}" class="btn btn--primary">
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
                                    {{ Carbon\Carbon::parse($evenement->eind_datum)->format('Y') !== Carbon\Carbon::now('Europe/Berlin')->format('Y')
                                        ? Carbon\Carbon::parse($evenement->eind_datum)->format('Y')
                                        : ''}}
                                </td>

                                <td class="table__cell">
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
    </div>

    <script>
        (function($){
            $('.toggle-switch__input').change(function() {
                $.ajax({
                    url: "{{ url('/admin/evenementen/set-active') }}",
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