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



    <div class="row justify-content-center">
        <div class="col-12 col-md-8 blog-post-details">
            <a href="{{ url('/blog') }}"><span class="fa--before"><i class="fas fa-angle-left"></i></span>Terug naar overzicht</a>
        </div>
    </div>

    {{-- Content --}}
    {{-- ================================================================ --}}
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

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 blog-post-details">
            <a href="{{ url('/blog') }}"><span class="fa--before"><i class="fas fa-angle-left"></i></span>Terug naar overzicht</a>
        </div>
    </div>

@endsection
