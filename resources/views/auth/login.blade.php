@extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Login',
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h3>
                {{ __('global.log_in') }}
            </h3>

            @if (session('broken_link'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    {{ session('broken_link') }}
                @endcomponent
            @endif

            @if (session('flash_message_important'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    {{ session('flash_message_important') }}
                @endcomponent
            @endif

            @if (session('status'))
                @component('components.flash_message', [
                    'type' => 'info',
                ])
                    {{ session('status') }}
                @endcomponent
            @endif

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf

                <p class="info info--thirth-width">
                    <label for="email" class="info__label info__label--right">{{ __('global.email') }}</label>
                    
                    <span class="info__data">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form__input form__input--full-width" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </span>
                </p>

                <p class="info info--thirth-width">
                    <label for="password" class="info__label info__label--right">{{ __('global.password') }}</label>
                    
                    <span class="info__data">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form__input form__input--full-width" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </span>
                </p>
                <p class="info info--thirth-width info--no-label">
                    <span class="info__data">
                        <button type="submit" class="btn btn--primary">
                            {{ __('global.log_in') }}
                        </button>

                        <a class="btn btn--tertiary" href="{{ route('password.request') }}">
                            {{ __('global.forgot_password') }}
                        </a>
                    </span>
                </p>
            </form>
        </div>
    </div>
@endsection
