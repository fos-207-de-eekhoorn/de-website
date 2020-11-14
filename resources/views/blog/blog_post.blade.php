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

    <section class="section section--extra-small-spacing banner banner--large">
        <img src="{{ $post->image->path }}" class="banner__image">
    </section>



    {{-- Content --}}
    {{-- ================================================================ --}}
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 blog-post-details">
            <h1 class="blog-post-details__title">{{ $post->title }}</h1>
            <h2 class="blog-post-details__subtitle">{{ $post->subtitle }}</h2>

            <p class="blog-post-details__info">
                <span class="fa--before icon"><i class="fas fa-newspaper"></i></span>{{ $post->category_name }}
                <span class="fa--before fa--after">&middot;</span>
                <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>{{ Carbon\Carbon::parse($post->live_at)->isoFormat('DD MMMM YYYY') }}
            </p>

            @foreach ($post->blocks as $block)
                <div class="blog-block blog-block--{{ $block->ui_type }}">
                    @if($block->ui_type != 'no_image') <img src="{{ $block->image->path }}" class="blog-block__image">@endif

                    {!! $block->content !!}
                </div>
            @endforeach
        </div>
    </div>

    {{-- Ending --}}
    {{-- ================================================================ --}}
    <div class="row justify-content-center section">
        <div class="col-12 col-md-8 section">
            <h3 class="text--align-center">Tag cloud</h3>
            <div class="tags tags--centered">
                @foreach ($post->tags as $tag)
                    <a href="{{ url('/blog?tags=' . $tag->name) }}" class="tags__tag">#{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>

        <div class="col-12 col-md-8 section">
            <h3 class="text--align-center">Recente posts</h3>
            
            <div class="row">
                @foreach ($next_posts as $next_post)
                    <div class="col-12 col-md-6">
                        <div class="blog-post-small">
                            <a href="#" class="blog-post-small__inner">
                                <div class="blog-post-small__image aspect-ratio">
                                    <div class="aspect-ratio__container">
                                        <img src="{{ $next_post->image->path }}" class="aspect-ratio__inner">
                                    </div>
                                </div>

                                <div class="blog-post-small__info">
                                    <h4 class="blog-post-small__title">{{ $next_post->title }}</h4>
                                    <p class="blog-post-small__date">
                                        <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>{{ Carbon\Carbon::parse($next_post->live_at)->isoFormat('DD MMMM YYYY') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8 blog-post-details">
            <p class="text--align-center no-margin-bottom">
                <a href="{{ url('/blog') }}"><span class="fa--before"><i class="fas fa-angle-left"></i></span>Terug naar overzicht</a>
            </p>
        </div>
    </div>

@endsection
