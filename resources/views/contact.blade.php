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
        <div class="col-12 col-md-7">
            <h3>Heeft u een vraag?</h3>

            @if (session('success'))
                <div class="form__feedback form__feedback--success">
                    <p>
                        <span class="fa--before"><i class="fas fa-check"></i></span>{{ session('success') }}
                    </p>
                </div>
            @endif

            <form class="form" action="/contact/send-form" method="POST">
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
                <section class="form__section form__section--last">
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

                <button class="btn btn--primary">Verzend</button>
            </form>
        </div>

        <div class="col-12 col-md-5">
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