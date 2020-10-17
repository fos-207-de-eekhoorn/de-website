@extends('layouts.admin_blog')

@section('banner')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Nieuwtjes',
        'page_sub_title' => 'Posts',
    ])
    @endcomponent
@endsection

@section('breadcrumbs')
    @component('components.breadcrumbs', [
        'childs' => [
            (object)[
                'link' => '/admin',
                'name' => 'Admin',
            ],
            (object)[
                'link' => '/admin/blog',
                'name' => 'Nieuwtjes',
            ],
        ],
        'current' => 'Posts',
    ])@endcomponent
@endsection

@section('main')

    <div class="row section section--extra-small-spacing">
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
                            <td class="table__cell">Image</td>
                            <td class="table__cell">Title</td>
                            <td class="table__cell">Category</td>
                            <td class="table__cell"># of blocks</td>
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

                                <td class="table__cell table__cell--hover-action">
                                    <div class="wrapper__btn wrapper__btn--right wrapper__btn--vertical-on-mobile wrapper__btn--small-spacing">
                                        <a href="{{ url('/admin/blog/posts/edit/' . Crypt::encrypt($post->id)) }}" class="table__action btn btn--without-style">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <form action="{{ url('/admin/blog/posts/delete') }}" method="POST" class="btn btn--without-style">
                                            @csrf

                                            <input
                                                type="text"
                                                name="id"
                                                value="{{ Crypt::encrypt($post->id) }}"
                                                hidden>
                                            <button
                                                class="btn btn--without-style table__action link--error"
                                                title="Delete post"
                                                onclick="
                                                    confirm('U SURE? LIKE... FO REALZZZZ?')
                                                        ? NULL
                                                        : event.preventDefault();
                                                ">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
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
