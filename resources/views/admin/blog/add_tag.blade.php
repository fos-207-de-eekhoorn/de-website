@extends('layouts.app')

@section('content')

    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Blog',
        'page_sub_title' => 'Tag toevoegen',
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
            (object)[
                'link' => '/admin/blog/tags',
                'name' => 'Tags',
            ],
        ],
        'current' => 'Tag toevoegen',
    ])@endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8 col-lg-6">
            <h4>Voeg tag toe</h4>

            <form method="POST" action="{{ route('admin.blog.tags.add.post') }}" class="form">
                @csrf

                {{-- Name --}}
                {{-- ============================================ --}}
                <section class="form__section">
                    <label for="name" class="form__label form__label--required">Naam</label>

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
                    <button class="btn btn--primary">Voeg toe</button>
                    <a href="{{ route('admin.blog.tags') }}" class="btn btn--tertiary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
