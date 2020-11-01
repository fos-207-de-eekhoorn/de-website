@extends('layouts.main')

@section('content')

    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Blog',
        'page_sub_title' => 'Post toevoegen',
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
        'current' => 'Post toevoegen',
    ])@endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <h4>Voeg post toe</h4>

            <form method="POST" action="{{ url('/admin/blog/posts/add') }}" class="form">
                @csrf

                {{-- Name --}}
                {{-- ============================================ --}}
                <section class="form__section">
                    <label for="name" class="form__label form__label--required">Interne naam</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
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
                    <label for="title" class="form__label form__label--required">Post titel</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
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
                    <label for="subtitle" class="form__label form__label--required">Post subsubtitel</label>

                    <input
                        type="text"
                        id="subtitle"
                        name="subtitle"
                        value="{{ old('subtitle') }}"
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
                        value="{{ old('category') }}"
                        class="form__select form__select--full-width"
                        required>
                        <option hidden disabled selected value> -- Selecteer een optie -- </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('category'))
                        <span class="form__section-feedback">
                            {{ $errors->first('category') }}
                        </span>
                    @endif
                </section>

                {{-- Image --}}
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
                        <div for="image-selection" class="image-selection image-selection--3">
                            @foreach($images as $image)
                                <input
                                    type="radio"
                                    id="image-{{ $loop->index }}"
                                    class="image-selection__input"
                                    name="image"
                                    value="{{ $image->id }}"
                                    hidden
                                    {{ $loop->index == 0 ? "checked" : "" }}>

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

                        <a class="btn btn--primary form__input-button imageUploadButton" onclick="uploadImage(event);">Upload</a>
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

                {{-- Publish at --}}
                {{-- ============================================ --}}
                <span class="form__label">Publiceer om</span>

                <div class="row small-gutters">
                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="live_at_date" class="form__label">Datum</label>

                            <input
                                type="date"
                                id="live_at_date"
                                name="live_at_date"
                                value="{{ old('live_at_date') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('live_at_date'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('live_at_date') }}
                                </span>
                            @endif
                        </section>
                    </div>

                    <div class="col-12 col-md-6">
                        <section class="form__section">
                            <label for="live_at_time" class="form__label">Time</label>

                            <input
                                type="time"
                                id="live_at_time"
                                name="live_at_time"
                                value="{{ old('live_at_time') }}"
                                class="form__input form__input--full-width">

                            @if ($errors->has('live_at_time'))
                                <span class="form__section-feedback">
                                    {{ $errors->first('live_at_time') }}
                                </span>
                            @endif
                        </section>
                    </div>
                </div>

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Make post</button>
                    <a href="{{ url('/admin/blog/posts') }}" class="btn btn--tertiary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image selection pop
        (function($){
            $('.image-selection').on('click', function() {
                $(this).toggleClass('image-selection--expanded');
            });
        })(jQuery);

        // Blog block images toggles
        (function($){
            checkIfImageIncluded();
            $('.handleImage').on('input', '.imageSource', checkIfImageIncluded);
        })(jQuery);

        function checkIfImageIncluded() {
            $imageInclude = $('.handleImage');
            if ($imageInclude.find('.imageSource:checked').val() == 'library') {
                $imageInclude.find('.imageFromLibrary').slideDown(300).find('input').removeAttr('disabled');
                $imageInclude.find('.imageFromUpload').slideUp(300).find('input').attr('disabled', 'disabled');
            } else if ($imageInclude.find('.imageSource:checked').val() == 'upload') {
                $imageInclude.find('.imageFromLibrary').slideUp(300).find('input').attr('disabled', 'disabled');
                $imageInclude.find('.imageFromUpload').slideDown(300).find('input').removeAttr('disabled');
            }
        }

        // Upload image
        var $imageUpload = $("#image_upload"),
            $button = $('.imageUploadButton'),
            buttonContent = {
                upload: 'Upload',
                connecting: '<span class="fa--before"><i class="fas fa-spinner fa-spin"></i></span>Connecting...',
                uploading: '<span class="fa--before"><i class="fas fa-spinner fa-spin"></i></span>Uploading...',
                saving: '<span class="fa--before"><i class="fas fa-spinner fa-spin"></i></span>Saving...',
                saved: '<span class="fa--before"><i class="fas fa-check"></i></span>Uploaded'
            };

        $imageUpload.change(function(){    
            $button.html(buttonContent.upload);
        });

        function uploadImage(e) {
            e.preventDefault();

            var image = $imageUpload.prop('files')[0];
            var imageName = image.name;
            var imageUrl;
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
                }
            }).done(function(data) {
                $button.html(buttonContent.saved);
                console.log(data);
                console.log('Saved');
                /*
                imageUrl = data.url;

                $button.html(buttonContent.uploading);
                console.log('Uploading....');

                $.ajax({
                    url: imageUrl,
                    method: 'PUT',
                    contentType: 'multipart/form-data',
                    
                    data: image
                }).done(function(data) {
                    $button.html(buttonContent.saving);
                    console.log('Uploaded');
                    console.log('Saving....');

                    $.ajax({
                        url: '{{ url('/api/complete-upload') }}',
                        method: 'POST',
                        data: {
                            key: imageName,
                            url: imageUrl
                        }
                    }).done(function(data) {
                        console.log(data);
                        console.log('Saved');

                        var i = $('.image-selection__input').length,
                            html = '' +
                                '<input' +
                                '    type="radio"' +
                                '    id="image-' + i + '"' +
                                '    class="image-selection__input"' +
                                '    name="image"' +
                                '    value="' + data.id + '"' +
                                '    hidden' +
                                '    checked>' +
                                '<div class="image-selection__image">' +
                                '    <label for="image-' + i + '" class="form__label image-selection__label">' +
                                '        <img src="' + data.path + '">' +
                                '    </label>' +
                                '</div>';

                        $button.html(buttonContent.saved);
                        $('.image-selection').append(html);

                        setTimeout(function (){
                            $button.html(buttonContent.upload);
                            $('#image-source-library').prop("checked", true);
                            checkIfImageIncluded();
                        }, 600);
                    });
                });
                */
            }).fail(function() {
                console.log('Paco, fix it');
            });;
        }
    </script>

@endsection
