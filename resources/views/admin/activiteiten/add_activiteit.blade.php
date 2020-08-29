@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Activiteit',
        'page_sub_title' => 'toevoegen',
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
                        'link' => '/admin/activiteiten/'.$tak->link,
                        'name' => $tak->naam,
                    ],
                ],
                'current' => 'Activiteit toevoegen',
            ])@endcomponent
        </div>

        <div class="section--extra-small-spacing col-12">
            <h2>Activiteit toevoegen</h2>
        </div>

        <div class="section col-12">
            <form class="form" action="/admin/activiteit/add" method="POST">
                @csrf

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
                    <div class="col-12 col-md-6">
                        <div class="row small-gutters">
                            {{-- Datum - Dag --}}
                            <div class="col-3">
                                <div class="form__section">
                                    <label for="day" class="form__label form__label--required">Dag</label>

                                    <select
                                        id="day"
                                        name="datum[]"
                                        class="form__select form__select--full-width"
                                        required>
                                        <option value="01">1</option>
                                        <option value="02">2</option>
                                        <option value="03">3</option>
                                        <option value="04">4</option>
                                        <option value="05">5</option>
                                        <option value="06">6</option>
                                        <option value="07">7</option>
                                        <option value="08">8</option>
                                        <option value="09">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>

                                    @if ($errors->has('day'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('day') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Datum - Maand --}}
                            <div class="col-5">
                                <div class="form__section">
                                    <label for="month" class="form__label form__label--required">Maand</label>

                                    <select
                                        id="month"
                                        name="datum[]"
                                        class="form__select form__select--full-width"
                                        required>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maart</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Augustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>

                                    @if ($errors->has('month'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('month') }}
                                        </span>
                                        <script>    
                                            trackEvent('View Error Message', {
                                                'message': "{{ $errors->first('month') }}",
                                                'field': 'month'
                                            });
                                        </script>
                                    @endif
                                </div>
                            </div>

                            {{-- Datum - Jaar --}}
                            <div class="col-4">
                                <div class="form__section">
                                    <label for="year" class="form__label form__label--required">Jaar</label>

                                    <select
                                        id="year"
                                        name="datum[]"
                                        class="form__select form__select--full-width"
                                        required>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>

                                    @if ($errors->has('year'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('year') }}
                                        </span>
                                        <script>    
                                            trackEvent('View Error Message', {
                                                'message': "{{ $errors->first('year') }}",
                                                'field': 'year'
                                            });
                                        </script>
                                    @endif
                                </div>
                            </div>
                        </div>

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
                                        value="14:00"
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
                                        value="17:00"
                                        required>

                                    @if ($errors->has('eind_uur'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('eind_uur') }}
                                        </span>
                                    @endif
                                </section>
                            </div>
                        </div>

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
                                        value="0"
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
                                        value="Lokaal"
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

                    {{-- Tak --}}
                    {{-- Omschrijving --}}
                    <div class="col-12 col-md-6">
                        {{-- Tak --}}
                        <section class="form__section">
                            <label for="tak" class="form__label form__label--required">Tak</label>

                            <select
                                id="tak"
                                name="tak"
                                class="form__select form__select--full-width"
                                required>
                                @foreach($takken as $tak_details)
                                    <option
                                        value="{{ Crypt::encrypt($tak_details->id) }}"
                                        @if($tak_details->link == $tak->link)
                                            selected
                                        @endif
                                        >
                                        {{ $tak_details->naam }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('tak'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('tak') }}
                                </span>
                            @endif
                        </section>

                        {{-- Omschrijving --}}
                        <section class="form__section form__section--last">
                            <label for="omschrijving" class="form__label form__label--required">Omschrijving</label>

                            <textarea
                                id="omschrijving"
                                name="omschrijving"
                                class="form__textarea form__input--full-width"
                                required></textarea>

                            @if ($errors->has('omschrijving'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('omschrijving') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Voeg toe</button>
                    <a href="{{ isset($tak) ? url('/admin/activiteiten/' . $tak->link) : url()->previous() }}" class="btn btn--error">Cancel</a>
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
            var d = new Date();

            document.getElementById('day').value = doubleDigits(d.getDate());
            document.getElementById('month').value = doubleDigits(d.getMonth() + 1);
            document.getElementById('year').value = d.getFullYear();

            function doubleDigits(n) {
                if (n < 10) return "0" + n;
                else return n;
            }
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
