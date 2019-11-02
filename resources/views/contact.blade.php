@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'images' => [
            [
                'image' => asset('/img/banner.jpg'),
                'alt' => 'Banner',
            ],
        ],
        'page_title' => 'Contact',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            <h2>Contact</h2>
        </div>
    </div>
@endsection