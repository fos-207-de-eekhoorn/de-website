@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Bivak oude',
        'page_sub_title' => '21 tot 24 mei',
    ])
    @endcomponent

	<div class="row section">
        <div class="col-12">
            <h2>Bivak oude</h2>
            <h3>Informatie komt binnenkort!</h3>
            <p>We kunnen jullie al beloven dat het een supertof fietsweekend wordt! </p>
            <p>Verder info krijgen jullie later van jullie leiding.</p>
        </div>
    </div>
@endsection