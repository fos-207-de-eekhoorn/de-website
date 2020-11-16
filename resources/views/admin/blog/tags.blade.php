@extends('layouts.main')

@section('content')

    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Blog',
        'page_sub_title' => 'Tags',
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
        'current' => 'Tags',
    ])@endcomponent

    @component('components.admin_blog_nav')
    @endcomponent

    <div class="row section section--small-spacing">
        <div class="col-12">
            <div class="multiple-titles small-margin-bottom align-items-center">
                <h2>Blog tags</h2>

                <a href="{{ url('/admin/blog/tags/add') }}" class="btn btn--primary">
                    <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg tag toe
                </a>
            </div>

            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    Je tag is toegevoegd.
                @endcomponent
            @endif
            @if (session('delete_success'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    Je tag is verwijderd.
                    <form action="{{ url('/admin/blog/tags/remove-undo') }}" method="POST" class="medium-margin-left" style="display: inline;">
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
                    Je tag is terug gezet.
                @endcomponent
            @endif
            @if (session('restore_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Geen paniek, Paco kan deze terugzetten.
                @endcomponent
            @endif

            <table class="table table--summary">
                <thead class="table__head">
                    <tr class="table__row">
                        <td class="table__cell">Tag</td>
                        <td class="table__cell"># gebruikt</td>
                        <td class="table__cell"></td>
                    </tr>
                </thead>

                <tbody class="table__body">
                    @forelse($tags as $tag)
                        <tr class="table__row">
                            <td class="table__cell">
                                #{{ $tag->name }}
                            </td>

                            <td class="table__cell">
                                {{ $tag->times_used }}x
                            </td>

                            <td class="table__cell table__cell--hover-action">
                                <div class="wrapper__btn wrapper__btn--right">
                                    <form action="{{ url('/admin/blog/tags/delete') }}" method="POST">
                                        @csrf

                                        <input
                                            type="text"
                                            name="id"
                                            value="{{ Crypt::encrypt($tag->id) }}"
                                            hidden>
                                        <button
                                            class="btn btn--without-style table__action link--error"
                                            title="Delete tag"
                                            onclick="
                                                confirm('{{ $tag->times_used > 0 ? 'Deze tag is gebruikt in ' . $tag->times_used . ' posts. Ben je zeker dat je de tag wilt verwijderen uit al deze posts?' : 'U SURE? LIKE... FO REALZZZZ?' }}')
                                                    ? undefined
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
                            <td class="table__cell" colspan="3">
                                No tags yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
