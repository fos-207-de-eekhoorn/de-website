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
        <div class="col-12 col-lg-7 section">
            @if (session('inschrijving_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    We hebben je inschrijving goed ontvangen.
                @endcomponent
            @endif

            @if (session('inschrijving_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets misgelopen. Als dit blijft gebeuren, gelieven een mailtje te sturen met deze gegevens naar <a href="mailto:fos207ste@gmail.com">fos207ste@gmail.com</a>
                @endcomponent
            @endif

            @if (session('inschrijving_error_captcha'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Gelieve aan te geven dat u geen robot bent.
                @endcomponent
            @endif

            <form id="inschrijving-form" class="form" action="{{ url('/alle-info/inschrijven') }}" method="POST">
                @csrf
                
                <h2>Lid</h2>

                <h4>Algemene info</h4>
                {{-- Voornaam --}}
                {{-- Achternaam --}}
                <div class="row small-gutters">
                    {{-- Voornaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voornaam" class="form__label form__label--required">Voornaam</label>

                            <input
                                type="text"
                                id="voornaam"
                                name="voornaam"
                                value="{{ old('voornaam') }}"
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
                                value="{{ old('achternaam') }}"
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
                {{-- Geslacht --}}
                <div class="row small-gutters">
                    {{-- Email --}}
                    <div class="col-12 col-md-5">
                        <section class="form__section">
                            <label for="email" class="form__label">Email</label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
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
                                value="{{ old('telefoon') }}"
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
                                <option value="undefined" @if( old('geslacht') == "undefined" ) selected @endif>-</option>
                                <option value="jongen" @if( old('geslacht') == "jongen" ) selected @endif>Jongen</option>
                                <option value="meisje" @if( old('geslacht') == "meisje" ) selected @endif>Meisje</option>
                                <option value="ander" @if( old('geslacht') == "ander" ) selected @endif>Ander</option>
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
                                <option value="01" @if( old('geboortedatum') && old('geboortedatum')[0] == "01" ) selected @endif>1</option>
                                <option value="02" @if( old('geboortedatum') && old('geboortedatum')[0] == "02" ) selected @endif>2</option>
                                <option value="03" @if( old('geboortedatum') && old('geboortedatum')[0] == "03" ) selected @endif>3</option>
                                <option value="04" @if( old('geboortedatum') && old('geboortedatum')[0] == "04" ) selected @endif>4</option>
                                <option value="05" @if( old('geboortedatum') && old('geboortedatum')[0] == "05" ) selected @endif>5</option>
                                <option value="06" @if( old('geboortedatum') && old('geboortedatum')[0] == "06" ) selected @endif>6</option>
                                <option value="07" @if( old('geboortedatum') && old('geboortedatum')[0] == "07" ) selected @endif>7</option>
                                <option value="08" @if( old('geboortedatum') && old('geboortedatum')[0] == "08" ) selected @endif>8</option>
                                <option value="09" @if( old('geboortedatum') && old('geboortedatum')[0] == "09" ) selected @endif>9</option>
                                <option value="10" @if( old('geboortedatum') && old('geboortedatum')[0] == "10" ) selected @endif>10</option>
                                <option value="11" @if( old('geboortedatum') && old('geboortedatum')[0] == "11" ) selected @endif>11</option>
                                <option value="12" @if( old('geboortedatum') && old('geboortedatum')[0] == "12" ) selected @endif>12</option>
                                <option value="13" @if( old('geboortedatum') && old('geboortedatum')[0] == "13" ) selected @endif>13</option>
                                <option value="14" @if( old('geboortedatum') && old('geboortedatum')[0] == "14" ) selected @endif>14</option>
                                <option value="15" @if( old('geboortedatum') && old('geboortedatum')[0] == "15" ) selected @endif>15</option>
                                <option value="16" @if( old('geboortedatum') && old('geboortedatum')[0] == "16" ) selected @endif>16</option>
                                <option value="17" @if( old('geboortedatum') && old('geboortedatum')[0] == "17" ) selected @endif>17</option>
                                <option value="18" @if( old('geboortedatum') && old('geboortedatum')[0] == "18" ) selected @endif>18</option>
                                <option value="19" @if( old('geboortedatum') && old('geboortedatum')[0] == "19" ) selected @endif>19</option>
                                <option value="20" @if( old('geboortedatum') && old('geboortedatum')[0] == "20" ) selected @endif>20</option>
                                <option value="21" @if( old('geboortedatum') && old('geboortedatum')[0] == "21" ) selected @endif>21</option>
                                <option value="22" @if( old('geboortedatum') && old('geboortedatum')[0] == "22" ) selected @endif>22</option>
                                <option value="23" @if( old('geboortedatum') && old('geboortedatum')[0] == "23" ) selected @endif>23</option>
                                <option value="24" @if( old('geboortedatum') && old('geboortedatum')[0] == "24" ) selected @endif>24</option>
                                <option value="25" @if( old('geboortedatum') && old('geboortedatum')[0] == "25" ) selected @endif>25</option>
                                <option value="26" @if( old('geboortedatum') && old('geboortedatum')[0] == "26" ) selected @endif>26</option>
                                <option value="27" @if( old('geboortedatum') && old('geboortedatum')[0] == "27" ) selected @endif>27</option>
                                <option value="28" @if( old('geboortedatum') && old('geboortedatum')[0] == "28" ) selected @endif>28</option>
                                <option value="29" @if( old('geboortedatum') && old('geboortedatum')[0] == "29" ) selected @endif>29</option>
                                <option value="30" @if( old('geboortedatum') && old('geboortedatum')[0] == "30" ) selected @endif>30</option>
                                <option value="31" @if( old('geboortedatum') && old('geboortedatum')[0] == "31" ) selected @endif>31</option>
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
                                <option value="01" @if( old('geboortedatum') && old('geboortedatum')[1] == "01" ) selected @endif>Januari</option>
                                <option value="02" @if( old('geboortedatum') && old('geboortedatum')[1] == "02" ) selected @endif>Februari</option>
                                <option value="03" @if( old('geboortedatum') && old('geboortedatum')[1] == "03" ) selected @endif>Maart</option>
                                <option value="04" @if( old('geboortedatum') && old('geboortedatum')[1] == "04" ) selected @endif>April</option>
                                <option value="05" @if( old('geboortedatum') && old('geboortedatum')[1] == "05" ) selected @endif>Mei</option>
                                <option value="06" @if( old('geboortedatum') && old('geboortedatum')[1] == "06" ) selected @endif>Juni</option>
                                <option value="07" @if( old('geboortedatum') && old('geboortedatum')[1] == "07" ) selected @endif>Juli</option>
                                <option value="08" @if( old('geboortedatum') && old('geboortedatum')[1] == "08" ) selected @endif>Augustus</option>
                                <option value="09" @if( old('geboortedatum') && old('geboortedatum')[1] == "09" ) selected @endif>September</option>
                                <option value="10" @if( old('geboortedatum') && old('geboortedatum')[1] == "10" ) selected @endif>Oktober</option>
                                <option value="11" @if( old('geboortedatum') && old('geboortedatum')[1] == "11" ) selected @endif>November</option>
                                <option value="12" @if( old('geboortedatum') && old('geboortedatum')[1] == "12" ) selected @endif>December</option>
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
                                <option value="2020" @if( old('geboortedatum') && old('geboortedatum')[2] == "2020" ) selected @endif>2020</option>
                                <option value="2019" @if( old('geboortedatum') && old('geboortedatum')[2] == "2019" ) selected @endif>2019</option>
                                <option value="2018" @if( old('geboortedatum') && old('geboortedatum')[2] == "2018" ) selected @endif>2018</option>
                                <option value="2017" @if( old('geboortedatum') && old('geboortedatum')[2] == "2017" ) selected @endif>2017</option>
                                <option value="2016" @if( old('geboortedatum') && old('geboortedatum')[2] == "2016" ) selected @endif>2016</option>
                                <option value="2015" @if( old('geboortedatum') && old('geboortedatum')[2] == "2015" ) selected @endif>2015</option>
                                <option value="2014" @if( old('geboortedatum') && old('geboortedatum')[2] == "2014" ) selected @endif>2014</option>
                                <option value="2013" @if( old('geboortedatum') && old('geboortedatum')[2] == "2013" ) selected @endif>2013</option>
                                <option value="2012" @if( old('geboortedatum') && old('geboortedatum')[2] == "2012" ) selected @endif>2012</option>
                                <option value="2011" @if( old('geboortedatum') && old('geboortedatum')[2] == "2011" ) selected @endif>2011</option>
                                <option value="2010" @if( old('geboortedatum') && old('geboortedatum')[2] == "2010" ) selected @endif>2010</option>
                                <option value="2009" @if( old('geboortedatum') && old('geboortedatum')[2] == "2009" ) selected @endif>2009</option>
                                <option value="2008" @if( old('geboortedatum') && old('geboortedatum')[2] == "2008" ) selected @endif>2008</option>
                                <option value="2007" @if( old('geboortedatum') && old('geboortedatum')[2] == "2007" ) selected @endif>2007</option>
                                <option value="2006" @if( old('geboortedatum') && old('geboortedatum')[2] == "2006" ) selected @endif>2006</option>
                                <option value="2005" @if( old('geboortedatum') && old('geboortedatum')[2] == "2005" ) selected @endif>2005</option>
                                <option value="2004" @if( old('geboortedatum') && old('geboortedatum')[2] == "2004" ) selected @endif>2004</option>
                                <option value="2003" @if( old('geboortedatum') && old('geboortedatum')[2] == "2003" ) selected @endif>2003</option>
                                <option value="2002" @if( old('geboortedatum') && old('geboortedatum')[2] == "2002" ) selected @endif>2002</option>
                                <option value="2001" @if( old('geboortedatum') && old('geboortedatum')[2] == "2001" ) selected @endif>2001</option>
                                <option value="2000" @if( old('geboortedatum') && old('geboortedatum')[2] == "2000" ) selected @endif>2000</option>
                                <option value="1999" @if( old('geboortedatum') && old('geboortedatum')[2] == "1999" ) selected @endif>1999</option>
                                <option value="1998" @if( old('geboortedatum') && old('geboortedatum')[2] == "1998" ) selected @endif>1998</option>
                                <option value="1997" @if( old('geboortedatum') && old('geboortedatum')[2] == "1997" ) selected @endif>1997</option>
                                <option value="1996" @if( old('geboortedatum') && old('geboortedatum')[2] == "1996" ) selected @endif>1996</option>
                                <option value="1995" @if( old('geboortedatum') && old('geboortedatum')[2] == "1995" ) selected @endif>1995</option>
                                <option value="1994" @if( old('geboortedatum') && old('geboortedatum')[2] == "1994" ) selected @endif>1994</option>
                                <option value="1993" @if( old('geboortedatum') && old('geboortedatum')[2] == "1993" ) selected @endif>1993</option>
                                <option value="1992" @if( old('geboortedatum') && old('geboortedatum')[2] == "1992" ) selected @endif>1992</option>
                                <option value="1991" @if( old('geboortedatum') && old('geboortedatum')[2] == "1991" ) selected @endif>1991</option>
                                <option value="1990" @if( old('geboortedatum') && old('geboortedatum')[2] == "1990" ) selected @endif>1990</option>
                                <option value="1989" @if( old('geboortedatum') && old('geboortedatum')[2] == "1989" ) selected @endif>1989</option>
                                <option value="1988" @if( old('geboortedatum') && old('geboortedatum')[2] == "1988" ) selected @endif>1988</option>
                                <option value="1987" @if( old('geboortedatum') && old('geboortedatum')[2] == "1987" ) selected @endif>1987</option>
                                <option value="1986" @if( old('geboortedatum') && old('geboortedatum')[2] == "1986" ) selected @endif>1986</option>
                                <option value="1985" @if( old('geboortedatum') && old('geboortedatum')[2] == "1985" ) selected @endif>1985</option>
                                <option value="1984" @if( old('geboortedatum') && old('geboortedatum')[2] == "1984" ) selected @endif>1984</option>
                                <option value="1983" @if( old('geboortedatum') && old('geboortedatum')[2] == "1983" ) selected @endif>1983</option>
                                <option value="1982" @if( old('geboortedatum') && old('geboortedatum')[2] == "1982" ) selected @endif>1982</option>
                                <option value="1981" @if( old('geboortedatum') && old('geboortedatum')[2] == "1981" ) selected @endif>1981</option>
                                <option value="1980" @if( old('geboortedatum') && old('geboortedatum')[2] == "1980" ) selected @endif>1980</option>
                                <option value="1979" @if( old('geboortedatum') && old('geboortedatum')[2] == "1979" ) selected @endif>1979</option>
                                <option value="1978" @if( old('geboortedatum') && old('geboortedatum')[2] == "1978" ) selected @endif>1978</option>
                                <option value="1977" @if( old('geboortedatum') && old('geboortedatum')[2] == "1977" ) selected @endif>1977</option>
                                <option value="1976" @if( old('geboortedatum') && old('geboortedatum')[2] == "1976" ) selected @endif>1976</option>
                                <option value="1975" @if( old('geboortedatum') && old('geboortedatum')[2] == "1975" ) selected @endif>1975</option>
                                <option value="1974" @if( old('geboortedatum') && old('geboortedatum')[2] == "1974" ) selected @endif>1974</option>
                                <option value="1973" @if( old('geboortedatum') && old('geboortedatum')[2] == "1973" ) selected @endif>1973</option>
                                <option value="1972" @if( old('geboortedatum') && old('geboortedatum')[2] == "1972" ) selected @endif>1972</option>
                                <option value="1971" @if( old('geboortedatum') && old('geboortedatum')[2] == "1971" ) selected @endif>1971</option>
                                <option value="1970" @if( old('geboortedatum') && old('geboortedatum')[2] == "1970" ) selected @endif>1970</option>
                                <option value="1969" @if( old('geboortedatum') && old('geboortedatum')[2] == "1969" ) selected @endif>1969</option>
                                <option value="1968" @if( old('geboortedatum') && old('geboortedatum')[2] == "1968" ) selected @endif>1968</option>
                                <option value="1967" @if( old('geboortedatum') && old('geboortedatum')[2] == "1967" ) selected @endif>1967</option>
                                <option value="1966" @if( old('geboortedatum') && old('geboortedatum')[2] == "1966" ) selected @endif>1966</option>
                                <option value="1965" @if( old('geboortedatum') && old('geboortedatum')[2] == "1965" ) selected @endif>1965</option>
                                <option value="1964" @if( old('geboortedatum') && old('geboortedatum')[2] == "1964" ) selected @endif>1964</option>
                                <option value="1963" @if( old('geboortedatum') && old('geboortedatum')[2] == "1963" ) selected @endif>1963</option>
                                <option value="1962" @if( old('geboortedatum') && old('geboortedatum')[2] == "1962" ) selected @endif>1962</option>
                                <option value="1961" @if( old('geboortedatum') && old('geboortedatum')[2] == "1961" ) selected @endif>1961</option>
                                <option value="1960" @if( old('geboortedatum') && old('geboortedatum')[2] == "1960" ) selected @endif>1960</option>
                                <option value="1959" @if( old('geboortedatum') && old('geboortedatum')[2] == "1959" ) selected @endif>1959</option>
                                <option value="1958" @if( old('geboortedatum') && old('geboortedatum')[2] == "1958" ) selected @endif>1958</option>
                                <option value="1957" @if( old('geboortedatum') && old('geboortedatum')[2] == "1957" ) selected @endif>1957</option>
                                <option value="1956" @if( old('geboortedatum') && old('geboortedatum')[2] == "1956" ) selected @endif>1956</option>
                                <option value="1955" @if( old('geboortedatum') && old('geboortedatum')[2] == "1955" ) selected @endif>1955</option>
                                <option value="1954" @if( old('geboortedatum') && old('geboortedatum')[2] == "1954" ) selected @endif>1954</option>
                                <option value="1953" @if( old('geboortedatum') && old('geboortedatum')[2] == "1953" ) selected @endif>1953</option>
                                <option value="1952" @if( old('geboortedatum') && old('geboortedatum')[2] == "1952" ) selected @endif>1952</option>
                                <option value="1951" @if( old('geboortedatum') && old('geboortedatum')[2] == "1951" ) selected @endif>1951</option>
                                <option value="1950" @if( old('geboortedatum') && old('geboortedatum')[2] == "1950" ) selected @endif>1950</option>
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
                                value="{{ old('straat') }}"
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
                                value="{{ old('nummer') }}"
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
                                value="{{ old('bus') }}"
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
                                value="{{ old('postcode') }}"
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
                            <label for="plaats" class="form__label form__label--required">Plaats</label>

                            <input
                                type="text"
                                id="plaats"
                                name="plaats"
                                value="{{ old('plaats') }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('plaats'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('plaats') }}
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
                                value="{{ old('land') }}"
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
                        class="form__textarea form__input--full-width">{{ old('medisch') }}</textarea>

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
                            @if( old('beeldmateriaal') === "on" ) checked @endif>

                        <label for="beeldmateriaal" class="form__label">
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
                <div class="row small-gutters">
                    {{-- Voornaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_1_voornaam" class="form__label form__label--required">Voornaam</label>

                            <input
                                type="text"
                                id="voogd_1_voornaam"
                                name="voogd_1_voornaam"
                                value="{{ old('voogd_1_voornaam') }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd_1_voornaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_voornaam') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Achternaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_1_achternaam" class="form__label form__label--required">Achternaam</label>

                            <input
                                type="text"
                                id="voogd_1_achternaam"
                                name="voogd_1_achternaam"
                                value="{{ old('voogd_1_achternaam') }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd_1_achternaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_achternaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Email --}}
                {{-- Telefoon nummer --}}
                <div class="row small-gutters">
                    {{-- Email --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_1_email" class="form__label form__label--required">Email</label>

                            <input
                                type="email"
                                id="voogd_1_email"
                                name="voogd_1_email"
                                value="{{ old('voogd_1_email') }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd_1_email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_email') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Telefoon nummer --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_1_telefoon" class="form__label form__label--required">Telefoon nummer</label>

                            <input
                                type="tel"
                                id="voogd_1_telefoon"
                                name="voogd_1_telefoon"
                                value="{{ old('voogd_1_telefoon') }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('voogd_1_telefoon'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_telefoon') }}
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
                            <label for="voogd_1_straat" class="form__label">Straat</label>

                            <input
                                type="text"
                                id="voogd_1_straat"
                                name="voogd_1_straat"
                                value="{{ old('voogd_1_straat') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_1_straat'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_straat') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Nummer --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd_1_nummer" class="form__label">Nummer</label>

                            <input
                                type="text"
                                id="voogd_1_nummer"
                                name="voogd_1_nummer"
                                value="{{ old('voogd_1_nummer') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_1_nummer'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_nummer') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Bus --}}
                    <div class="col-12 col-md-2">
                        <section class="form__section">
                            <label for="voogd_1_bus" class="form__label">Bus</label>

                            <input
                                type="text"
                                id="voogd_1_bus"
                                name="voogd_1_bus"
                                value="{{ old('voogd_1_bus') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_1_bus'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_bus') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Postcode --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd_1_postcode" class="form__label">Postcode</label>

                            <input
                                type="text"
                                id="voogd_1_postcode"
                                name="voogd_1_postcode"
                                value="{{ old('voogd_1_postcode') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_1_postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Plaats --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_1_plaats" class="form__label">Plaats</label>

                            <input
                                type="text"
                                id="voogd_1_plaats"
                                name="voogd_1_plaats"
                                value="{{ old('voogd_1_plaats') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_1_plaats'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_plaats') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Land --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section form__section--last">
                            <label for="voogd_1_land" class="form__label">Land</label>

                            <input
                                type="text"
                                id="voogd_1_land"
                                name="voogd_1_land"
                                value="{{ old('voogd_1_land') }}"
                                list="landen"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_1_land'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_1_land') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <h2>Ouder / Voogd 2</h2>

                <h4>Algemene info</h4>
                {{-- Voornaam --}}
                {{-- Achternaam --}}
                <div class="row small-gutters">
                    {{-- Voornaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_2_voornaam" class="form__label">Voornaam</label>

                            <input
                                type="text"
                                id="voogd_2_voornaam"
                                name="voogd_2_voornaam"
                                value="{{ old('voogd_2_voornaam') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_voornaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_voornaam') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Achternaam --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_2_achternaam" class="form__label">Achternaam</label>

                            <input
                                type="text"
                                id="voogd_2_achternaam"
                                name="voogd_2_achternaam"
                                value="{{ old('voogd_2_achternaam') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_achternaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_achternaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Email --}}
                {{-- Telefoon nummer --}}
                <div class="row small-gutters">
                    {{-- Email --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_2_email" class="form__label">Email</label>

                            <input
                                type="email"
                                id="voogd_2_email"
                                name="voogd_2_email"
                                value="{{ old('voogd_2_email') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_email') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Telefoon nummer --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_2_telefoon" class="form__label">Telefoon nummer</label>

                            <input
                                type="tel"
                                id="voogd_2_telefoon"
                                name="voogd_2_telefoon"
                                value="{{ old('voogd_2_telefoon') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_telefoon'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_telefoon') }}
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
                            <label for="voogd_2_straat" class="form__label">Straat</label>

                            <input
                                type="text"
                                id="voogd_2_straat"
                                name="voogd_2_straat"
                                value="{{ old('voogd_2_straat') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_straat'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_straat') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Nummer --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd_2_nummer" class="form__label">Nummer</label>

                            <input
                                type="text"
                                id="voogd_2_nummer"
                                name="voogd_2_nummer"
                                value="{{ old('voogd_2_nummer') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_nummer'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_nummer') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Bus --}}
                    <div class="col-12 col-md-2">
                        <section class="form__section">
                            <label for="voogd_2_bus" class="form__label">Bus</label>

                            <input
                                type="text"
                                id="voogd_2_bus"
                                name="voogd_2_bus"
                                value="{{ old('voogd_2_bus') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_bus'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_bus') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Postcode --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd_2_postcode" class="form__label">Postcode</label>

                            <input
                                type="text"
                                id="voogd_2_postcode"
                                name="voogd_2_postcode"
                                value="{{ old('voogd_2_postcode') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_postcode'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_postcode') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Plaats --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="voogd_2_plaats" class="form__label">Plaats</label>

                            <input
                                type="text"
                                id="voogd_2_plaats"
                                name="voogd_2_plaats"
                                value="{{ old('voogd_2_plaats') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_plaats'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_plaats') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Land --}}
                    <div class="col-12 col-md-3">
                        <section class="form__section">
                            <label for="voogd_2_land" class="form__label">Land</label>

                            <input
                                type="text"
                                id="voogd_2_land"
                                name="voogd_2_land"
                                value="{{ old('voogd_2_land') }}"
                                list="landen"
                                class="form__input form__input--full-width">

                            @if ($errors->has('voogd_2_land'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voogd_2_land') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- ReCAPTCHA --}}
                <section class="form__section form__section--last">
                    <div class="g-recaptcha" data-sitekey="6LfqfeoUAAAAADUtJuiXGbAnaBjrjsCFF984zJe9" data-callback="correctCaptcha"></div>

                    @if (session('inschrijving_error_captcha'))
                        <span class="form__section-feedback">
                            Gelieve aan te geven dat u geen robot bent.
                        </span>
                    @endif
                </section>

                <div class="wrapper__btn">
                    <button class="btn btn--primary recaptchaDisable">Verzend</button>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-5 section">
            @component('components.meer_info_el_leiding', [
                'el_leiding' => $el_leiding,
            ])
            @endcomponent
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