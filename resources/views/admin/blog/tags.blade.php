@extends('layouts.admin_blog')

@section('main')

    {{-- List --}}
    {{-- ================================================================ --}}
    <div class="col-12">
        <h4>Blog tags</h4>

        @if (session('add_success'))
            @component('components.flash_message', [
                'type' => 'success',
            ])
                Your tag has been added
            @endcomponent
        @endif
        @if (session('delete_success'))
            @component('components.flash_message', [
                'type' => 'warning',
            ])
                Your tag has been added removed
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
            <a href="{{ url('/admin/blog/tags/add') }}">
                <span class="fa--before"><i class="fas fa-plus"></i></span>Add tag
            </a>
        </p>

        <table class="table table--summary">
            <thead class="table__head">
                <tr class="table__row">
                    <th class="table__cell">Tag</th>
                    <th class="table__cell"># used in post</th>
                    <th class="table__cell"></th>
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
                                            confirm('{{ $tag->times_used > 0 ? 'This one is actually used in ' . $tag->times_used . ' posts. Are you sure you want to delete this tag out of all the posts?' : 'U SURE? LIKE... FO REALZZZZ?' }}')
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

@endsection
