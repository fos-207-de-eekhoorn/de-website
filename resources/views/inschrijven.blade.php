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
            <h3>Heeft u een vraag?</h3>

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

                {{-- Naam --}}
                <section class="form__section">
                    <label for="voornaam" class="form__label form__label--required">Naam</label>

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
        $('.recaptchaDisable').prop('disabled', true).prop('title', 'Gelieve aan te geven dat u geen robot bent');

        function correctCaptcha() {
            $('.recaptchaDisable').prop('disabled', false).prop('title', '');
        }
    </script>
@endsection