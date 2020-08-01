@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => $evenement->naam,
    ])
    @endcomponent

    <div class="row section">
        <div class="section--extra-small-spacing col-12">
            <a href="{{ url('/admin/evenementen/') }}"><span class="fa--before"><i class="fas fa-angle-left"></i></span>Terug naar overzicht</a>
        </div>

        <div class="section--extra-small-spacing col-12">
            <h2>Wijzig evenement</h2>
        </div>

        <div class="section col-12">
            <form class="form" action="/admin/evenementen/edit" method="POST">
                @csrf

                {{-- ID --}}
                <input
                    type="text"
                    name="id"
                    value="{{ Crypt::encrypt($evenement->id) }}"
                    hidden>

                {{-- Start datum --}}
                {{-- Eind datum --}}
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="row small-gutters">
                            {{-- Datum - Dag --}}
                            <div class="col-3">
                                <div class="form__section form__section--last">
                                    <label for="start_day" class="form__label form__label--required">Dag</label>

                                    <select
                                        id="start_day"
                                        name="begin_datum[]"
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
                                </div>
                            </div>

                            {{-- Datum - Maand --}}
                            <div class="col-5">
                                <div class="form__section">
                                    <label for="start_month" class="form__label form__label--required">Maand</label>

                                    <select
                                        id="start_month"
                                        name="begin_datum[]"
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
                                </div>
                            </div>

                            {{-- Datum - Jaar --}}
                            <div class="col-4">
                                <div class="form__section">
                                    <label for="start_year" class="form__label form__label--required">Jaar</label>

                                    <select
                                        id="start_year"
                                        name="begin_datum[]"
                                        class="form__select form__select--full-width"
                                        required>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="row small-gutters">
                            {{-- Datum - Dag --}}
                            <div class="col-3">
                                <div class="form__section form__section--last">
                                    <label for="eind_day" class="form__label form__label--required">Dag</label>

                                    <select
                                        id="eind_day"
                                        name="eind_datum[]"
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
                                </div>
                            </div>

                            {{-- Datum - Maand --}}
                            <div class="col-5">
                                <div class="form__section">
                                    <label for="eind_month" class="form__label form__label--required">Maand</label>

                                    <select
                                        id="eind_month"
                                        name="eind_datum[]"
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
                                </div>
                            </div>

                            {{-- Datum - Jaar --}}
                            <div class="col-4">
                                <div class="form__section">
                                    <label for="eind_year" class="form__label form__label--required">Jaar</label>

                                    <select
                                        id="eind_year"
                                        name="eind_datum[]"
                                        class="form__select form__select--full-width"
                                        required>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Wijzig evenement</button>
                    <a href="{{ url('/admin/evenementen/') }}" class="btn btn--error">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        (function($){
            // Fill in start date
            document.getElementById('start_day').value = '{{ Carbon\Carbon::parse($evenement->start_datum)->format('d') }}';
            document.getElementById('start_month').value = '{{ Carbon\Carbon::parse($evenement->start_datum)->format('m') }}';
            document.getElementById('start_year').value = '{{ Carbon\Carbon::parse($evenement->start_datum)->format('Y') }}';
            // Fill in eind date
            document.getElementById('eind_day').value = '{{ Carbon\Carbon::parse($evenement->eind_datum)->format('d') }}';
            document.getElementById('eind_month').value = '{{ Carbon\Carbon::parse($evenement->eind_datum)->format('m') }}';
            document.getElementById('eind_year').value = '{{ Carbon\Carbon::parse($evenement->eind_datum)->format('Y') }}';
        })(jQuery);
    </script>
@endsection
