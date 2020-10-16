@extends('layouts.admin_blog')

@section('main')

    {{-- List --}}
    {{-- ================================================================ --}}
    <div class="col-12">
        <h4>Blog posts</h4>

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

        <p>
            <a href="{{ url('/admin/blog/posts/add') }}">
                <span class="fa--before"><i class="fas fa-plus"></i></span>Add post
            </a>
        </p>

        <div class="wrapper__table">
            <table class="table table--summary">
                <thead class="table__head">
                    <tr class="table__row">
                        <th class="table__cell">Image</th>
                        <th class="table__cell">Title</th>
                        <th class="table__cell">Category</th>
                        <th class="table__cell"># of blocks</th>
                        <th class="table__cell">Active</th>
                        <th class="table__cell"></th>
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

@endsection
