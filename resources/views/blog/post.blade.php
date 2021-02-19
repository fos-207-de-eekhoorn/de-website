@extends('layouts.app')

@section('head')

    <!-- Primary Meta Tags -->
    <title>{{ $blog_post->title }} | {{ config('app.name') }}</title>
    <meta name="title" content="{{ $blog_post->title }} | {{ config('app.name') }}">
    <meta name="description" content="{{ $blog_post->subtitle }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $blog_post->title }} | {{ config('app.name') }}">
    <meta property="og:description" content="{{ $blog_post->subtitle }}">
    <meta property="og:image" content="{{ $blog_post->image->path }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $blog_post->title }} | {{ config('app.name') }}">
    <meta property="twitter:description" content="{{ $blog_post->subtitle }}">
    <meta property="twitter:image" content="{{ asset('$blog_post->image->path') }}">

@endsection

@section('content')

    <section class="section section--extra-small-spacing banner banner--large">
        <img src="{{ $blog_post->image->path }}" class="banner__image">
    </section>



    {{-- Content --}}
    {{-- ================================================================ --}}
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 blog-post-details">
            <h1 class="blog-post-details__title">{{ $blog_post->title }}</h1>
            <h2 class="blog-post-details__subtitle">{{ $blog_post->subtitle }}</h2>

            <p class="blog-post-details__info">
                <span class="fa--before icon"><i class="fas fa-newspaper"></i></span>{{ $blog_post->category_name }}
                <span class="fa--before fa--after">&middot;</span>
                <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>{{ Carbon\Carbon::parse($blog_post->live_at)->isoFormat('DD MMMM YYYY') }}
            </p>

            @foreach ($blog_post->blocks as $block)
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
        @if (sizeof($blog_post->tags) > 0)
            <div class="col-12 col-md-8 section">
                <h3 class="text--align-center">Tag cloud</h3>
                <div class="tags tags--centered">
                    @foreach ($blog_post->tags as $tag)
                        <a href="{{ route('blog', ['tags' => $tag->name]) }}" class="tags__tag">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="col-12 col-md-8 section">
            <h3 class="text--align-center">Recente posts</h3>

            @component('components.next_blog_posts', [
                'next_blog_posts' => $next_blog_posts,
                'columns' => 2,
                'align' => 'center',
            ])@endcomponent
        </div>
    </div>

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8 blog-post-details">
            <p class="text--align-center no-margin-bottom">
                <a href="{{ route('blog') }}"><span class="fa--before"><i class="fas fa-angle-left"></i></span>Terug naar overzicht</a>
            </p>
        </div>
    </div>

@endsection
