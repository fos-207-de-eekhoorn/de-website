@extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green-dark',
            'pattern' => '4',
            'strength' => 'dark',
        ],
        'page_title' => 'Reset wachtwoord',
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h3>
                {{ __('auth.set_new_password') }}
            </h3>

            <form method="POST" action="{{ route('password.update') }}" class="form section">
                @csrf
                <p class="info info--thirth-width info--no-label">
                    <span class="info__data">
                       {{ __('auth.fill_in_password') }} 
                    </span>
                </p>

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <p class="info info--thirth-width">
                    <label for="email" class="info__label info__label--right">{{ __('global.email') }}</label>

                    <span class="info__data">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form__input form__input--full-width" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </span>
                </p>

                {{-- Password --}}
                <p class="info info--thirth-width">
                    <label for="password" class="info__label info__label--right">{{ __('auth.new_password') }}</label>

                    <span class="info__data password-inside-feedback__parent">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form__input form__input--full-width" name="password" required>

                        <span id="password-strenght" class="password-inside-feedback">
                            <span class="password-inside-feedback__message password-inside-feedback__message--not-acceptedmore-information">
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--not-accepted">{{ __('auth.not_accepted') }}</span>
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--weak">{{ __('auth.weak') }}</span>
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--medium">{{ __('auth.medium') }}</span>
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--secure">{{ __('auth.secure') }}</span>
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--strong">{{ __('auth.very_strong') }}</span>
                            </span>
                        </span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </span>
                </p>

                <p id="password-feedback" class="info info--thirth-width info--no-label">
                    <span class="info__data password-feedback">
                        {{ __('global.password') }}:
                        <span id="passwordFeedbackMinLength" class="password-feedback__option js-passwordFeedback">
                            <span class="fa--before password-feedback__icon password-feedback__icon--active"><i class="fas fa-check"></i></span>{{ __('global.min_8_chars') }}
                        </span>
                    </span>
                </p>

                {{-- Confirm password --}}
                <p class="info info--thirth-width">
                    <label for="password-confirm" class="info__label info__label--right">{{ __('auth.confirm_new_password') }}</label>

                    <span class="info__data password-inside-feedback__parent">
                        <input id="password-confirm" type="password" class="form-control form__input form__input--full-width" name="password_confirmation" required disabled>

                        <span id="password-confirmation" class="password-inside-feedback">
                            <span class="password-inside-feedback__message password-inside-feedback__message--none">
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--denied"><i class="fas fa-times"></i></span>
                                <span class="password-inside-feedback__copy password-inside-feedback__copy--approved"><i class="fas fa-check"></i></span>
                            </span>
                        </span>
                    </span>
                </p>

                <p id="password-feedback-wrong" class="info info--thirth-width info--no-label">
                    <span class="info__data password-feedback">
                        <span id="passwordFeedbackConfirmWrong" class="password-feedback__option js-passwordFeedback password-feedback--wrong">
                            <span class="fa--before password-feedback__icon password-feedback__icon--wrong">
                                <i class="fas fa-times"></i> {{ __('global.password_doesnt_match') }}
                            </span>
                        </span>
                    </span>
                </p>

                {{-- Button --}}
                <div class="wrapper--btn">
                    <button id="checkSubmit" type="submit" class="btn btn--primary" disabled>
                        {{ __('auth.reset_password') }}
                    </button>
                </div>
            </form>

            <div class="card cs-yellow section">
                <div class="card__inner">
                    <h4 class="card__title">
                        {{ __('auth.a_strong_password') }}
                    </h4>

                    <div class="card__content">
                        <ul>
                            <li>{{ __('global.8_chars') }}</li>
                            <li>{{ __('global.one_capital') }}</li>
                            <li>{{ __('global.one_miniscule') }}</li>
                            <li>{{ __('global.one_number') }}</li>
                            <li>{{ __('global.one_special') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            var eInputPassword = document.getElementById('password'),
                eInputConfirm = document.getElementById('password-confirm'),
                ePasswordStrenght = $('#password-strenght').find(".password-inside-feedback__message"),
                ePasswordConfirm = $('#password-confirmation').find(".password-inside-feedback__message"),
                ePasswordHowTo = $('#password-confirmation'),
                eMinLength = document.getElementById('passwordFeedbackMinLength'),
                eLength = document.getElementById('passwordFeedbackLength'),
                eUppercase = document.getElementById('passwordFeedbackUppercase'),
                eLowercase = document.getElementById('passwordFeedbackLowercase'),
                eNumber = document.getElementById('passwordFeedbackNumber'),
                eSpecial = document.getElementById('passwordFeedbackSpecial'),
                ePassword = document.getElementById('passwordFeedbackPassword'),
                eConfirm = document.getElementById('passwordFeedbackConfirm'),
                eConfirmFeedback = document.getElementById('passwordFeedbackConfirmWrong'),
                eButton = document.getElementById('checkSubmit'),
                regUppercase = /^(?=.*[a-z]).+$/,
                regLowercase = /^(?=.*[A-Z]).+$/,
                regNumber = /^(?=.*\d).+$/,
                regSpecial = /^(?=.*(_|[^\w])).+$/;

            eInputPassword.oninput = inputUpdate;

            eInputConfirm.oninput = function() {
                var password = checkPasswordStrenght();
                var confirm = checkConfirmInput();
                checkDisabledFields(password, confirm);
            }

            function inputUpdate() {
                var password = checkPasswordStrenght();
                var confirm = checkConfirmInput();
                checkDisabledFields(password, confirm);
            }

            function checkDisabledFields(password, confirm) {
                if ( password && confirm ) {
                    eInputConfirm.disabled = false;
                    eButton.disabled = false;
                } else if ( password ) {
                    eInputConfirm.disabled = false;
                    eButton.disabled = true;
                } else {
                    eInputConfirm.disabled = true;
                    eButton.disabled = true;
                }
            }

            function checkPasswordStrenght() {
                var strenght = new Object();

                if ( passwordCheckMinLength(eInputPassword.value) ) {
                    eMinLength.classList.add("password-feedback--active");
                    strenght.minLength = true;
                } else {
                    eMinLength.classList.remove("password-feedback--active");
                    strenght.minLength = false;
                }
                if ( passwordCheckLength(eInputPassword.value) ) strenght.length = true;
                    else strenght.length = false;
                if ( passwordCheckUppercase(eInputPassword.value) ) strenght.uppercase = true;
                    else strenght.uppercase = false;
                if ( passwordCheckLowercase(eInputPassword.value) ) strenght.lowercase = true;
                    else strenght.lowercase = false;
                if ( passwordCheckNumber(eInputPassword.value) ) strenght.number = true;
                    else strenght.number = false;
                if ( passwordCheckSpecial(eInputPassword.value) ) strenght.special = true;
                    else strenght.special = false;

                if ( passwordCheckAll(eInputPassword.value) ) {
                    // ePassword.classList.add("password-feedback--active");
                    eInputPassword.classList.add("form__input--approved");
                    $('#password-feedback').fadeOut(300);
                } else {
                    // ePassword.classList.remove("password-feedback--active");
                    eInputPassword.classList.remove("form__input--approved");
                    $('#password-feedback').fadeIn(300);
                }

                if ( strenght.minLength ) {
                    switch ( security(strenght) ) {
                        case 1:
                        case 2:
                        case 3:
                            ePasswordStrenght.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--weak");
                            break;
                        case 4:
                            ePasswordStrenght.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--medium");
                            break;
                        case 5:
                            ePasswordStrenght.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--secure");
                            break;
                        case 6:
                            ePasswordStrenght.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--strong");
                            break;
                    }
                        
                    return true;
                } else {
                    ePasswordStrenght.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--not-accepted");
                    return false;
                }
            }

            {{--
            function checkPasswordInput() {
                if ( passwordCheckLength(eInputPassword.value) ) eLength.classList.add("password-feedback--active");
                    else eLength.classList.remove("password-feedback--active");
                if ( passwordCheckUppercase(eInputPassword.value) ) eUppercase.classList.add("password-feedback--active");
                    else eUppercase.classList.remove("password-feedback--active");
                if ( passwordCheckLowercase(eInputPassword.value) ) eLowercase.classList.add("password-feedback--active");
                    else eLowercase.classList.remove("password-feedback--active");
                if ( passwordCheckNumber(eInputPassword.value) ) eNumber.classList.add("password-feedback--active");
                    else eNumber.classList.remove("password-feedback--active");
                if ( passwordCheckSpecial(eInputPassword.value) ) eSpecial.classList.add("password-feedback--active");
                    else eSpecial.classList.remove("password-feedback--active");

                if ( passwordCheckAll(eInputPassword.value) ) {
                    ePassword.classList.add("password-feedback--active");
                    eInputPassword.classList.add("form__input--approved");
                    $('#password-feedback').fadeOut(300);
                    return true;
                } else {
                    ePassword.classList.remove("password-feedback--active");
                    eInputPassword.classList.remove("form__input--approved");
                    $('#password-feedback').fadeIn(300);
                    return false;
                }
            }
            --}}

            function checkConfirmInput() {
                if ( eInputConfirm.value === eInputPassword.value && passwordCheckAll(eInputConfirm.value) ) {
                    // eConfirm.classList.add("password-feedback--active");
                    // eConfirm.classList.remove("password-feedback--wrong");
                    ePasswordConfirm.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--approved");
                    // $('#passwordFeedbackConfirmWrong').fadeOut(300);
                    return true;
                } else if ( eInputConfirm.value !== eInputPassword.value && eInputConfirm.value.length >= eInputPassword.value.length && passwordCheckMinLength(eInputConfirm.value) ) {
                    // eConfirm.classList.remove("password-feedback--active");
                    // eConfirm.classList.add("password-feedback--wrong");
                    ePasswordConfirm.removeClass().addClass("password-inside-feedback__message password-inside-feedback__message--denied");
                    // $('#passwordFeedbackConfirmWrong').fadeIn(300);
                    return false;
                } else {
                    // eConfirm.classList.remove("password-feedback--active", "password-feedback--wrong");
                    ePasswordConfirm.removeClass("password-inside-feedback__message--approved password-inside-feedback__message--denied");
                    // $('#passwordFeedbackConfirmWrong').fadeOut(300);
                    return false;
                }
            }

            function passwordCheckMinLength(input) {
                var passwordLength = 8,
                output = ( passwordLength <= input.length );

                return output;
            }

            function passwordCheckLength(input) {
                var passwordLength = 9,
                output = ( passwordLength <= input.length );

                return output;
            }

            function passwordCheckUppercase(input) {
                var regUppercase = /^(?=.*[A-Z]).+$/;

                return regUppercase.test(input);
            }

            function passwordCheckLowercase(input) {
                var regLowercase = /^(?=.*[a-z]).+$/;

                return regLowercase.test(input);
            }

            function passwordCheckNumber(input) {
                var regNumber = /^(?=.*\d).+$/;

                return regNumber.test(input);
            }

            function passwordCheckSpecial(input) {
                var regSpecial = /^(?=.*(_|[^\w])).+$/;

                return regSpecial.test(input);
            }

            function passwordCheckAll(input) {
                var output = 
                    passwordCheckMinLength(input);
                    // passwordCheckLength(input) &&
                    // passwordCheckUppercase(input) &&
                    // passwordCheckLowercase(input) &&
                    // passwordCheckNumber(input) &&
                    // passwordCheckSpecial(input);

                return output;
            }

            function security(obj) {
                var size = 0;

                for (key in obj) {
                    if (obj[key]) size++;
                }

                return size;
            }
        })(jQuery);
    </script>

@endsection
