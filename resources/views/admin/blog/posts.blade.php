@extends('layouts.main')

@section('content')

    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Blog',
        'page_sub_title' => 'Posts',
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
        ],
        'current' => 'Posts',
    ])@endcomponent

    <div class="row section section--small-spacing">
        <div class="col-12">
            <nav class="admin-blog-nav">
                <ul class="admin-blog-nav__list">
                    <li class="admin-blog-nav__list-item">
                        <a href="{{ url('/admin/blog/posts') }}" class="admin-blog-nav__link{{ Request::is('admin/blog/posts*') ? ' admin-blog-nav__link--active' : '' }}">
                            Posts
                        </a>
                    </li>

                    <li class="admin-blog-nav__list-item">
                        <a href="{{ url('/admin/blog/categories') }}" class="admin-blog-nav__link{{ Request::is('admin/blog/categories*') ? ' admin-blog-nav__link--active' : '' }}">
                            Categorieën
                        </a>
                    </li>

                    <li class="admin-blog-nav__list-item">
                        <a href="{{ url('/admin/blog/tags') }}" class="admin-blog-nav__link{{ Request::is('admin/blog/tags*') ? ' admin-blog-nav__link--active' : '' }}">
                            Tags
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row section">
        {{-- List --}}
        {{-- ================================================================ --}}
        <div class="col-12">
            <div class="multiple-titles small-margin-bottom align-items-center">
                <h2>Blog posts</h2>

                <a href="{{ url('/admin/blog/posts/add/') }}" class="btn btn--primary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg post toe
                </a>
            </div>

            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Your post has been added
                @endcomponent
            @endif
            @if (session('delete_success'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    Your post has been added removed
                @endcomponent
            @endif
            @if (session('error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Something went wrong. Take a screenshot and send it to Orry, he's your friend!
                @endcomponent
            @endif

            <div class="wrapper__table">
                <table class="table">
                    <thead>
                        <tr class="table__row">
                            <td class="table__cell">Afbeelding</td>
                            <td class="table__cell">Titel</td>
                            <td class="table__cell">Categorie</td>
                            <td class="table__cell"># blokken</td>
                            <td class="table__cell">Active</td>
                            <td class="table__cell"></td>
                        </tr>
                    </thead>

                    <tbody class="table__body">
                        @forelse($posts as $post)
                            <tr class="table__row">
                                <td class="table__cell">
                                    <img src="{{ $post->image->path }}" class="img--thumbnail">
                                </td>

                                <td class="table__cell">
                                    {{ $post->name }}
                                </td>

                                <td class="table__cell">
                                    {{ $post->category->name }}
                                </td>

                                <td class="table__cell">
                                    {{ sizeof($post->blocks) }}
                                </td>

                                <td class="table__cell">
                                    {{ $post->active }}
                                </td>

                                <td class="table__cell no-wrap">
                                    {{--
                                    <p>
                                        <a href="{{ url('/evenementen/') }}">
                                            <span class="fa--before"><i class="fas fa-eye"></i></span>Bekijk evenement
                                        </a>
                                    </p>
                                    --}}

                                    <p>
                                        <a href="{{ url('/admin/blog/posts/edit/' . Crypt::encrypt($post->id)) }}">
                                            <span class="fa--before"><i class="fas fa-pen"></i></span>Pas aan
                                        </a>
                                    </p>

                                    <form action="{{ url('/admin/blog/posts/delete') }}" method="POST" class="no-margin-bottom">
                                        @csrf

                                        <input
                                            type="text"
                                            name="id"
                                            value="{{ Crypt::encrypt($post->id) }}"
                                            hidden>

                                        <button
                                            class="btn btn--without-style link--error"
                                            onclick="
                                                confirm('U SURE? LIKE... FO REALZZZZ?')
                                                    ? NULL
                                                    : event.preventDefault();
                                        ">
                                            <span class="fa--before"><i class="fas fa-times"></i></span>Verwijder
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="table__row">
                                <td class="table__cell" colspan="6">
                                    No posts yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
