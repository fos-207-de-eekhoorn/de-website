@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Alle documenten',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            <h2>Documenten</h2>
        </div>
    </div>
@endsection