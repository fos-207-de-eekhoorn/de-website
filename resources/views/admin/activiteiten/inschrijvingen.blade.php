@extends('layouts.app')

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
                    (object)[
                        'link' => '/admin/activiteiten/'.$activiteit->tak->slug,
                        'name' => $activiteit->tak->naam,
                    ],
                ],
                'current' => 'Inschrijvingen voor '.Carbon\Carbon::parse($activiteit->datum)->format('j/m/Y'),
            ])@endcomponent
        </div>

        <div class="col-12">
            <h2>Inschrijvingen</h2>

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

            @if (session('delete_success'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    De inschrijving is verwijderd.
                    <form action="{{ route('admin.activiteiten.inschrijvingen.remove.undo') }}" method="POST" class="medium-margin-left" style="display: inline;">
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
                    De inschrijving is terug gezet.
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
                    <thead>
                        <tr class="table__row">
                            <td class="table__cell">Voornaam</td>
                            <td class="table__cell">Achternaam</td>
                            <td class="table__cell">Aanwezig?</td>
                            <td class="table__cell"></td>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($activiteit->inschrijvingen as $inschrijving)
                            <tr class="table__row">
                                <td class="table__cell">{{ $inschrijving->voornaam }}</td>
                                <td class="table__cell">{{ $inschrijving->achternaam }}</td>
                                <td class="table__cell">
                                    <div class="toggle-switch">
                                        <input
                                            type="checkbox"
                                            id="toggle-{{ $inschrijving->id }}"
                                            class="toggle-switch__input"
                                            value="{{ $inschrijving->id }}"
                                            @if ($inschrijving->is_aanwezig) checked @endif
                                            hidden>
                                        <label class="toggle-switch__slider" for="toggle-{{ $inschrijving->id }}"></label>
                                    </div>
                                </td>

                                <td class="table__cell no-wrap">
                                    <form action="{{ route('admin.activiteiten.inschrijvingen.remove.post') }}" method="POST" class="no-margin-bottom">
                                        @csrf

                                        <input
                                            type="text"
                                            name="id"
                                            value="{{ Crypt::encrypt($inschrijving->id) }}"
                                            hidden>

                                        <button class="btn btn--without-style link--error" onclick="
                                            confirm('Ben je zeker dat je dit kindje wilt verwijderen uit de inschrijvinglijst?')
                                                ? NULL
                                                : event.preventDefault();
                                        ">
                                            <span class="fa--before"><i class="fas fa-times"></i></span><span class="d-none d-lg-inline">Verwijder</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="table__cell" colspan="4">
                                    Nog geen inschrijvingen
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        (function($){
            $('.toggle-switch__input').change(function() {
                $.ajax({
                    url: "{{ route('api.activiteiten.set_aanwezig') }}",
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