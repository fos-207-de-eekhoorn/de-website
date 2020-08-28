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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        (function($){
            $('.toggle-switch__input').change(function() {
                $.ajax({
                    url: "{{ url('/admin/activiteiten/set-aanwezig') }}",
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