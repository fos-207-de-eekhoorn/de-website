@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'yellow',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Bivak oude',
        'page_sub_title' => 'Afgelast',
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-5">
            <h2 class="text--align-center">
                Met spijt moeten wij meedelen
            </h2>

            <h4 class="text--align-center">
                Dat ons bivak van de JG/V's is afgelast wegens het coronavirus.

                Voor meer informatie kan je steeds terecht bij de takleiding van uw kind.
            </h4>

            <div class="leiding-card-list">
                @foreach($takleiders as $leider)
                    @component('components.leiding_card', [
                        'leider' => $leider,
                    ])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
    {{--
	<div class="row section">
        <div class="col-12">
            <h2>Bivak oude</h2>
            <h3>Informatie komt binnenkort!</h3>
            <p>We kunnen jullie al beloven dat het een supertof fietsweekend wordt! </p>
            <p>Verder info krijgen jullie later van jullie leiding.</p>
        </div>
    </div>
    --}}
@endsection