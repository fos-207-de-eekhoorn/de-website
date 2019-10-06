@extends('layouts.main')

@section('content')
    @component('components.carousel', [
        'images' => [
            [
                'image' => asset('/img/banner.jpg'),
                'alt' => 'Banner',
            ],
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