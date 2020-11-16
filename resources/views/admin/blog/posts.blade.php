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

    @component('components.admin_blog_nav')
    @endcomponent

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

            <div class="ajax-error" style="display: none;">
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Dit zou niet mogen gebeuren, bel Paco.
                @endcomponent
            </div>
            <div class="ajax-fail" style="display: none;">
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gelopen. Best eens de pagina refreshen.
                @endcomponent
            </div>
            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Je post is toegevoegd.
                @endcomponent
            @endif
            @if (session('delete_success'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    Je post is verwijderd.
                    <form action="{{ url('/admin/blog/posts/remove-undo') }}" method="POST" class="medium-margin-left" style="display: inline;">
                        @csrf

                        <input
                            type="text"
                            name="id"
                            value="{{ Crypt::encrypt(session('delete_success')) }}"
                            hidden>

                        <button class="btn btn--without-style link--error">
                            <span class="fa--before"><i class="fas fa-times"></i></span>Maak ongedaan
                        </button>
                    </form>
                @endcomponent
            @endif
            @if (session('error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Neem screenshots indien mogelijk en stuur het naar Paco, hij is je vriend.
                @endcomponent
            @endif
            @if (session('restore_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Je post is terug gezet.
                @endcomponent
            @endif
            @if (session('restore_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Geen paniek, Paco kan deze terugzetten.
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
                                    <div class="toggle-switch">
                                        <input
                                            type="checkbox"
                                            id="toggle-{{ $post->id }}"
                                            class="toggle-switch__input"
                                            value="{{ $post->id }}"
                                            @if ($post->active) checked @endif
                                            hidden>
                                        <label class="toggle-switch__slider" for="toggle-{{ $post->id }}"></label>
                                    </div>
                                </td>

                                <td class="table__cell no-wrap">
                                    <p>
                                        <a href="{{ url('/blog/' . $post->url) }}">
                                            <span class="fa--before"><i class="fas fa-eye"></i></span>Bekijk evenement
                                        </a>
                                    </p>

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

    <script>
        (function($){
            $('.toggle-switch__input').change(function() {
                $.ajax({
                    url: "{{ url('/api/blog/posts/set-active') }}",
                    type: "post",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id':  $(this).val(),
                        'status': $(this).prop('checked') ? 1 : 0
                    }
                }).done(function(data) {
                    if (data == 'false') {
                        $(this).prop('checked', !$(this).prop('checked'));
                        $('.ajax-error').slideDown(300);
                    } else {
                        $('.ajax-error').slideUp(300);
                        $('.ajax-fail').slideUp(300);
                    }
                }).fail(function() {
                    $(this).prop('checked', !$(this).prop('checked'));
                    $('.ajax-fail').slideDown(300);
                });
            });
        })(jQuery);
    </script>

@endsection
