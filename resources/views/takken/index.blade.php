@extends('layouts.app')

@section('title')
    Takken
@endsection

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

    @if (session('error_not_found'))
        @component('components.flash_message', [
            'type' => 'error',
        ])
            Deze tak is niet gevonden, volg de link hieronder.
        @endcomponent
    @endif

    @if (session('error_activiteit_not_found'))
        @component('components.flash_message', [
            'type' => 'error',
        ])
            De activiteit waarvoor je wou inschrijven is niet gevonden. Probeer het nog eens.<br>
            Indien je deze link gekopieerd hebt van ergens, zorg zeker dat je alle karakters hebt gekopieerd.
        @endcomponent
    @endif

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
                            <h3 class="tak__titel"><a href="{{ route('takken.details', ['tak' => $tak->slug]) }}" class="link--no-style">{{ $tak->naam }}</a></h3>

                            <p class="text--bold">
                                @if($tak->jaartal_begin === $tak->jaartal_eind)
                                    Geboren in {{ $tak->jaartal_begin }}
                                @else
                                    Geboren tussen {{ $tak->jaartal_eind }} en {{ $tak->jaartal_begin }}
                                @endif
                            </p>
                        </header>

                        <p>
                            {!! $tak->beschrijving !!}
                        </p>

                        <p>
                            <a href="{{ route('takken.details', ['tak' => $tak->slug]) }}">Meer info<span class="fa--after"><i class="fas fa-angle-right"></i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection