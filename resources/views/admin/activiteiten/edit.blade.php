@extends('layouts.app')

@section('title', 'Admin - Pas activiteit aan')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Activiteit',
        'page_sub_title' => Carbon\Carbon::parse($activiteit->datum)->format('j/m/Y'),
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
                    (object)[
                        'link' => '/admin/activiteiten/'.$activiteit->tak->slug,
                        'name' => $activiteit->tak->naam,
                    ],
                ],
                'current' => 'Activiteit aanpassen',
            ])@endcomponent
        </div>

        <div class="section--extra-small-spacing col-12">
            <h2>Wijzig activiteit</h2>
        </div>

        <div class="section col-12">
            <form class="form" action="/admin/activiteiten/edit" method="POST">
                @csrf

                {{-- ID --}}
                <input
                    type="text"
                    name="id"
                    value="{{ Crypt::encrypt($activiteit->id) }}"
                    hidden>

                {{-- Tak --}}
                <input
                    type="text"
                    name="tak"
                    value="{{ strtolower($activiteit->tak->naam) }}"
                    hidden>

                {{-- Activiteit --}}
                <div class="row">
                    {{-- Is er activiteit? --}}
                    <div class="col-12">
                        {{-- Is er activiteit? --}}
                        <section class="form__section">
                            <input
                                type="checkbox"
                                id="is_activiteit"
                                name="is_activiteit"
                                class="form__checkbox"
                                checked>

                            <label for="is_activiteit" class="form__label form__label--inline">
                                Er wordt activiteit gegeven
                            </label>
                        </section>
                    </div>

                    {{-- Datum --}}
                    {{-- Startuur --}}
                    {{-- Einduur --}}
                    {{-- Prijs --}}
                    {{-- Locatie --}}
                    <div class="col-12 col-md-6">
                        {{-- Datum --}}
                        <section class="form__section">
                            <label for="datum" class="form__label">Datum</label>

                            <input
                                type="date"
                                id="datum"
                                name="datum"
                                value="{{ $activiteit->datum }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('datum'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('datum') }}
                                </span>
                            @endif
                        </section>

                        {{-- Startuur --}}
                        {{-- Einduur --}}
                        <div class="row small-gutters">
                            {{-- Startuur --}}
                            <div class="col-12 col-md-6">
                                <section class="form__section">
                                    <label for="start_uur" class="form__label form__label--required">Start uur</label>

                                    <input
                                        type="time"
                                        id="start_uur"
                                        name="start_uur"
                                        class="form__input form__input--full-width"
                                        value="{{ substr($activiteit->start_uur, 0, 5) }}"
                                        required>

                                    @if ($errors->has('start_uur'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('start_uur') }}
                                        </span>
                                    @endif
                                </section>
                            </div>

                            {{-- Einduur --}}
                            <div class="col-12 col-md-6">
                                <section class="form__section">
                                    <label for="eind_uur" class="form__label form__label--required">Eind uur</label>

                                    <input
                                        type="time"
                                        id="eind_uur"
                                        name="eind_uur"
                                        class="form__input form__input--full-width"
                                        value="{{ substr($activiteit->eind_uur, 0, 5) }}"
                                        required>

                                    @if ($errors->has('eind_uur'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('eind_uur') }}
                                        </span>
                                    @endif
                                </section>
                            </div>
                        </div>

                        {{-- Prijs --}}
                        {{-- Locatie --}}
                        <div class="row small-gutters">
                            {{-- Prijs --}}
                            <div class="col-12 col-md-4">
                                <section class="form__section">
                                    <label for="prijs" class="form__label form__label--required">Prijs</label>

                                    <input
                                        type="number"
                                        id="prijs"
                                        name="prijs"
                                        class="form__input form__input--full-width"
                                        value="{{ $activiteit->prijs }}"
                                        required>

                                    @if ($errors->has('prijs'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('prijs') }}
                                        </span>
                                    @endif
                                </section>
                            </div>

                            {{-- Locatie --}}
                            <div class="col-12 col-md-8">
                                <section class="form__section">
                                    <label for="locatie" class="form__label form__label--required">Locatie</label>

                                    <input
                                        type="text"
                                        id="locatie"
                                        name="locatie"
                                        class="form__input form__input--full-width"
                                        value="{{ $activiteit->locatie }}"
                                        required>

                                    @if ($errors->has('locatie'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('locatie') }}
                                        </span>
                                    @endif
                                </section>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="omschrijving" class="form__label form__label--required">Omschrijving</label>

                            <textarea
                                id="omschrijving"
                                name="omschrijving"
                                class="form__textarea form__input--full-width"
                                required>{{ $activiteit->omschrijving }}</textarea>

                            @if ($errors->has('omschrijving'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('omschrijving') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Wijzig activiteit</button>
                    <a href="{{ route('admin.activiteiten.tak', ['tak' => $activiteit->tak->slug]) }}" class="btn btn--error">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        var $is_activiteit = $('#is_activiteit');

        (function($){
            // Disable fields when there's no activity
            $is_activiteit.on('change',function() {
                toggleBlockableElements();
            });
            $(document).ready(function() {
                toggleBlockableElements();
            });

            // Fill in date
            document.getElementById('day').value = '{{ Carbon\Carbon::parse($activiteit->datum)->format('d') }}';
            document.getElementById('month').value = '{{ Carbon\Carbon::parse($activiteit->datum)->format('m') }}';
            document.getElementById('year').value = '{{ Carbon\Carbon::parse($activiteit->datum)->format('Y') }}';
        })(jQuery);

        function toggleBlockableElements() {
            console.log('toggleBlockableElements');
            var isChecked = $is_activiteit.prop('checked');
            console.log(isChecked);
            var elementsToBlock = [
                $('#start_uur'),
                $('#eind_uur'),
                $('#prijs'),
                $('#locatie'),
                $('#omschrijving')
            ]

            if (isChecked) elementsToBlock.forEach(function(e) {
                e.removeAttr('disabled');
            });
            else elementsToBlock.forEach(function(e) {
                e.attr('disabled', 'true');
            });
        }
    </script>
@endsection
