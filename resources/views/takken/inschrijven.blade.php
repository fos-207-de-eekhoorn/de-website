@extends('layouts.app')

@section('title', 'Inschrijven voor '.$activiteit->tak->naam)

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Inschrijven',
        'page_sub_title' => $activiteit->tak->naam,
    ])
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 activities">
            <div class="row">
                <div class="col-12">
                    @if (session('error'))
                        @component('components.flash_message', [
                            'type' => 'error',
                        ])
                            Er is iets fout gelopen. Als dit blijft gebeuren, gelieve een mailtje te sturen naar de takleid(st)er.
                        @endcomponent
                    @endif

                    <h2>De activiteit van {{ Carbon\Carbon::parse($activiteit->datum)->format('j F y') }}</h2>
                </div>

                <div class="col-12 col-md-6">
                    <p class="activities__omschrijving">
                        {{ $activiteit->omschrijving }}

                        @if ($activiteit->start_uur != '14:00:00' || $activiteit->eind_uur != '17:00:00')
                            <span class="activities__detail">
                                <b>Tijdstip:</b> {{ Carbon\Carbon::parse($activiteit->start_uur)->format('H\ui') }} - {{ Carbon\Carbon::parse($activiteit->eind_uur)->format('H\ui') }}
                            </span>
                        @endif

                        @if (0 < $activiteit->prijs)
                            <span class="activities__detail">
                                <b>Prijs:</b> {{ $activiteit->prijs }}
                            </span>
                        @endif

                        @if ($activiteit->locatie != 'Lokaal')
                            <span class="activities__detail">
                                <b>Locatie:</b> {{ $activiteit->locatie }}
                            </span>
                        @endif
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <form id="inschrijving-form" class="form" action="{{ route('takken.inschrijven.post') }}" method="POST">
                        @csrf

                        <input
                            type="text"
                            name="activiteit_id"
                            value="{{ Crypt::encrypt($activiteit->id) }}"
                            required
                            hidden>
                        {{-- Voornaam --}}
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

                        {{-- Achternaam --}}
                        <section class="form__section form__section--last">
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

                        <div class="wrapper__btn">
                            <button class="btn btn--primary">Verzend</button>
                            <a href="{{ route('takken.details', ['tak' => $activiteit->tak->slug]) }}" class="btn btn--tertiary">Ga terug naar activiteiten</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection