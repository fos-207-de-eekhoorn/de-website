@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Admin',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'current' => 'Admin',
            ])@endcomponent     
        </div>

        <div class="col-12">
            <h2>Modules</h2>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <a href="{{ url('/admin/activiteiten') }}" class="admin-module">
                <h3>Activiteiten</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-dice"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <a href="{{ url('/admin/evenementen') }}" class="admin-module">
                <h3>Evenementen</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <a href="{{ url('/admin/inschrijvingen') }}" class="admin-module">
                <h3>Inschrijvingen</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <a href="{{ url('/admin/blog/posts') }}" class="admin-module">
                <h3>Blog</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-newspaper"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <a href="{{ url('/admin/contents') }}" class="admin-module">
                <h3>Content</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-comment-alt"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 section section--small-spacing">
            <a href="{{ url('/admin/settings') }}" class="admin-module">
                <h3>Instellingen</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-cog"></i>
                </div>
            </a>
        </div>
    </div>
@endsection