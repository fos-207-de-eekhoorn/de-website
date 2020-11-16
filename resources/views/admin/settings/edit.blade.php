@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Instellingen',
        'page_sub_title' => $setting->key,
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'childs' => [
                    (object)[
                        'link' => '/admin',
                        'name' => 'Admin',
                    ],
                    (object)[
                        'link' => '/admin/settings',
                        'name' => 'Instellingen',
                    ],
                ],
                'current' => $setting->key,
            ])@endcomponent    
        </div>

        <div class="col-12 section">
            <h2>Instelling</h2>

            <h4>key: {{ $setting->key }}</h4>

            @if (session('error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Neem screenshots en stuur door naar Paco, hij is jouw vriend!
                @endcomponent
            @endif

            <form class="form" action="/admin/settings/edit" method="POST">
                @csrf

                {{-- ID --}}
                <input
                    type="text"
                    name="id"
                    value="{{ Crypt::encrypt($setting->id) }}"
                    hidden>

                @if ($errors->has('id'))
                    <span class="form__section-feedback">
                        {{ $errors->first('id') }}
                    </span>
                @endif

                {{-- Value --}}
                <section class="form__section">
                    <label for="value" class="form__label form__label--required">Value</label>

                    @if (sizeof($setting->setting_options) > 0)
                        <select
                            id="value"
                            name="value"
                            class="form__select form__select--full-width"
                            required>
                            @foreach($setting->setting_options as $option)
                                <option value="{{ $option->value }}" @if($setting->value === $option->value) selected @endif>{{ $option->value }}</option>
                            @endforeach
                        </select>
                    @else
                        <input
                            type="text"
                            id="value"
                            name="value"
                            class="form__input form__input--full-width"
                            value="{{ $setting->value }}"
                            required
                            autofocus>
                    @endif

                    @if ($errors->has('value'))
                        <span class="form__section-feedback">
                            {{ $errors->first('value') }}
                        </span>
                    @endif
                </section>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Pas instelling aan</button>
                    <a href="{{ url('/admin/settings') }}" class="btn btn--tertiary">Ga terug</a>
                </div>
            </form>
        </div>
    </div>
@endsection