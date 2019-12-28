@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Contact',
    ])
    @endcomponent

    {{-- Contact formulier --}}
    {{-- EL & AEL --}}
    <div class="row section">
        <div class="col-12 col-md-8"></div>

        <div class="col-12 col-md-4">
            <div class="leiding-card-list">
                @component('components.leiding_card', [
                    'leider' => $el,
                ])
                @endcomponent

                @foreach($ael as $ael_leider)
                    @component('components.leiding_card', [
                        'leider' => $ael_leider,
                    ])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endsection