@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Activiteit',
        'page_sub_title' => 'toevoegen',
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
                        'link' => '/admin/evenementen',
                        'name' => 'Evenementen',
                    ],
                ],
                'current' => 'Evenement toevoegen',
            ])@endcomponent
        </div>

        <div class="col-12 section section--extra-small-spacing">
            <h2>Evenement toevoegen</h2>
        </div>

        <div class="col-12 section">
            <form class="form" action="/admin/evenementen/add" method="POST">
                @csrf

                {{-- Naam --}}
                <section class="form__section">
                    <label for="naam" class="form__label form__label--required">Naam</label>

                    <input
                        type="text"
                        id="naam"
                        name="naam"
                        class="form__input form__input--full-width"
                        value="{{ old('naam') }}"
                        required
                        autofocus>

                    @if ($errors->has('naam'))
                        <span class="form__section-feedback">
                            {{ $errors->first('naam') }}
                        </span>
                    @endif
                </section>

                {{-- Locatie --}}
                {{-- Prijs --}}
                <div class="row">
                    {{-- Locatie --}}
                    <div class="col-12 col-md-9 col-lg-10">
                        <section class="form__section">
                            <label for="locatie" class="form__label form__label--required">Locatie</label>

                            <input
                                type="text"
                                id="locatie"
                                name="locatie"
                                class="form__input form__input--full-width"
                                value="{{ old('locatie', 'Lokaal') }}"
                                required>

                            @if ($errors->has('locatie'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('locatie') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Prijs --}}
                    <div class="col-4 col-md-3 col-lg-2">
                        <section class="form__section">
                            <label for="prijs" class="form__label form__label--required">Prijs</label>

                            <div class="form__input-group">
                                <div class="form__input-group-before">
                                    €
                                </div>

                                <input
                                    type="number"
                                    id="prijs"
                                    name="prijs"
                                    class="form__input"
                                    value="{{ old('prijs', '0') }}"
                                    min="0"
                                    required>
                            </div>

                            @if ($errors->has('prijs'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('prijs') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Snelle info --}}
                {{-- URL --}}
                {{-- Has static page? --}}
                <div class="row">
                    {{-- Snelle info --}}
                    <div class="col-12 col-md-8">
                        <section class="form__section">
                            <label for="snelle_info" class="form__label form__label--required">Snelle info</label>

                            <textarea
                                id="snelle_info"
                                name="snelle_info"
                                class="form__textarea form__input--full-width"
                                required>{{ old('snelle_info') }}</textarea>

                            @if ($errors->has('snelle_info'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('snelle_info') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- URL --}}
                    {{-- Has static page? --}}
                    <div class="col-12 col-md-4">
                        {{-- URL --}}
                        <section class="form__section form__section--small-margin-bottom">
                            <label for="url" class="form__label form__label--required">URL</label>

                            <input
                                type="text"
                                id="url"
                                name="url"
                                class="form__input form__input--full-width"
                                value="{{ old('url') }}"
                                required>

                            @if ($errors->has('url'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('url') }}
                                </span>
                            @endif

                            <span class="form__section-feedback url-already-taken" style="display: none;">
                                Deze URL is al genomen.
                            </span>
                        </section>

                        {{-- Has static page? --}}
                        <section class="form__section">
                            <input
                                type="checkbox"
                                id="has_static_page"
                                name="has_static_page"
                                class="form__checkbox">

                            <label for="has_static_page" class="form__label form__label--inline">
                                Wordt deze pagina gemaakt door Paco?
                            </label>
                        </section>
                    </div>
                </div>

                {{-- Start datum --}}
                {{-- Eind datum --}}
                <div class="row">
                    {{-- Start datum --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="start" class="form__label form__label--required">Start</label>

                            <input
                                type="datetime-local"
                                id="start"
                                name="start"
                                class="form__input form__input--full-width"
                                value="{{ old('start') }}"
                                required>

                            @if ($errors->has('start'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('start') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    {{-- Eind datum --}}
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="eind" class="form__label form__label--required">Eind</label>

                            <input
                                type="datetime-local"
                                id="eind"
                                name="eind"
                                class="form__input form__input--full-width"
                                value="{{ old('eind') }}"
                                required>

                            @if ($errors->has('eind'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('eind') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <div class="static-page-section">
                    {{-- Page --}}
                    <section class="form__section">
                        <label for="page_content" class="form__label">De pagina</label>

                        <textarea
                            id="page_content"
                            name="page_content"
                            class="form__textarea form__input--full-width tinymce">{{ old('page_content') }}</textarea>

                        @if ($errors->has('page_content'))
                            <span class="form__section-feedback">
                                {{ $errors->first('page_content') }}
                            </span>
                        @endif
                    </section>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Voeg toe</button>
                    <a href="{{ isset($tak) ? url('/admin/activiteiten/' . strtolower($tak->naam)) : url()->previous() }}" class="btn btn--error">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        var $naam = $("#naam"),
            $url = $("#url"),
            $hasStaticPage = $('#has_static_page'),
            $urlFeedback = $('.url-already-taken'),
            $staticPageSection = $('.static-page-section');

        // Hide page section with a static page
        (function($){
            $hasStaticPage.on('change', function() {
                $staticPageSection.toggle(300);
            });
        })(jQuery);

        // Set URL and check for used ones
        var urlIsChanged = false,
            urls = @json($urls);

        (function($){
            $url.on('input', function() {
                urlIsChanged = true;
                $url.val(prepareUrl($url.val()));
                checkForUsedUrl();
            });
            $naam.on('input', function() {
                if (!urlIsChanged) $url.val(prepareUrl($naam.val()));
                checkForUsedUrl();
            });
        })(jQuery);

        function checkForUsedUrl() {
            var input = $url.val();
            if (urls.includes(input)) $urlFeedback.show(300);
            else $urlFeedback.hide(300);
            console.log('bar');
        }

        function prepareUrl(url) {
            return url.toLowerCase().replace(/\s/g, '-').replace(/\s/g, '-').replace(/[^A-Za-z0-9-]/g, '');
        }

        // TinyMCE
        initTinymce();
        function initTinymce() {
            tinymce.init({
                selector: '.tinymce',
                menubar: false,
                plugins: "link",
                link_assume_external_targets: true,
                link_class_list: [
                    {title: 'None', value: ''},
                    {title: 'Button Primary', value: 'btn btn--primary'},
                    {title: 'Button Secondary', value: 'btn btn--secondary'},
                    {title: 'Button Teriary', value: 'btn btn--tertiary'},
                ],
                toolbar: 'undo redo | removeformat | formatselect | bold italic underline link | forecolor backcolor | alignleft aligncenter alignright |'
            });
        }
    </script>
@endsection
