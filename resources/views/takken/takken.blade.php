@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'images' => [
            [
                'image' => asset('/img/banner.jpg'),
                'alt' => 'Banner',
            ],
        ],
        'page_title' => 'Alle takken',
    ])
    @endcomponent

    @foreach($takken as $tak)
        <div class="row tak section section--small-spacing">
            <div class="col-3">
                <div class="tak__img-wrapper">
                    <img src="/img/{{ $tak->foto }}" alt="{{ $tak->naam }}" class="tak__img">
                </div>
            </div>

            <div class="col-9">
                <div class="volgende-activiteit cs-{{ strtolower($tak->naam) }}">
                    <header class="volgende-activiteit__header">
                        <h3 class="volgende-activiteit__titel">{{ $tak->naam }}</h3>
                        <p><b>Vanaf {{ $tak->vanaf }} jaar</b></p>
                    </header>

                    <p>
                        {!! $tak->beschrijving !!}
                    </p>

                    <p>
                        <a href="/takken/{{ strtolower($tak->naam) }}">meer info ></a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection