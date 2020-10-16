@extends('layouts.admin_blog')

@section('main')

    {{-- List --}}
    {{-- ================================================================ --}}
    <div class="col-12">
        <h4>Blog categories</h4>

        @if (session('add_success'))
            @component('components.flash_message', [
                'type' => 'success',
            ])
                Your category has been added
            @endcomponent
        @endif
        @if (session('delete_success'))
            @component('components.flash_message', [
                'type' => 'warning',
            ])
                Your category has been added removed
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
            <a href="{{ url('/admin/blog/categories/add') }}">
                <span class="fa--before"><i class="fas fa-plus"></i></span>Add category
            </a>
        </p>

        <table class="table table--summary">
            <thead class="table__head">
                <tr class="table__row">
                    <th class="table__cell">Category</th>
                    <th class="table__cell"></th>
                </tr>
            </thead>

            <tbody class="table__body">
                @forelse($categories as $category)
                    <tr class="table__row">
                        <td class="table__cell">
                            {{ $category->name }}
                        </td>

                        <td class="table__cell table__cell--hover-action">
                            <div class="wrapper__btn wrapper__btn--right">
                                <form action="{{ url('/admin/blog/categories/delete') }}" method="POST">
                                    @csrf

                                    <input
                                        type="text"
                                        name="id"
                                        value="{{ Crypt::encrypt($category->id) }}"
                                        hidden>
                                    <button
                                        class="btn btn--without-style table__action link--error"
                                        title="Delete category"
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
                        <td class="table__cell" colspan="2">
                            No categories yet
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
