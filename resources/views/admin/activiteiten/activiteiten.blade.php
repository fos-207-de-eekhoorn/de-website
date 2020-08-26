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
    <div class="row justify-content-center section">
        <div class="col-12">
            <div class="multiple-titles small-margin-bottom">
                <h2>Takken</h2>
                <a href="{{ url('/admin/activiteiten/prutske') }}" class="btn btn--secondary align-self-start">Export voor het prutske</a>
            </div>
        </div>

        @foreach($takken as $tak)
            <div class="col-12 col-md-4 large-margin-bottom">
                <div class="card cs-{{ $tak->kleur }} admin-activities">
                    <h3 class="admin-activities__title">{{ $tak->naam }}</h3>

                    <div class="admin-activities__actions">
                        <a href="{{ url('/admin/activiteit/add/' . strtolower($tak->naam)) }}" class="admin-activities__action">
                            <span class="admin-activities__icon"><i class="fas fa-plus"></i></span>
                            <span>Voeg activiteit toe</span>
                        </a>

                        <a href="{{ url('/admin/activiteiten/' . strtolower($tak->naam)) }}" class="admin-activities__action">
                            <span class="admin-activities__icon"><i class="fas fa-angle-right"></i></span>
                            <span>Ga naar activiteiten</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection