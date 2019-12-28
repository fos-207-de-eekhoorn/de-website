@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Contact',
    ])
    @endcomponent

    {{-- EL --}}
    <div class="row section">
        <div class="col-12 col-md-7">
            @component('components.leiding_card', [
                'leider' => $el,
            ])
            @endcomponent
        </div>

        <div class="col-12 col-md-5">
            <div class="row">
                <div class="col-6 col-md-12">Fossa</div>
                <div class="col-6 col-md-12">Axis</div>
            </div>
        </div>
    </div>
@endsection