@extends('layouts.app')

@section('title')
    Wachtwoord vergeten?
@endsection

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
                {{ __('auth.forgot_password') }}?
            </h3>

            <p>
                {{ __('auth.enter_your_email') }} 
            </p>

            <form method="POST" action="{{ route('password.email') }}" class="form">
                @csrf

                @if (session('status'))
                    @component('components.flash_message', [
                        'type' => 'success',
                    ])
                        {{ session('status') }}
                    @endcomponent
                @endif

                <div class="form__section form__section--margin-top">
                    <label for="email" class="form__label form__label--required">{{ __('global.email') }}</label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ $email ?? old('email') }}"
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form__input form__input--full-width"
                        required
                        autofocus>

                    @if ($errors->has('email'))
                        <span class="form__section-feedback">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="wrapper--btn">
                    <button type="submit" class="btn btn--primary">
                        {{ __('auth.mail_new_password') }}
                    </button>
                </div>

                <p class="form__extra">
                    <span class="form__extra--required">*</span> {{ __('auth.field_is_required') }}
                </p>
            </form>
        </div>
    </div>
@endsection
