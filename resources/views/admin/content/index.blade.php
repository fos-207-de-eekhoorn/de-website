@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Content',
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
                'current' => 'Content',
            ])@endcomponent    
        </div>

        <div class="col-12">
            <h2>Keys</h2>
        </div>

        <ul>
            @foreach($keys as $key)
                <li>
                    <a href="{{ url('/admin/content/key/'.$key ) }}">
                        {{ $key->key }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection