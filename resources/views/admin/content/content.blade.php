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

        <div class="col-12 col-md-8 section">
            <h2>Content</h2>

            <h4>key: {{ $content->key }}</h4>

            @if (session('add_success'))
                @component('components.flash_message', [
                    'type' => 'success',
                ])
                    De tekst is aangepast.
                @endcomponent
            @endif

            @if (session('add_error'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er is iets fout gegaan. Neem screenshots en stuur door naar Paco, hij is jouw vriend!
                @endcomponent
            @endif

            @if (session('samesies'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Dude / Dudine! Pas je tekst toch aan. Doe toch een keer een beetje moeite. For fuck's sake...
                @endcomponent
            @endif

            <form class="form" action="/admin/contents/add" method="POST">
                @csrf

                {{-- ID --}}
                <input
                    type="text"
                    name="id"
                    value="{{ Crypt::encrypt($content->id) }}"
                    hidden>

                @if ($errors->has('id'))
                    <span class="form__section-feedback">
                        {{ $errors->first('id') }}
                    </span>
                @endif

                {{-- Tak --}}
                <input
                    type="text"
                    name="leider_id"
                    value="{{ Crypt::encrypt(Auth::id()) }}"
                    hidden>

                @if ($errors->has('leider_id_id'))
                    <span class="form__section-feedback">
                        {{ $errors->first('leider_id') }}
                    </span>
                @endif

                {{-- Original text --}}
                <textarea id="original" hidden>@if (count($content->content_text) > 0){{ $content->content_text[0]->text }}@endif</textarea>

                <section class="form__section">
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

                <div class="wrapper__btn">
                    <button class="btn btn--primary">Past tekst aan</button>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-4 section">
            <h4>Laatst aangepast</h4>

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