{{--Required meta tags --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

{{-- Title --}}
<title>@yield('title') - {{ config('app.name') }}</title>
<meta name="title" content="@yield('title') - {{ config('app.name') }}">
<meta property="og:title" content="@yield('title') - {{ config('app.name') }}">
<meta property="twitter:title" content="@yield('title') - {{ config('app.name') }}">

{{-- Description --}}
@hasSection('meta_description')
    <meta name="description" content="@yield('meta_description')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="twitter:description" content="@yield('meta_description')">
@else
    <meta name="description" content="Hier vind je wekelijks de activiteiten of word lid!">
    <meta property="og:description" content="Hier vind je wekelijks de activiteiten of word lid!">
    <meta property="twitter:description" content="Hier vind je wekelijks de activiteiten of word lid!">
@endif

{{-- Type --}}
@hasSection('meta_type')
    <meta property="og:type" content="@yield('meta_type')">
@else
    <meta property="og:type" content="website">
@endif

{{-- Image --}}
@hasSection('meta_image')
    <meta property="og:image" content="@yield('meta_image')">
    <meta property="twitter:image" content="@yield('meta_image')">
@else
    <meta property="og:image" content="{{ asset('/img/meta/meta_image_blue.png') }}">
    <meta property="twitter:image" content="{{ asset('/img/meta/meta_image_blue.png') }}">
@endif

{{-- Url --}}
<meta property="og:url" content="{{ url()->current() }}">
<meta property="twitter:url" content="{{ url()->current() }}">

{{-- Extra --}}
<meta property="twitter:card" content="summary_large_image">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/img/favicon/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/img/favicon/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/img/favicon/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/favicon/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/favicon/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/img/favicon/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/img/favicon/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/img/favicon/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/favicon/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/img/favicon/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/img/favicon/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('/img/favicon/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('/img/favicon/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#c9dd03">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Slick -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Styles -->
<link href="/css/style.css?v=1.0.6" rel="stylesheet">

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/4crnpf63phl1l1ig50ryvytggpw5697mheec0cgpzjjne96e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-Csrf-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@if (config('app.env') !== 'local')
    @include('components.analytics')
@endif