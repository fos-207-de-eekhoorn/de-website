@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Activiteiten',
    ])
    @endcomponent

    {{-- Contact formulier --}}
    {{-- EL & AEL --}}
    <div class="row section">
        <div class="col-12">
            <h2>Takken</h2> 
        </div>

        @foreach($takken as $tak)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="cs-{{ $tak->kleur }}">
                    <h3>{{ $tak->naam }}</h3>

                    <a href="{{ url('/admin/activiteiten/' . strtolower($tak->naam)) }}">Ga naar activiteiten ></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection