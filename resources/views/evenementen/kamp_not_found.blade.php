    @extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Kamp',
    ])
    @endcomponent

    <section class="row justify-content-center section">
        <div class="col-12 col-md-4 d-none d-md-block">
            <img src="{{ asset('/img/kamp.png') }}" alt="Kamp plaats">
        </div>

        <div class="col-12 col-md-8 align-self-center">
            <div class="section section--extra-small-spacing">
                <h2>Wij hebben nog geen kamp pagina aangemaakt voor het jaar {{ $year }}.</h2>

                <p>
                    Als je hier toch meer informatie over wilt, kan je altijd de eenheidsleiding bereiken.
                </p>
            </div>

            <div class="section section--extra-small-spacing">
                <div class="row">
                    <div class="col-12 col-md-8">
                        @component('components.leiding_card', [
                            'leider' => $el,
                            'email_overwrite' => 'fos207ste@gmail.com',
                        ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection