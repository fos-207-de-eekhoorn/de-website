@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'images' => [
            [
                'image' => asset('/img/evenementen/Banner-evenementen-achtergrond.png'),
                'alt' => '',
            ],
        ],
        'page_title' => 'Alle evenementen',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
        	<h2>Alle evenementen</h2>
        </div>
    </div>
@endsection