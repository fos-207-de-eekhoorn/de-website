@extends('layouts.main')

@section('head')

    <!-- Primary Meta Tags -->
    <title>{{ $post->title }} | {{ config('app.name') }}</title>
    <meta name="title" content="{{ $post->title }} | {{ config('app.name') }}">
    <meta name="description" content="{{ $post->subtitle }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $post->title }} | {{ config('app.name') }}">
    <meta property="og:description" content="{{ $post->subtitle }}">
    <meta property="og:image" content="{{ $post->image->path }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $post->title }} | {{ config('app.name') }}">
    <meta property="twitter:description" content="{{ $post->subtitle }}">
    <meta property="twitter:image" content="{{ asset('$post->image->path') }}">

@endsection

@section('content')

    {{-- Header --}}
    {{-- ================================================================ --}}
    <section class="section section--no-padding cs-grey-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ $post->image->path }}" class="banner">
                </div>
            </div>
        </div>
    </section>



    {{-- Content --}}
    {{-- ================================================================ --}}
    <section class="section section--small-padding cs-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 blog-post-details">
                    <h1 class="blog-post-details__title">{{ $post->title }}</h1>
                    <h2 class="blog-post-details__subtitle">{{ $post->subtitle }}</h2>

                    @foreach ($post->blocks as $block)
                        <div class="blog-block blog-block--{{ $block->ui_type }}">
                            @if($block->ui_type != 'no_image') <img src="{{ $block->image->path }}" class="blog-block__image">@endif

                            {!! $block->content !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    {{-- Content --}}
    {{-- ================================================================ --}}
    <section class="section section--small-padding cs-grey-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img src="{{ asset('/img/maryama-marong.png') }}" alt="Maryama Marong">
                </div>

                <div class="col-12 col-md-8 d-flex flex-column justify-content-center">
                    <h3>Maryama Marong</h3>

                    <p>
                        Client Engagement Manager
                    </p>

                    <p>
                        "At Tradler, we believe in the power of positive affirmation through recognition and incentives. In our view, productivity and positivity go hand in hand, which directly translates to tangible business success."
                    </p>

                    <p>
                        Want to learn more about Tradler? Contact <a href="mailto:paul.lloyd@tradler.co">Paul Lloyd</a>, our Key Account Manager, directly via email. Contact <a href="mailto:maryama.marong@tradler.co">Maryama</a> if you have any questions regarding our blog.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="section-seperator section-seperator--grey"></div>

@endsection
