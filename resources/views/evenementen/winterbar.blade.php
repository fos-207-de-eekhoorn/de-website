@extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green-dark',
            'pattern' => '5',
            'strength' => 'light',
        ],
        'page_title' => 'Winterbar',
        'page_sub_title' => '22 november',
    ])
    @endcomponent

    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="evenement">
                <div class="card__content">
                    <br>
                    <p class="text--align-center">
                        ANTON, ANTON, ANTON AUS TIROL‼ 
                    </p>
                    <p class="text--align-center">
                         Ja ja, je hoort het goed, de beste scouts van Oostkamp organiseert dit jaar een spetterende Après-ski winterbar speciaal voor iedereen die zin heeft in een gezellige avond vol met veel sfeer, ambiance en LEUTE!
                    </p>
                    <br>
                    <p class="text--align-center">
                        We trakteren jullie de hele avond met de beste bands van Oostkamp en omstreken! We genieten van verschillende coverbands en van originele muziek en we sluiten af met onze eigen top dj's!
                    </p>
                    <br>
                    <p class="text--align-center">
                        Er zullen lekkere braadworsten verkocht worden om jullie honger tevreden te stellen en natuurlijk ook genoeg drankjes om de dorst lessen! 
                    </p>
                    <br>
                    <br>
                    <h3 class="text--align-center">Line-up</h3>
                    <p class="text--align-center">
                        <table class="table">
                            <tr class="table__row">
                                <td class="table__cell">Charline</td>
                                <td class="table__cell">19u15-20u30</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Master and chef</td>
                                <td class="table__cell">20u45-22u</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Speechdrops</td>
                                <td class="table__cell">22u15 -23u30</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Windkracht Light</td>
                                <td class="table__cell">23u45 -01u</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">207FM</td>
                                <td class="table__cell">01u-...</td>
                            </tr>
                        </table>
                    </p>
                    <br>
                    <br>
                    <p class="text--align-center">
                        Klinkt dit als muziek in de oren? Kom dan zeker af, neem al je vrienden mee en dan maken we er samen een warme winteravond van!
                    </p>
                    <br>
                    <br>
                    <p class="text--align-center">
                        Hopelijk tot dan!
                    </p>
                    <p class="text--align-center">
                        De leiding
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection