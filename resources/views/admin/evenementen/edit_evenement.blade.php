@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => $evenement->naam,
        'page_sub_title' => 'aanpassen',
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
                'current' => 'Evenement aanpassen',
            ])@endcomponent
        </div>

        <div class="col-12 section section--extra-small-spacing">
            <h2>Evenement</h2>

            @if (session('edit_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Probeer nog eens. Als dit zich blijft gebeuren, neem screenshots en stuur door naar Paco, hij is jouw vriend!
                @endcomponent
            @endif

            <form class="form" action="/admin/evenementen/edit" method="POST">
                @csrf

                {{-- ID --}}
                <input
                    type="text"
                    name="id"
                    value="{{ Crypt::encrypt($evenement->id) }}"
                    hidden>

                {{-- Naam --}}
                <section class="form__section">
                    <label for="naam" class="form__label form__label--required">Naam</label>

                    <input
                        type="text"
                        id="naam"
                        name="naam"
                        class="form__input form__input--full-width"
                        value="{{ old('naam', $evenement->naam) }}"
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
                                value="{{ old('locatie', $evenement->locatie) }}"
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
                                    value="{{ old('prijs', $evenement->prijs) }}"
                                    min="0"
                                    max="999"
                                    step="0.1"
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
                                required>{{ old('snelle_info', $evenement->snelle_info) }}</textarea>

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
                                value="{{ old('url', $evenement->url) }}"
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
                                class="form__checkbox"
                                @if (old('has_static_page', null) !== null)
                                    @if (old('has_static_page') === 'on')) checked @endif
                                @elseif ($evenement->has_static_page == 1)
                                    checked
                                @endif>

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
                                value="{{ old('start', $evenement->start_datum.'T'.$evenement->start_uur) }}"
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
                                value="{{ old('eind', $evenement->eind_datum.'T'.$evenement->eind_uur) }}"
                                required>

                            @if ($errors->has('eind'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('eind') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                {{-- Takken --}}
                <h5>Betrokken takken</h5>

                <div class="row small-gutters">
                    @foreach($takken as $tak)
                        <div class="col-">
                            <section class="form__section">
                                <input
                                    type="checkbox"
                                    id="tak_{{ $tak->link }}"
                                    name="tak[]"
                                    class="form__checkbox"
                                    value="{{ $tak->id }}"
                                    hidden
                                    @if(in_array($tak->id, $evenement->evenement_tak_ids))
                                        checked
                                    @endif>

                                <label for="tak_{{ $tak->link }}" class="form__label form__label--tag">
                                    {{ $tak->naam }}
                                </label>
                            </section>
                        </div>
                    @endforeach
                </div>

                {{-- Banner --}}
                {{-- Page --}}
                <div class="static-page-section">
                    <h5>Banner</h5>
                    {{-- Banner --}}
                    <div class="row">
                        {{-- Kleur --}}
                        <div class="col-12 col-md-4">
                            <section class="form__section">
                                <label for="banner_color" class="form__label">Kleur</label>

                                <select
                                    id="banner_color"
                                    name="banner_color"
                                    class="form__select form__select--full-width">
                                    @foreach(config('banner.colors') as $color)
                                        <option
                                            value="{{ $color }}"
                                            @if (old('banner_color', null) !== null)
                                                @if (old('banner_color') == $color)
                                                    selected
                                                @endif
                                            @elseif ($evenement->kleur == $color)
                                                selected
                                            @endif
                                        >
                                            {{ str_replace('-', ' ', ucwords($color)) }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('page_content'))
                                    <span class="form__section-feedback">
                                        {{ $errors->first('page_content') }}
                                    </span>
                                @endif
                            </section>
                        </div>

                        {{-- Patroon --}}
                        <div class="col-12 col-md-4">
                            <section class="form__section">
                                <label for="banner_pattern" class="form__label">Patroon</label>

                                <select
                                    id="banner_pattern"
                                    name="banner_pattern"
                                    class="form__select form__select--full-width">
                                    @foreach(config('banner.patterns') as $pattern)
                                        <option
                                            value="{{ $pattern }}"
                                            @if (old('banner_pattern', null) !== null)
                                                @if (old('banner_pattern') == $pattern)
                                                    selected
                                                @endif
                                            @elseif ($evenement->banner_patroon == $pattern)
                                                selected
                                            @endif
                                        >
                                            {{ $pattern }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('page_content'))
                                    <span class="form__section-feedback">
                                        {{ $errors->first('page_content') }}
                                    </span>
                                @endif
                            </section>
                        </div>

                        {{-- Patroon --}}
                        <div class="col-12 col-md-4">
                            <section class="form__section">
                                <label for="banner_strenght" class="form__label">Patroon</label>

                                <select
                                    id="banner_strenght"
                                    name="banner_strenght"
                                    class="form__select form__select--full-width">
                                    @foreach(config('banner.strenght') as $strenght)
                                        <option
                                            value="{{ $strenght }}"
                                            @if (old('banner_strenght', null) !== null)
                                                @if (old('banner_strenght') == $pattern)
                                                    selected
                                                @endif
                                            @elseif ($evenement->banner_sterkte == $strenght)
                                                selected
                                            @endif
                                        >
                                            {{ ucwords($strenght) }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('page_content'))
                                    <span class="form__section-feedback">
                                        {{ $errors->first('page_content') }}
                                    </span>
                                @endif
                            </section>
                        </div>
                    </div>

                    {{-- Page --}}
                    <section class="form__section">
                        <label for="page_content" class="form__label">De pagina</label>

                        <textarea
                            id="page_content"
                            name="page_content"
                            class="form__textarea form__input--full-width tinymce">{{ old('page_content', $evenement->omschrijving) }}</textarea>

                        @if ($errors->has('page_content'))
                            <span class="form__section-feedback">
                                {{ $errors->first('page_content') }}
                            </span>
                        @endif
                    </section>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Pas aan</button>
                    <a href="{{ url('/admin/evenementen/') }}" class="btn btn--error">Cancel</a>
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
            $hasStaticPage.on('change', toggleStaticPageSection);
            toggleStaticPageSection();
        })(jQuery);

        function toggleStaticPageSection() {
            if ($hasStaticPage.prop('checked')) $staticPageSection.hide(300);
            else $staticPageSection.show(300);
        }

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
