@extends('layouts.app')

@section('title', 'Admin console')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
            'size' => 'small',
        ],
        'page_title' => 'Profiel aanpassen',
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'childs' => [
                    (object)[
                        'link' => '/profile',
                        'name' => 'Profiel',
                    ]
                ],
                'current' => 'Profiel aanpassen',
            ])@endcomponent  
        </div>

        <div class="col-12 col-md-8 section">
            <h3>Je gegevens</h3>

            <form class="form" action="{{ route('profile.edit.post') }}" method="POST">
                @csrf

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
                                class="form__input form__input--full-width"
                                value="{{ old('voornaam', $user->identity->voornaam) }}"
                                required
                                autofocus>
        
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
                                value="{{ old('achternaam', $user->identity->achternaam) }}"
                                required>
        
                            @if ($errors->has('achternaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('achternaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Voortotem --}}
                {{-- Totem --}}
                {{-- Welpennaam --}}
                <div class="row small-gutters">
                    {{-- Voortotem --}}
                    <div class="col-12 col-md-4">
                        <section class="form__section">
                            <label for="voortotem" class="form__label">Voortotem</label>
        
                            <input
                                type="text"
                                id="voortotem"
                                name="voortotem"
                                class="form__input form__input--full-width"
                                value="{{ old('voortotem', $user->identity->voortotem) }}">
        
                            @if ($errors->has('voortotem'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('voortotem') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Totem --}}
                    <div class="col-12 col-md-4">
                        <section class="form__section">
                            <label for="totem" class="form__label">Totem</label>
        
                            <input
                                type="text"
                                id="totem"
                                name="totem"
                                class="form__input form__input--full-width"
                                value="{{ old('totem', $user->identity->totem) }}">
        
                            @if ($errors->has('totem'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('totem') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Welpennaam --}}
                    <div class="col-12 col-md-4">
                        <section class="form__section">
                            <label for="welpennaam" class="form__label">Welpennaam</label>
        
                            <input
                                type="text"
                                id="welpennaam"
                                name="welpennaam"
                                class="form__input form__input--full-width"
                                value="{{ old('welpennaam', $user->identity->welpennaam) }}">
        
                            @if ($errors->has('welpennaam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('welpennaam') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Inlog email --}}
                {{-- Publieke email --}}
                <div class="row small-gutters">
                    {{-- Inlog email --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="user_email" class="form__label form__label--required">Inlog email</label>
        
                            <input
                                type="text"
                                id="user_email"
                                name="user_email"
                                class="form__input form__input--full-width"
                                value="{{ old('user_email', $user->email) }}"
                                required
                                autofocus>
        
                            @if ($errors->has('user_email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('user_email') }}
                                </span>
                            @endif

                            <p class="form__helper-text">
                                Je inlog emailadres is het email adres waarmee je inlogd. Dit is voor jou en voor jou alleen.
                            </p>
                        </section>
                    </div>

                    {{-- Publieke email --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="email" class="form__label form__label--required">Publieke email</label>
        
                            <input
                                type="text"
                                id="email"
                                name="email"
                                class="form__input form__input--full-width"
                                value="{{ old('email', $user->identity->email) }}"
                                required>
        
                            @if ($errors->has('email'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif

                            <p class="form__helper-text">
                                Je publiek emailadres is het email adres waar andere mensen jou kunnen bereiken.
                            </p>
                        </section>
                    </div>
                </div>

                {{-- Geslacht --}}
                {{-- Telefoon --}}
                <div class="row small-gutters">
                    {{-- Geslacht --}}
                    <div class="col-12 col-md-4">
                        <section class="form__section">
                            <label for="geslacht" class="form__label">Geslacht</label>

                            <select
                                id="geslacht"
                                name="geslacht"
                                class="form__select form__select--full-width">
                                @foreach(config('identity.genders') as $gender)
                                    <option
                                        value="{{ $gender }}"
                                        @if (old('geslacht', null) !== null)
                                            @if (old('geslacht') == $gender)
                                                selected
                                            @endif
                                        @elseif ($user->identity->geslacht == $gender)
                                            selected
                                        @endif
                                    >
                                        {{ __('identity.'.$gender) }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('geslacht'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('geslacht') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Telefoon --}}
                    <div class="col-12 col-md-8">
                        <section class="form__section form__section--last">
                            <label for="telefoon" class="form__label form__label--required">Telefoon</label>
        
                            <input
                                type="text"
                                id="telefoon"
                                name="telefoon"
                                class="form__input form__input--full-width"
                                value="{{ old('telefoon', $user->identity->telefoon) }}"
                                required>
        
                            @if ($errors->has('telefoon'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('telefoon') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Pas aan</button>
                    <a href="{{ route('profile') }}" class="btn btn--tertiary">Annuleer</a>
                </div>
            </form>
        </div>
    </div>
@endsection