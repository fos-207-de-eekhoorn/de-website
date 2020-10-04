@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Alle takken',
    ])
    @endcomponent

    <div class="row">
        @if (session('error_not_found'))
            <div class="col-12 section section--small-spacing">
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Deze tak is niet gevonden, volg de link hieronder.
                @endcomponent
            </div>
        @endif
    </div>

    @foreach($takken as $tak)
        <div class="tak section section--small-spacing">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="tak__img-wrapper">
                        <img src="/img/{{ $tak->foto }}" alt="{{ $tak->naam }}" class="tak__img">
                    </div>
                </div>

                <div class="col-12 col-md-9">
                    <div class="tak__info cs-{{ $tak->kleur }}">
                        <header class="tak__header">
                            <h3 class="tak__titel">{{ $tak->naam }}</h3>
                            <p><b>Vanaf {{ $tak->vanaf }} jaar</b></p>
                        </header>

                        <p>
                            {!! $tak->beschrijving !!}
                        </p>

                        <p>
                            <a href="{{ url('/takken/' . $tak->link) }}">meer info ></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection