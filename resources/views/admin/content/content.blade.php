@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Content',
        'page_sub_title' => $content->name,
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'childs' => [
                    (object)[
                        'link' => '/admin',
                        'name' => 'Admin',
                    ],
                    (object)[
                        'link' => '/admin/contents',
                        'name' => 'Content',
                    ],
                ],
                'current' => $content->name,
            ])@endcomponent    
        </div>

        <div class="col-12">
            <h2>Content</h2>
        </div>

        <div class="col-12 col-md-8 section">
            <h3>key: {{ $content->key }}</h3>

            <form class="form" action="/admin/content/edit" method="POST">
                @csrf

                <section class="form__section form__section--last">
                    <label for="text" class="form__label form__label--required">Tekst</label>

                    <textarea
                        id="text"
                        name="text"
                        class="form__textarea form__input--full-width"
                        required>@if (count($content->content_text) > 0){{ $content->content_text[0]->text }}@endif</textarea>

                    @if ($errors->has('text'))
                        <span class="form__section-feedback">
                            {{ $errors->first('text') }}
                        </span>
                    @endif
                </section>
            </form>
        </div>

        <div class="col-12 col-md-4 section">
            <h3>Laatst aangepast</h3>

            <table class="table">
                @forelse ($content->content_text as $text)
                    <tr class="table__row">
                        <td class="table__cell">
                            @if (strlen($text->leider->totem) > 0)
                                {{ $text->leider->totem }}
                            @else
                                {{ $text->leider->voornaam }}
                            @endif
                        </td>

                        <td class="table__cell table__cell--align-right">
                            {{ Carbon\Carbon::parse($text->created_at)->format('d-m-Y') }}<br>
                            {{ Carbon\Carbon::parse($text->created_at)->format('H:i:s') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="table__cell">
                            Nog geen content beschikbaar
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection