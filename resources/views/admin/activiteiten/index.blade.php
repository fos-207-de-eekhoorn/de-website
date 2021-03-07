@extends('layouts.app')

@section('title', 'Admin - Activiteiten')

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

    <div class="row section">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'childs' => [
                    (object)[
                        'link' => '/admin',
                        'name' => 'Admin',
                    ],
                ],
                'current' => 'Activiteiten',
            ])@endcomponent
        </div>

        <div class="col-12">
            <h2>Takken</h2>

            @if (session('no_next_activity'))
                @component('components.flash_message', [
                    'type' => 'error',
                ])
                    Er zijn geen activieiten om inschrijvingen weer te geven.
                @endcomponent
            @endif
        </div>

        @foreach($takken as $tak)
            <div class="col-12 col-md-4 large-margin-bottom">
                <div class="card cs-{{ $tak->kleur }} admin-activities">
                    <h3 class="admin-activities__title">{{ $tak->naam }}</h3>

                    <div class="admin-activities__actions">
                        <a href="{{ route('admin.activiteiten.add', ['tak' => $tak->slug]) }}" class="admin-activities__action">
                            <span class="admin-activities__icon"><i class="fas fa-plus"></i></span>
                            <span class="admin-activities__text">Voeg activiteit toe</span>
                        </a>

                        <a href="{{ route('admin.activiteiten.next_inschrijvingen', ['tak' => $tak->slug]) }}" class="admin-activities__action">
                            <span class="admin-activities__icon"><i class="fas fa-file-alt"></i></span>
                            <span class="admin-activities__text">Bekijk inschrijvingen</span>
                        </a>

                        <a href="{{ route('admin.activiteiten.tak', ['tak' => $tak->slug]) }}" class="admin-activities__action">
                            <span class="admin-activities__icon"><i class="fas fa-angle-right"></i></span>
                            <span class="admin-activities__text">Ga naar activiteiten</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection