@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Contact',
    ])
    @endcomponent

    {{-- Contact formulier --}}
    {{-- EL & AEL --}}
    <div class="row section">
        <div class="col-12 col-lg-7">
            <h3>Heeft u een vraag?</h3>


            @if (session('contact_form_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    We hebben uw berichtje goed ontvangen.
                @endcomponent
            @endif

            <form class="form" action="/contact/zend-bericht" method="POST">
                @csrf

                {{-- Naam --}}
                <section class="form__section">
                    <label for="naam" class="form__label form__label--required">Naam</label>

                    <input
                        type="text"
                        id="naam"
                        name="naam"
                        class="form__input form__input--full-width"
                        required>

                    @if ($errors->has('naam'))
                        <span class="form__section-feedback">
                            {{ $errors->first('naam') }}
                        </span>
                    @endif
                </section>

                {{-- Email --}}
                <section class="form__section">
                    <label for="email" class="form__label form__label--required">Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form__input form__input--full-width"
                        required>

                    @if ($errors->has('email'))
                        <span class="form__section-feedback">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </section>

                {{-- Bericht --}}
                <section class="form__section">
                    <label for="bericht" class="form__label form__label--required">Bericht</label>

                    <textarea
                        id="bericht"
                        name="bericht"
                        class="form__textarea form__input--full-width"
                        required></textarea>

                    @if ($errors->has('bericht'))
                        <span class="form__section-feedback">
                            {{ $errors->first('bericht') }}
                        </span>
                    @endif
                </section>

                {{-- Actief? --}}
                <section class="form__section">
                    <div class="form__checkbox-wrapper">
                        <input
                            type="checkbox"
                            id="actief"
                            name="actief"
                            class="form__checkbox">

                        <label for="actief" class="form__label">
                            Bent u of uw kind al actief in onze scouts?
                        </label>
                    </div>

                    @if ($errors->has('actief'))
                        <span class="form__section-feedback">
                            {{ $errors->first('actief') }}
                        </span>
                    @endif
                </section>

                {{-- Naam van kind --}}
                {{-- Tak van kind --}}
                <div class="row">
                    <div class="col-12 col-md-8">
                        {{-- Naam van kind --}}
                        <section class="form__section">
                            <label for="kind_naam" class="form__label">Naam (van uw kind)</label>

                            <input
                                type="text"
                                id="kind_naam"
                                name="kind_naam"
                                class="form__input form__input--full-width">

                            @if ($errors->has('kind_naam'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('kind_naam') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    <div class="col-12 col-md-4">
                        {{-- Tak van kind --}}
                        <section class="form__section form__section--last">
                            <label for="kind_tak" class="form__label">Tak (van uw kind)</label>

                            <select
                                id="kind_tak"
                                name="kind_tak"
                                class="form__input form__input--full-width">
                                <option value=""></option>
                                @foreach($takken as $tak)
                                    <option value="{{ $tak->naam }}">{{ $tak->naam }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('kind_tak'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('kind_tak') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <button class="btn btn--primary">Verzend</button>
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
@endsection