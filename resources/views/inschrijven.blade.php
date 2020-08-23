@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Schrijf je hier in',
    ])
    @endcomponent

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js?hl=nl" async defer></script>

    {{-- Contact formulier --}}
    {{-- EL & AEL --}}
    <div class="row section">
        <div class="col-12 col-lg-7">

            @if (session('inschrijven_form_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    We hebben je inschrijving goed ontvangen.
                @endcomponent
            @endif

            @if (session('inschrijven_form_error_captcha'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Gelieve aan te geven dat u geen robot bent.
                @endcomponent
            @endif

            <form id="inschrijving-form" class="form" action="/inschrijven" method="POST">
                @csrf
                
                <h2>Lid</h2>

                <h4>Algemene info</h4>
                {{-- Voornaam --}}
                {{-- Achternaam --}}
                <div class="row">
                    {{-- Voornaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voornaam" class="form__label form__label--required">Voornaam</label>

                            <input
                                type="text"
                                id="voornaam"
                                name="voornaam"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voornaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voornaam') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Achternaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="achternaam" class="form__label form__label--required">Achternaam</label>

                            <input
                                type="text"
                                id="achternaam"
                                name="achternaam"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('achternaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('achternaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Email --}}
                {{-- Geboortedatum --}}
                <div class="row">
                    {{-- Email --}}
                    <div class="col-12 col-md-5">
                        <section class="form__section">
                            <label for="email" class="form__label">Email</label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form__input form__input--full-width">

                            @if ($errors->has('email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Telefoon nummer --}}
                    <div class="col-12 col-md-4">
                        <section class="form__section">
                            <label for="telefoon" class="form__label">Telefoon nummer</label>

                            <input
                                type="tel"
                                id="telefoon"
                                name="telefoon"
                                class="form__input form__input--full-width">

                            @if ($errors->has('telefoon'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('telefoon') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Geslacht --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="geslacht" class="form__label">Geslacht</label>

                            <select
                                id="geslacht"
                                name="geslacht"
                                class="form__select form__select--full-width">
                                <option value="none">-</option>
                                <option value="jongen">Jongen</option>
                                <option value="meisje">Meisje</option>
                                <option value="ander">Ander</option>
                            </select>

                            @if ($errors->has('geslacht'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('geslacht') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <h4>Geboorte datum</h4>
                {{-- Geboortedatum --}}
                <div class="row small-gutters">
                    {{-- Geboortedatum - Dag --}}
                    <div class="col-3">
                        <div class="form__section">
                            <label for="day" class="form__label form__label--required">Dag</label>

                            <select
                                id="day"
                                name="geboortedatum[]"
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

                    {{-- Geboortedatum - Maand --}}
                    <div class="col-5">
                        <div class="form__section">
                            <label for="month" class="form__label form__label--required">Maand</label>

                            <select
                                id="month"
                                name="geboortedatum[]"
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
                            @endif
                        </div>
                    </div>

                    {{-- Geboortedatum - Jaar --}}
                    <div class="col-4">
                        <div class="form__section">
                            <label for="year" class="form__label form__label--required">Jaar</label>

                            <select
                                id="year"
                                name="geboortedatum[]"
                                class="form__select form__select--full-width"
                                required>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010" selected>2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                            </select>

                            @if ($errors->has('year'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('year') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <h4>Adres</h4>
                {{-- Adres --}}
                <div class="row small-gutters">
                    {{-- Straat --}}
                    <div class="col-12 col-md-7">
                        <section class="form__section">
                            <label for="straat" class="form__label form__label--required">Straat</label>

                            <input
                                type="text"
                                id="straat"
                                name="straat"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('straat'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('straat') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Nummer --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="nummer" class="form__label form__label--required">Nummer</label>

                            <input
                                type="text"
                                id="nummer"
                                name="nummer"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('nummer'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('nummer') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Bus --}}
                    <div class="col-12 col-md-2">
                        <section class="form__section">
                            <label for="bus" class="form__label">Bus</label>

                            <input
                                type="text"
                                id="bus"
                                name="bus"
                                class="form__input form__input--full-width">

                            @if ($errors->has('bus'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('bus') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Postcode --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="postcode" class="form__label form__label--required">Postcode</label>

                            <input
                                type="text"
                                id="postcode"
                                name="postcode"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Plaats --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="postcode" class="form__label form__label--required">Plaats</label>

                            <input
                                type="text"
                                id="postcode"
                                name="postcode"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Land --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="land" class="form__label form__label--required">Land</label>

                            <input
                                type="text"
                                id="land"
                                name="land"
                                list="landen"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('land'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('land') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <h4>Extra</h4>
                {{-- Medische gegevens --}}
                <section class="form__section">
                    <label for="medisch" class="form__label">Medische gegevens / opmerkingen</label>

                    <textarea
                        id="medisch"
                        name="medisch"
                        class="form__textarea form__input--full-width"></textarea>

                    @if ($errors->has('medisch'))
                        <span class="form__section-feedback">
                            {{ $errors->first('medisch') }}
                        </span>
                    @endif
                </section>

                {{-- Beeldmateriaal --}}
                <section class="form__section form__section--last">
                    <div class="form__checkbox-wrapper">
                        <input
                            type="checkbox"
                            id="beeldmateriaal"
                            name="beeldmateriaal"
                            class="form__checkbox"
                            required>

                        <label for="beeldmateriaal" class="form__label form__label--required">
                            Ik geef toestemming dat mijn kind beeldmateriaal mag bekijken bestemd voor zijn leeftijd.
                        </label>
                    </div>

                    @if ($errors->has('beeldmateriaal'))
                        <span class="form__section-feedback">
                            {{ $errors->first('beeldmateriaal') }}
                        </span>
                    @endif
                </section>

                <h2>Ouder / Voogd 1</h2>

                <h4>Algemene info</h4>
                {{-- Voornaam --}}
                {{-- Achternaam --}}
                <div class="row">
                    {{-- Voornaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-1-voornaam" class="form__label form__label--required">Voornaam</label>

                            <input
                                type="text"
                                id="voogd-1-voornaam"
                                name="voogd-1-voornaam"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-1-voornaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-voornaam') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Achternaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-1-achternaam" class="form__label form__label--required">Achternaam</label>

                            <input
                                type="text"
                                id="voogd-1-achternaam"
                                name="voogd-1-achternaam"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-1-achternaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-achternaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Email --}}
                {{-- Geboortedatum --}}
                <div class="row">
                    {{-- Email --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-1-email" class="form__label form__label--required">Email</label>

                            <input
                                type="email"
                                id="voogd-1-email"
                                name="voogd-1-email"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-1-email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-email') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Telefoon nummer --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-1-telefoon" class="form__label form__label--required">Telefoon nummer</label>

                            <input
                                type="tel"
                                id="voogd-1-telefoon"
                                name="voogd-1-telefoon"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-1-telefoon'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-telefoon') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <h4>Adres</h4>
                {{-- Adres --}}
                <div class="row small-gutters">
                    {{-- Straat --}}
                    <div class="col-12 col-md-7">
                        <section class="form__section">
                            <label for="voogd-1-straat" class="form__label">Straat</label>

                            <input
                                type="text"
                                id="voogd-1-straat"
                                name="voogd-1-straat"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-1-straat'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-straat') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Nummer --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd-1-nummer" class="form__label">Nummer</label>

                            <input
                                type="text"
                                id="voogd-1-nummer"
                                name="voogd-1-nummer"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-1-nummer'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-nummer') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Bus --}}
                    <div class="col-12 col-md-2">
                        <section class="form__section">
                            <label for="voogd-1-bus" class="form__label">Bus</label>

                            <input
                                type="text"
                                id="voogd-1-bus"
                                name="voogd-1-bus"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-1-bus'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-bus') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Postcode --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd-1-postcode" class="form__label">Postcode</label>

                            <input
                                type="text"
                                id="voogd-1-postcode"
                                name="voogd-1-postcode"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-1-postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Plaats --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-1-postcode" class="form__label">Plaats</label>

                            <input
                                type="text"
                                id="voogd-1-postcode"
                                name="voogd-1-postcode"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-1-postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Land --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section form__section--last">
                            <label for="voogd-1-land" class="form__label">Land</label>

                            <input
                                type="text"
                                id="voogd-1-land"
                                name="voogd-1-land"
                                list="landen"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-1-land'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-1-land') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <h2>Ouder / Voogd 2</h2>

                <h4>Algemene info</h4>
                {{-- Voornaam --}}
                {{-- Achternaam --}}
                <div class="row">
                    {{-- Voornaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-2-voornaam" class="form__label form__label--required">Voornaam</label>

                            <input
                                type="text"
                                id="voogd-2-voornaam"
                                name="voogd-2-voornaam"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-2-voornaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-voornaam') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Achternaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-2-achternaam" class="form__label form__label--required">Achternaam</label>

                            <input
                                type="text"
                                id="voogd-2-achternaam"
                                name="voogd-2-achternaam"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-2-achternaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-achternaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Email --}}
                {{-- Geboortedatum --}}
                <div class="row">
                    {{-- Email --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-2-email" class="form__label form__label--required">Email</label>

                            <input
                                type="email"
                                id="voogd-2-email"
                                name="voogd-2-email"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-2-email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-email') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Telefoon nummer --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-2-telefoon" class="form__label form__label--required">Telefoon nummer</label>

                            <input
                                type="tel"
                                id="voogd-2-telefoon"
                                name="voogd-2-telefoon"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd-2-telefoon'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-telefoon') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <h4>Adres</h4>
                {{-- Adres --}}
                <div class="row small-gutters">
                    {{-- Straat --}}
                    <div class="col-12 col-md-7">
                        <section class="form__section">
                            <label for="voogd-2-straat" class="form__label">Straat</label>

                            <input
                                type="text"
                                id="voogd-2-straat"
                                name="voogd-2-straat"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-2-straat'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-straat') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Nummer --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd-2-nummer" class="form__label">Nummer</label>

                            <input
                                type="text"
                                id="voogd-2-nummer"
                                name="voogd-2-nummer"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-2-nummer'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-nummer') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Bus --}}
                    <div class="col-12 col-md-2">
                        <section class="form__section">
                            <label for="voogd-2-bus" class="form__label">Bus</label>

                            <input
                                type="text"
                                id="voogd-2-bus"
                                name="voogd-2-bus"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-2-bus'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-bus') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Postcode --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd-2-postcode" class="form__label">Postcode</label>

                            <input
                                type="text"
                                id="voogd-2-postcode"
                                name="voogd-2-postcode"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-2-postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Plaats --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd-2-postcode" class="form__label">Plaats</label>

                            <input
                                type="text"
                                id="voogd-2-postcode"
                                name="voogd-2-postcode"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-2-postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Land --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd-2-land" class="form__label">Land</label>

                            <input
                                type="text"
                                id="voogd-2-land"
                                name="voogd-2-land"
                                list="landen"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd-2-land'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd-2-land') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- ReCAPTCHA --}}
                <section class="form__section form__section--last">
                    <div class="g-recaptcha" data-sitekey="6LfqfeoUAAAAADUtJuiXGbAnaBjrjsCFF984zJe9" data-callback="correctCaptcha"></div>
                </section>

                <button class="btn btn--primary recaptchaDisable">Verzend</button>
            </form>
        </div>

        <div class="col-12 col-lg-5">
            <div class="leiding-card-list">
                @component('components.leiding_card', [
                    'leider' => $el,
                ])
                @endcomponent

                @foreach($ael as $ael_leider)
                    @component('components.leiding_card', [
                        'leider' => $ael_leider,
                    ])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>

    <datalist id="landen">
        <option value="België">
        <option value="Nederland">
        <option value="Frankrijk">
        <option value="Luxemburg">
    </datalist>

    <script>
        // Extra fields
        $extraFields = $('.extraFields');

        displayExtraFields(false);

        function handleClick(checkbox) {
            displayExtraFields(checkbox.checked);
        }

        function displayExtraFields(display) {
            $extraFields.css('display', (display ? 'flex' : 'none'));
        }

        // reCAPTCHA
        // $('.recaptchaDisable').prop('disabled', true).prop('title', 'Gelieve aan te geven dat u geen robot bent');

        function correctCaptcha() {
            $('.recaptchaDisable').prop('disabled', false).prop('title', '');
        }
    </script>
@endsection