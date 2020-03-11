@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 card">
            <div class="card__inner cs-white">
                <h3 class="card__title">
                    {{ __('auth.forgot_password') }}?
                </h3>

                <div class="card__content">
                    <p>
                        {{ __('auth.enter_your_email') }} 
                    </p>

                    <form method="POST" action="{{ route('password.email') }}" class="form">
                        @csrf

                        @if (session('status'))
                            <div class="form__feedback form__feedback--success">
                                <p>
                                    <span class="fa--before"><i class="fas fa-check"></i></span>{{ session('status') }}
                                </p>
                            </div>
                        @endif

                        <div class="form__section form__section--margin-top form__section--last">
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

                        <button type="submit" class="btn btn-primary">
                            {{ __('auth.mail_new_password') }}
                        </button>

                        <p class="form__extra">
                            <span class="form__extra--required">*</span> {{ __('auth.field_is_required') }}
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
