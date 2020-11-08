@extends('layouts.main')

@section('content')

    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Blog',
        'page_sub_title' => 'Post aanpassen',
    ])
    @endcomponent

    @component('components.breadcrumbs', [
        'childs' => [
            (object)[
                'link' => '/admin',
                'name' => 'Admin',
            ],
            (object)[
                'link' => '/admin/blog',
                'name' => 'Blog',
            ],
            (object)[
                'link' => '/admin/blog/posts',
                'name' => 'Posts',
            ],
        ],
        'current' => 'Post aanpassen',
    ])@endcomponent

    <div class="row justify-content-center section">
        <div class="col-12">
            <form method="POST" action="{{ url('/admin/blog/posts/edit') }}" id="edit-form" class="form checkIfChanged" enctype="multipart/form-data">
                @csrf

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        @component('components.flash_message', [
                            'type' => 'error',
                        ])
                            {{ $error }}
                        @endcomponent
                    @endforeach
                @endif

                <input
                    type="text"
                    name="id"
                    value="{{ Crypt::encrypt($post->id) }}"
                    hidden>


                @if (session('success'))
                    @component('components.flash_message', [
                        'type' => 'success',
                    ])
                        Je post is aangepast.
                    @endcomponent
                @endif
                @if (session('error'))
                    @component('components.flash_message', [
                        'type' => 'error',
                    ])
                        Er is iets fout gegaan. Neem screenshots indien mogelijk en stuur het naar Paco, hij is je vriend.
                    @endcomponent
                @endif

                <div class="row">
                    {{-- Content blocks --}}
                    {{-- ============================================ --}}
                    <div class="col-12 col-md-8">
                        <h3>Content</h3>

                        <div class="input-blog-block input-blog-block--add">
                            <div class="wrapper__btn wrapper__btn--centered">
                                <a class="btn btn--secondary link--cursor" onclick="$(this).parent().next('.existingBlocks').slideToggle(300)">Voeg bestaande blok toe</a>
                                <a class="btn btn--secondary link--cursor" onclick="addNewContentBlock($(this))">Voeg nieuwe blok toe</a>
                            </div>

                            <ul class="list--no-ui text--align-center existingBlocks medium-margin-top" style="display: none">
                                @foreach($blocks as $add_block)
                                    <li>
                                        <a data-i-block="{{ $loop->index }}" class="link--cursor" onclick="addExistingContentBlock($(this))">{{ $add_block->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        @foreach($post->blocks as $key => $block)
                            <div class="input-blog-block {{ $block->used_multiple_times ? 'cs-dark' : '' }}">
                                <input
                                    type="text"
                                    name="blocks[{{ $key }}][id]"
                                    value="{{ $block->id }}"
                                    hidden>
                                <input
                                    type="text"
                                    name="blocks[{{ $key }}][type]"
                                    class="changeType"
                                    value="linked"
                                    hidden>
                                <input
                                    type="text"
                                    name="blocks[{{ $key }}][order]"
                                    class="setOrderBeforeSubmit"
                                    hidden>

                                {{-- Name --}}
                                {{-- Order --}}
                                {{-- ============================================ --}}
                                <div class="row">
                                    <div class="col col--max">
                                        <section class="form__section">
                                            <label for="blocks[{{ $key }}][name]" class="form__label form__label--required">Naam</label>

                                            <input
                                                type="text"
                                                id="blocks[{{ $key }}][name]"
                                                name="blocks[{{ $key }}][name]"
                                                value="{{ old('blocks.'.$key.'.name', $block->name) }}"
                                                class="form__input form__input--full-width"
                                                required>

                                            @if ($errors->has('blocks.'.$key.'.name'))
                                                <span class="form__section-feedback">
                                                    {{ $errors->first('blocks.'.$key.'.name') }}
                                                </span>
                                            @endif
                                        </section>
                                    </div>

                                    <div class="col blog-order">
                                        <a class="text--xl link--cursor" onclick="orderBlockUp($(this))"><i class="fas fa-angle-up"></i></a>
                                        <a class="text--xl link--cursor" onclick="orderBlockDown($(this))"><i class="fas fa-angle-down"></i></a>
                                        <a class="text--xl link--cursor link--error" onclick="removeThisBlock($(this))"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>

                                {{-- Content --}}
                                {{-- ============================================ --}}
                                <section class="form__section">
                                    <label for="blocks[{{ $key }}][content]" class="form__label form__label--required">Content</label>

                                    <textarea
                                        id="blocks[{{ $key }}][content]"
                                        name="blocks[{{ $key }}][content]"
                                        class="form__textarea form__input--full-width tinymce"
                                        required>{{ old('blocks.'.$key.'.content', $block->content) }}</textarea>

                                    @if ($errors->has('blocks.'.$key.'.content'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('blocks.'.$key.'.content') }}
                                        </span>
                                    @endif
                                </section>

                                {{-- UI type --}}
                                {{-- ============================================ --}}
                                <div class="form__section inputUiType">
                                    <label class="form__label form__label--required">UI type</label>

                                    <div class="row small-gutters wrapper__ui-type">
                                        @foreach(Config::get('blog.ui_types') as $ui_type)
                                            <div class="col-4 col-lg-2 ui-type">
                                                <input
                                                    type="radio"
                                                    id="{{ $key }}-ui-type-{{ $loop->index }}"
                                                    name="blocks[{{ $key }}][ui_type]"
                                                    class="ui-type__select"
                                                    value="{{ $ui_type }}"
                                                    hidden
                                                    {{ old('blocks.'.$key.'.ui_type', $block->ui_type) == $ui_type ? "checked" : "" }}>

                                                <label for="{{ $key }}-ui-type-{{ $loop->index }}" class="ui-type__label">
                                                    <img src="{{ asset('/img/blog-ui-types/'.$ui_type.'.png') }}" alt="$ui_type">
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($errors->has('blocks.'.$key.'.ui_type'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('blocks.'.$key.'.ui_type') }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Afbeelding --}}
                                {{-- ============================================ --}}
                                <div class="form__section">
                                    <label class="form__label form__label--required">Afbeelding</label>

                                    <p>
                                        <input
                                            type="radio"
                                            id="{{ $key }}-image-source-library"
                                            name="blocks[{{ $key }}][image_source]"
                                            class="imageSource"
                                            value="library"
                                            {{ old('blocks.'.$key.'.image_source', true) == 'library' ? "checked" : "" }}>

                                        <label for="{{ $key }}-image-source-library" class="fa--before ">
                                            Bibliotheek
                                        </label>

                                        <input
                                            type="radio"
                                            id="{{ $key }}-image-source-upload"
                                            name="blocks[{{ $key }}][image_source]"
                                            class="imageSource"
                                            value="upload"
                                            class="fa--after"
                                            {{ old('blocks.'.$key.'.image_source') == 'upload' ? "checked" : "" }}>

                                        <label for="{{ $key }}-image-source-upload" class="link--cursor">
                                            Upload
                                        </label>
                                    </p>

                                    <div class="imageFromLibrary">
                                        <div for="image-selection" class="image-selection image-selection--3">
                                            @foreach($images as $image)
                                                <input
                                                    type="radio"
                                                    id="{{ $key }}-image-{{ $loop->index }}"
                                                    name="blocks[{{ $key }}][image]"
                                                    class="image-selection__input"
                                                    value="{{ $image->id }}"
                                                    hidden
                                                    {{ intval(old('blocks.'.$key.'.image', $block->image_id)) == $image->id ? "checked" : "" }}>

                                                <div class="image-selection__image">
                                                    <label for="{{ $key }}-image-{{ $loop->index }}" class="form__label image-selection__label">
                                                        <img src="{{ $image->path }}">
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="imageFromUpload form__input-with-button">
                                        <input
                                            type="file"
                                            id="blocks[{{ $key }}][image_upload]"
                                            class="form__input form__input--full-width">

                                        <a class="btn btn--primary form__input-button imageUploadButton" onclick="uploadImage(event, false, $(this));">Upload</a>
                                    </div>

                                    @if ($errors->has('blocks.'.$key.'.image'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('blocks.'.$key.'.image') }}
                                        </span>
                                    @endif
                                    @if ($errors->has('blocks.'.$key.'.image_upload'))
                                        <span class="form__section-feedback">
                                            {{ $errors->first('blocks.'.$key.'.image_upload') }}
                                        </span>
                                    @endif
                                </div>

                                @if($block->used_multiple_times)
                                    @component('components.flash_message', [
                                        'type' => 'warning',
                                    ])
                                        Aandacht! Deze blok is meerdere keren gebruikt. Als je deze aanpast, wordt het overal aangepast. Als je deze blok meerdere keren gebruikt in deze post, pas de laatste instantie aan.
                                    @endcomponent
                                @endif
                            </div>

                            <div class="input-blog-block input-blog-block--add">
                                <div class="wrapper__btn wrapper__btn--centered">
                                    <a class="btn btn--secondary link--cursor" onclick="$(this).parent().next('.existingBlocks').slideToggle(300)">Voeg bestaande blok toe</a>
                                    <a class="btn btn--secondary link--cursor" onclick="addNewContentBlock($(this))">Voeg nieuwe blok toe</a>
                                </div>

                                <ul class="list--no-ui text--align-center existingBlocks medium-margin-top" style="display: none">
                                    @foreach($blocks as $add_block)
                                        <li>
                                            <a data-i-block="{{ $loop->index }}" class="link--cursor" onclick="addExistingContentBlock($(this))">{{ $add_block->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                        {{-- Submit --}}
                        {{-- ============================================ --}}
                        <div class="wrapper__btn">
                            <button class="btn btn--primary">Update post</button>
                            <a href="{{ url('/admin/blog/posts') }}" class="btn btn--tertiary">Ga terug</a>
                        </div>

                        <div id="test"></div>
                    </div>

                    {{-- Main info --}}
                    {{-- ============================================ --}}
                    <div class="col-12 col-md-4">
                        <h4>Algemene info</h4>

                        {{-- Name --}}
                        {{-- ============================================ --}}
                        <section class="form__section">
                            <label for="name" class="form__label form__label--required">Naam</label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $post->name) }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('name'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </section>

                        {{-- Title --}}
                        {{-- ============================================ --}}
                        <section class="form__section">
                            <label for="title" class="form__label form__label--required">Titel</label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $post->title) }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('title'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </section>

                        {{-- Subtitle --}}
                        {{-- ============================================ --}}
                        <section class="form__section">
                            <label for="subtitle" class="form__label form__label--required">Subtitel</label>

                            <input
                                type="text"
                                id="subtitle"
                                name="subtitle"
                                value="{{ old('subtitle', $post->subtitle) }}"
                                class="form__input form__input--full-width"
                                required>

                            @if ($errors->has('subtitle'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('subtitle') }}
                                </span>
                            @endif
                        </section>

                        {{-- Category --}}
                        {{-- ============================================ --}}
                        <section class="form__section">
                            <label for="category" class="form__label form__label--required">Categorie</label>

                            <select
                                id="category"
                                name="category"
                                value="{{ old('category', $post->category->id) }}"
                                class="form__select form__select--full-width"
                                required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ intval(old('category', $post->category->id)) == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                    }
                                @endforeach
                            </select>

                            @if ($errors->has('category'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('category') }}
                                </span>
                            @endif
                        </section>

                        {{-- Tags --}}
                        {{-- ============================================ --}}
                        <section class="form__section">
                            <label for="tag_input" class="form__label form__label--required">Tags</label>

                            <ul class="tags">
                                @foreach($post->tags as $tag)
                                    <li class="tags__tag">
                                        <input
                                            type="text"
                                            name="tags[{{ $loop->index }}][id]"
                                            value="{{ $tag->id }}"
                                            hidden>
                                        <input
                                            type="text"
                                            name="tags[{{ $loop->index }}][type]"
                                            class="changeTagType"
                                            value="keep"
                                            hidden>
                                        #{{ $tag->name }}
                                        <span class="fa--after link--cursor link--error" onclick="$(this).parent().hide().find('.changeTagType').val('remove')">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="imageFromUpload form__input-with-button">
                                <input
                                    type="text"
                                    id="tag_input"
                                    class="form__input form__input--full-width"
                                    list="tags"
                                    onkeypress="event.keyCode == 13 ? submitTagEntry(event) : ''">

                                <a class="btn btn--secondary form__input-button" onclick="addTagToList()"><i class="fas fa-plus"></i></a>
                            </div>

                            <datalist id="tags">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->name }}" data-id="{{ $tag->id }}"></option>
                                @endforeach
                            </datalist>
                        </section>

                        {{-- Afbeelding --}}
                        {{-- ============================================ --}}
                        <div class="form__section handleImage">
                            <label class="form__label form__label--required">Afbeelding</label>

                            <p>
                                <input
                                    type="radio"
                                    id="image-source-library"
                                    name="image_source"
                                    class="imageSource"
                                    value="library"
                                    {{ old('image_source', true) == 'library' ? "checked" : "" }}>

                                <label for="image-source-library" class="fa--before ">
                                    Bibliotheek
                                </label>

                                <input
                                    type="radio"
                                    id="image-source-upload"
                                    name="image_source"
                                    class="imageSource"
                                    value="upload"
                                    class="fa--after"
                                    {{ old('image_source') == 'upload' ? "checked" : "" }}>

                                <label for="image-source-upload" class="link--cursor">
                                    Upload
                                </label>
                            </p>

                            <div class="imageFromLibrary">
                                <div for="image-selection" class="image-selection image-selection--post">
                                    @foreach($images as $image)
                                        <input
                                            type="radio"
                                            id="image-{{ $loop->index }}"
                                            class="image-selection__input"
                                            name="image"
                                            value="{{ $image->id }}"
                                            hidden
                                            {{ intval(old('image', $post->image->id)) == $image->id ? "checked" : "" }}>

                                        <div class="image-selection__image">
                                            <label for="image-{{ $loop->index }}" class="form__label image-selection__label">
                                                <img src="{{ $image->path }}">
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="imageFromUpload form__input-with-button">
                                <input
                                    type="file"
                                    id="image_upload"
                                    class="form__input form__input--full-width">

                                <a class="btn btn--primary form__input-button imageUploadButton" onclick="uploadImage(event, true);">Upload</a>
                            </div>

                            @if ($errors->has('image'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('image') }}
                                </span>
                            @endif
                            @if ($errors->has('image_upload'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('image_upload') }}
                                </span>
                            @endif
                        </div>

                        {{-- Active --}}
                        {{-- ============================================ --}}
                        <section class="form__section form__section--parts">
                            <label for="active" class="form__section-part">
                                Toon post?
                            </label>

                            <div class="form__section-part form__section-part--xl">
                                <div class="toggle-switch">
                                    <input
                                        type="checkbox"
                                        id="active"
                                        name="active"
                                        class="toggle-switch__checkbox"
                                        {{ old('active', $post->active) ? 'checked' : null}}
                                        hidden>

                                    <label class="toggle-switch__slider" for="active"></label>
                                </div>
                            </div>

                            @if ($errors->has('name'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </section>

                        {{-- Publish at --}}
                        {{-- ============================================ --}}
                        <section class="form__section">
                            <label for="live_at" class="form__label">Publiceer datum</label>

                            <input
                                type="datetime-local"
                                id="live_at"
                                name="live_at"
                                value="{{ old('live_at', str_replace(' ', 'T', $post->live_at)) }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('live_at'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('live_at') }}
                                </span>
                            @endif
                        </section>

                        {{-- Submit --}}
                        {{-- ============================================ --}}
                        <div class="wrapper__btn">
                            <button class="btn btn--primary">Update post</button>
                            <a href="{{ url('/admin/blog/posts') }}" class="btn btn--tertiary">Ga terug</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var blocks = {!! json_encode($blocks) !!};

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

        // Image selection pop
        (function($){
            $('.checkIfChanged').on('click', '.image-selection', function() {
                $(this).toggleClass('image-selection--expanded');
            });
        })(jQuery);

        // Block going away from page if something is changed
        var inputIsChanged = false,
            formSubmitted = false;

        (function($){
            $('.checkIfChanged').on('input', 'input', changedInput);
            $('.checkIfChanged').on('input', 'select', changedInput);
            $(".checkIfChanged").submit(function() {
                formSubmitted = true;
            });
        })(jQuery);

        function changedInput() {
            inputIsChanged = true;
        }

        window.onbeforeunload = function() {
            if (inputIsChanged && !formSubmitted) return "Je aanpassingen zijn nog niet opgeslagen.";
        };

        // Blog block images toggles
        (function($){
            checkIfImageIncluded();
            checkIfPostImageIncluded();
            $('.checkIfChanged').on('input', '.ui-type__select', checkIfImageIncluded);
            $('.checkIfChanged').on('input', '.imageSource', checkIfImageIncluded);
            $('.handleImage').on('input', '.imageSource', checkIfPostImageIncluded);
        })(jQuery);

        function checkIfImageIncluded() {
            $('.inputUiType').each(function() {
                $imageInclude = $(this).next();
                if ($(this).find('.ui-type__select:checked').val() !== 'no_image') {
                    $imageInclude.slideDown(300).find('input').removeAttr('disabled');
                    if ($imageInclude.find('.imageSource:checked').val() == 'library') {
                        $imageInclude.find('.imageFromLibrary').slideDown(300).find('input').removeAttr('disabled');
                        $imageInclude.find('.imageFromUpload').slideUp(300).find('input').attr('disabled', 'disabled');
                    } else if ($imageInclude.find('.imageSource:checked').val() == 'upload') {
                        $imageInclude.find('.imageFromLibrary').slideUp(300).find('input').attr('disabled', 'disabled');
                        $imageInclude.find('.imageFromUpload').slideDown(300).find('input').removeAttr('disabled');
                    }
                    
                } else {
                    $imageInclude.slideUp(300).find('input').attr('disabled', 'disabled');
                }
            });
        }

        function checkIfPostImageIncluded() {
            $imageInclude = $('.handleImage');
            if ($imageInclude.find('.imageSource:checked').val() == 'library') {
                $imageInclude.find('.imageFromLibrary').slideDown(300).find('input').removeAttr('disabled');
                $imageInclude.find('.imageFromUpload').slideUp(300).find('input').attr('disabled', 'disabled');
            } else if ($imageInclude.find('.imageSource:checked').val() == 'upload') {
                $imageInclude.find('.imageFromLibrary').slideUp(300).find('input').attr('disabled', 'disabled');
                $imageInclude.find('.imageFromUpload').slideDown(300).find('input').removeAttr('disabled');
            }
        }

        // Add blog block
        function addNewContentBlock(e) {
            e.parents('.input-blog-block').after(getContentElement());
            checkIfImageIncluded();
            initTinymce();
            changedInput();
        }

        function addExistingContentBlock(e) {
            $('.existingBlocks').slideUp(300);
            var iBlock = e.attr("data-i-block");
            e.parents('.input-blog-block').after(getContentElement(blocks[iBlock]));
            checkIfImageIncluded();
            initTinymce();
            changedInput();
        }

        function getContentElement(data = undefined) {
            var key = $('.input-blog-block:not(.input-blog-block--add').length,
                element = '' +
                    '<div class="input-blog-block ' + (data && data.times_used > 0 ? 'cs-dark' : '') + '">' +
                    (data ? 
                       '<input' +
                       '    type="text"' +
                       '    name="blocks[' + key + '][id]"' +
                       '    value="' + data.id + '"' +
                       '    hidden>'
                    : '' ) +
                    '   <input' +
                    '       type="text"' +
                    '       name="blocks[' + key + '][type]"' +
                    '       class="changeType"' +
                    '       value="' + (data ? 'new_link' : 'new_block') + '"' +
                    '       hidden>' +
                    '   <input' +
                    '       type="text"' +
                    '       name="blocks[' + key + '][order]"' +
                    '       class="setOrderBeforeSubmit"' +
                    '       hidden>' +

                    '   {{-- Name --}}' +
                    '   {{-- ============================================ --}}' +
                    '   <div class="row">' +
                    '       <div class="col col--max">' +
                    '           <section class="form__section">' +
                    '               <label for="blocks[' + key + '][name]" class="form__label form__label--required">Naam</label>' +

                    '               <input' +
                    '                   type="text"' +
                    '                   id="blocks[' + key + '][name]"' +
                    '                   name="blocks[' + key + '][name]"' +
                    '                   value="' + (data ? data.name : '') + '"' +
                    '                   class="form__input form__input--full-width"' +
                    '                   required>' +
                    '           </section>' +
                    '        </div>' +

                    '        <div class="col blog-order">' +
                    '            <a class="text--xl link--cursor" onclick="orderBlockUp($(this))"><i class="fas fa-angle-up"></i></a>' +
                    '            <a class="text--xl link--cursor" onclick="orderBlockDown($(this))"><i class="fas fa-angle-down"></i></a>' +
                    '            <a class="text--xl link--cursor link--error" onclick="removeThisBlock($(this))"><i class="fas fa-times"></i></a>' +
                    '        </div>' +
                    '    </div>' +

                    '   {{-- Content --}}' +
                    '   {{-- ============================================ --}}' +
                    '   <section class="form__section">' +
                    '       <label for="blocks[' + key + '][content]" class="form__label form__label--required">Content</label>' +

                    '       <textarea' +
                    '           id="blocks[' + key + '][content]"' +
                    '           name="blocks[' + key + '][content]"' +
                    '           class="form__textarea form__input--full-width tinymce"' +
                    '           required>' + (data ? data.content : '<p>Hello world!</p>') + '</textarea>' +
                    '   </section>' +

                    '   {{-- UI type --}}' +
                    '   {{-- ============================================ --}}' +
                    '   <div class="form__section inputUiType">' +
                    '       <label class="form__label form__label--required">UI type</label>' +

                    '       <div class="row small-gutters wrapper__ui-type">' +
                                @foreach(Config::get('blog.ui_types') as $ui_type)
                    '               <div class="col-4 col-lg-2 ui-type">' +
                    '                   <input' +
                    '                       type="radio"' +
                    '                       id="' + key + '-ui-type-{{ $loop->index }}"' +
                    '                       name="blocks[' + key + '][ui_type]"' +
                    '                       class="ui-type__select"' +
                    '                       value="{{ $ui_type }}"' +
                    '                       hidden' +
                    '                       ' + (data ? (data.ui_type === '{{ $ui_type }}' ? 'checked' : '') : ('{{ $ui_type }}' == 'no_image' ? 'checked' : '')) + '>' +

                    '                   <label for="' + key + '-ui-type-{{ $loop->index }}" class="ui-type__label">' +
                    '                       <img src="{{ asset('/img/blog-ui-types/'.$ui_type.'.png') }}" alt="$ui_type">' +
                    '                   </label>' +
                    '               </div>' +
                                @endforeach
                    '       </div>' +
                    '   </div>' +

                    '   {{-- Afbeelding --}}' +
                    '   {{-- ============================================ --}}' +
                    '   <div class="form__section">' +
                    '       <label class="form__label form__label--required">Afbeelding</label>' +

                    '       <p>' +
                    '           <input' +
                    '               type="radio"' +
                    '               id="' + key + '-image-source-library"' +
                    '               name="blocks[' + key + '][image_source]"' +
                    '               class="imageSource"' +
                    '               value="library"' +
                    '               checked>' +

                    '           <label for="' + key + '-image-source-library" class="fa--before link--cursor">' +
                    '               Bibliotheek' +
                    '           </label>' +

                    '           <input' +
                    '               type="radio"' +
                    '               id="' + key + '-image-source-upload"' +
                    '               name="blocks[' + key + '][image_source]"' +
                    '               class="imageSource"' +
                    '               value="upload"' +
                    '               class="fa--after">' +

                    '           <label for="' + key + '-image-source-upload" class="link--cursor">' +
                    '               Upload' +
                    '           </label>' +
                    '       </p>' +

                    '       <div class="imageFromLibrary">' +
                    '           <div for="image-selection" class="image-selection image-selection--3">' +
                                    @foreach($images as $image)
                    '                   <input' +
                    '                       type="radio"' +
                    '                       id="' + key + '-image-{{ $loop->index }}"' +
                    '                       name="blocks[' + key + '][image]"' +
                    '                       class="image-selection__input"' +
                    '                       value="{{ $image->id }}"' +
                    '                       hidden' +
                    '                       ' + (data && data.image_id == '{{ $image->id }}' ? 'checked' : '') + '>' +

                    '                   <div class="image-selection__image">' +
                    '                       <label for="' + key + '-image-{{ $loop->index }}" class="form__label image-selection__label">' +
                    '                           <img src="{{ $image->path }}">' +
                    '                       </label>' +
                    '                   </div>' +
                                    @endforeach
                    '           </div>' +
                    '       </div>' +

                    '       <div class="imageFromUpload form__input-with-button">' +
                    '           <input' +
                    '               type="file"' +
                    '               id="blocks[' + key + '][image_upload]"' +
                    '               name="blocks[' + key + '][image_upload]"' +
                    '               class="form__input form__input--full-width">' +

                    '           <a class="btn btn--primary form__input-button imageUploadButton" onclick="uploadImage(event, false, $(this));">Upload</a>' +
                    '       </div>' +
                    '   </div>' +

                    (
                        data && data.times_used > 0
                            ? `@component('components.flash_message', ['type' => 'warning']) Attention! This block is used multiple times. If you change this one, it changes everywhere. If you have it multiple times on this post, edit the last instance. @endcomponent`
                            : ''
                    ) +
                    '</div>' +

                    '<div class="input-blog-block input-blog-block--add">' +
                    '   <div class="wrapper__btn wrapper__btn--centered">' +
                    '       <a class="btn btn--secondary link--cursor" onclick="$(this).parent().next(\'.existingBlocks\').slideToggle(300)">Voeg bestaande blok toe</a>' +
                    '       <a class="btn btn--secondary link--cursor" onclick="addNewContentBlock($(this))">Voeg nieuwe blok toe</a>' +
                    '   </div>' +

                    '   <ul class="list--no-ui text--align-center existingBlocks medium-margin-top" style="display: none">' +
                            @foreach($blocks as $add_block)
                    '           <li>' +
                    '               <a data-i-block="{{ $loop->index }}" class="link--cursor" onclick="addExistingContentBlock($(this))">{{ $add_block->name }}</a>' +
                    '           </li>' +
                            @endforeach
                    '   </ul>' +
                    '</div>';
            return element;
        }

        // Remove blog block
        function removeThisBlock(e) {
            var block = e.parents('.input-blog-block');
            block.find('.changeType').val('remove');
            block.hide().next().remove();
            changedInput();
        }

        // Add order
        function orderBlockUp(e) {
            var block = e.parents('.input-blog-block');
            var blockToSwapWith = block.prev().prev();
            if (blockToSwapWith.length > 0 && blockToSwapWith.hasClass('input-blog-block')) {
                block.swapWith(blockToSwapWith);
                changedInput();
            }
        }
        function orderBlockDown(e) {
            var block = e.parents('.input-blog-block');
            var blockToSwapWith = block.next().next();
            if (blockToSwapWith.length > 0) {
                block.swapWith(blockToSwapWith);
                changedInput();
            }
        }

        $('#edit-form').submit(function() {
            $('.setOrderBeforeSubmit').each(function(i) {
                $(this).val(i);
            });

            $('.imageSource[value="library"]').prop("checked", true);
            checkIfImageIncluded();
            checkIfPostImageIncluded();

            return true;
        });

        jQuery.fn.swapWith = function(to) {
            return this.each(function() {
                var copy_to = $(to).clone(true);
                var copy_from = $(this).clone(true);
                $(to).replaceWith(copy_from);
                $(this).replaceWith(copy_to);
            });
        };

        // Add tag
        function addTagToList() {
            var $input = $('#tag_input'),
                tag = $input.val().replace('_', '-').replace(/[^a-zA-Z0-9- ]/g, "").trim().replace(/\s/g,'-').toLowerCase();

            if (tag !== '') {
                var $options = $('#tags option'),
                    $tags = $('.tags'),
                    list = $options.map(function () {
                        return this.value;
                    }).get(),
                    id = list.indexOf(tag) >= 0 ? ($options.eq(list.indexOf(tag)).attr('data-id')) : undefined,
                    tagList = $tags.find('.tags__tag').map(function () {
                        return $(this).text().replace(/\s/g,'').replace('#','');
                    }).get(),
                    inList = tagList.indexOf(tag) >= 0 ? true : false;

                if (!inList) {
                    $tags.append(getTagElement(tag, id));
                    $input.val('');
                } else {
                    alert('It\'s already in the list');
                    $input.val(tag);
                }

                changedInput();
            }
        }

        function submitTagEntry(e) {
            e.preventDefault();
            addTagToList();
        }

        function getTagElement (tag, id = undefined) {
            var key = 0,
                element;

            $('.changeTagType').each(function() {
                tagIndex = parseInt($(this).attr('name').split('[')[1].replace(']', ''));
                key = Math.max(tagIndex, key);
            });
            key++;

            element = '' +
                '   <li class="tags__tag">' +
                (id ?
                    '   <input' +
                    '       type="text"' +
                    '       name="tags[' + key + '][id]"' +
                    '       value="' + id + '"' +
                    '       hidden>'
                    : ''
                ) +
                (id ? '' :
                    '   <input' +
                    '       type="text"' +
                    '       name="tags[' + key + '][name]"' +
                    '       value="' + tag + '"' +
                    '       hidden>'
                ) +
                '       <input' +
                '           type="text"' +
                '           name="tags[' + key + '][type]"' +
                '           class="changeTagType"' +
                '           value="' + (id ? 'link' : 'new') + '"' +
                '           hidden>' +
                '       #' + tag +
                '       <span class="fa--after link--cursor link--error" onclick="$(this).parent().hide().find(\'.changeTagType\').val(\'remove\')">' +
                '           <i class="fas fa-times"></i>' +
                '       </span>' +
                '   </li>';

            return element;
        }

        // Upload image
        var $imageUpload = $("#image_upload"),
            $button = $('.imageUploadButton'),
            buttonContent = {
                upload: 'Upload',
                connecting: '<span class="fa--before"><i class="fas fa-spinner fa-spin"></i></span>Connecting...',
                uploading: '<span class="fa--before"><i class="fas fa-spinner fa-spin"></i></span>Uploading...',
                saved: '<span class="fa--before"><i class="fas fa-check"></i></span>Uploaded'
            };

        $imageUpload.change(function(){    
            $button.html(buttonContent.upload);
        });

        function uploadImage(e, fromPost, element = undefined) {
            e.preventDefault();

            if (!fromPost) $imageUpload = element.prev();

            var image = $imageUpload.prop('files')[0];
            var formData = new FormData();
            formData.append('image', image);

            $button.html(buttonContent.connecting);

            $.ajax({
                url: '/api/upload-image',
                method: 'post',
                contentType: false,
                processData: false,
                data: formData,
                dataType:'json',
                beforeSend: function() {
                    $button.html(buttonContent.uploading);
                    console.log('Uploading....');
                },
                statusCode: {
                    413: function() {
                        alert('Oh daddy, it\'s too big. Hou je afbeeldingen onder 2MB.');
                        $button.html(buttonContent.upload);
                    },
                    500: function() {
                        alert('Er is iets foutgelopen aan de serverkant. Probeer nog eens of contacteer Paco.');
                    }
                }
            }).done(function(data) {
                $button.html(buttonContent.saved);
                console.log(data);
                console.log('Saved');

                var i = $('.image-selection__input').length,
                    html = '' +
                        '<input' +
                        '    type="radio"' +
                        '    id="image-' + data.id + '"' +
                        '    class="image-selection__input"' +
                        '    name="image"' +
                        '    value="' + data.id + '"' +
                        '    hidden' +
                        (fromPost
                            ? ' checked'
                            : ''
                        ) +
                        '>' +
                        '<div class="image-selection__image">' +
                        '    <label for="image-' + data.id + '" class="form__label image-selection__label">' +
                        '        <img src="' + data.path + '">' +
                        '    </label>' +
                        '</div>';

                $button.html(buttonContent.saved);
                $('.image-selection--post').append(html);

                $('.input-blog-block:not(.input-blog-block--add').each(function() {
                    var key = $(this).find('.imageFromLibrary:first').find('.image-selection__input:first').attr('id').split("-")[0];
                    html = '' +
                        '<input' +
                        '    type="radio"' +
                        '    id="' + key + '-image-' + data.id + '"' +
                        '    name="blocks[' + key + '][image]"' +
                        '    class="image-selection__input"' +
                        '    value="' + data.id + '"' +
                        '    hidden>' +
                        '<div class="image-selection__image">' +
                        '    <label for="' + key + '-image-' + data.id + '" class="form__label image-selection__label">' +
                        '        <img src="' + data.path + '">' +
                        '    </label>' +
                        '</div>';

                    $(this).find('.image-selection').append(html)
                });

                setTimeout(function (){
                    $button.html(buttonContent.upload);
                    $('[id$="image-source-library"]').prop("checked", true);
                    $('input[type=file]').val('');
                    checkIfImageIncluded();
                    checkIfPostImageIncluded();
                }, 600);
            });
        }
    </script>

@endsection
