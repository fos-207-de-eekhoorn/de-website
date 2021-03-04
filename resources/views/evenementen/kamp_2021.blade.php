    @extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Kamp '.$year,
    ])
    @endcomponent



    <section class="row justify-content-center section">
        <div class="col-12 col-md-4 d-none d-md-block">
            <img src="{{ asset('/img/kamp.png') }}" alt="Kamp plaats">
        </div>

        <div class="col-12 col-md-8 align-self-center">
            <div class="section section--extra-small-spacing">
                <h2><span class="no-wrap">20-29</span> juli (<span class="no-wrap">25-29</span> juli voor de bevers)</h2>

                <p>
                    Het zomerkamp gaat door van 20-29 juli in Grobbendonk. Voor de bevers start het kamp op de 25ste.
                </p>

                <p>
                    Het is nog onzeker in welke vorm de kampen zullen doorgaan, maar de data zal hetzelfde blijven. Ook over ouderbezoekdag is alles nog onzeker. We informeren jullie hier tijdig over.
                </p>
            </div>
        </div>
    </section>
@endsection