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
                <div class="card cs-{{ $tak->kleur }}">
                    <h3>{{ $tak->naam }}</h3>

                    <p class="medium-margin-vertical">
                        <a href="{{ url('/admin/activiteit/add/' . strtolower($tak->naam)) }}">
                            <span class="fa--before"><i class="fas fa-plus"></i></span>Voeg activiteit toe
                        </a>
                    </p>

                    <p>
                        <a href="{{ url('/admin/activiteiten/' . strtolower($tak->naam)) }}">
                            Ga naar activiteiten<span class="fa--after"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection