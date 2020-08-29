@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Admin',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            <h2 class="text--align-center">Modules</h2>
        </div>

        <div class="col-12 col-md-4">
            <a href="{{ url('/admin/activiteiten') }}" class="admin-module">
                <h3>Activiteiten</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-dice"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4">
            <a href="{{ url('/admin/inschrijvingen') }}" class="admin-module">
                <h3>Inschrijvingen</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4">
            <div class="admin-module admin-module--coming-soon">
                <h3>Evenementen</h3>
                <div class="admin-module__icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>
    </div>
@endsection