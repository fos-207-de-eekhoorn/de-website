@extends('layouts.admin_blog')

@section('main')

    {{-- List --}}
    {{-- ================================================================ --}}
    <div class="col-12 col-md-8">
        <h4>Add blog category</h4>

        <form method="POST" action="{{ url('/admin/blog/categories/add') }}" class="form">
            @csrf

            {{-- Name --}}
            {{-- ============================================ --}}
            <section class="form__section">
                <label for="name" class="form__label form__label--required">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="form__input form__input--full-width"
                    required>

                @if ($errors->has('name'))
                    <span class="form__section-feedback">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </section>

            <div class="wrapper__btn">
                <button class="btn btn--primary">Add category</button>
                <a href="{{ url('/admin/blog/categories') }}" class="btn btn--tertiary">Cancel</a>
            </div>
        </form>
    </div>

@endsection
