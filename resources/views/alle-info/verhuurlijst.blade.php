@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green-dark',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Verhuurlijst',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            <h2>Verhuurlijst</h2>
            <p>
                Met een scouts hebben we veel materiaal die we niet het hele jaar nodig hebben. Hier vindt je een lijst van alle materiaal die wij verhuren. Kan je iets gebruiken voor een feestje of evenement? Twijfel niet om ons te contacteren!
            </p>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <h3>Materiaal</h3>
                    <table class="table">
                        <thead>
                            <tr class="table__row">
                                <td class="table__cell">Goodies</td>
                                <td class="table__cell">Prijs/dag</td>
                                <td class="table__cell">Waarborg</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="table__row">
                                <td class="table__cell">Kommel (scheepstouw)</td>
                                <td class="table__cell">€25</td>
                                <td class="table__cell">€25</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">BBQ</td>
                                <td class="table__cell">€25</td>
                                <td class="table__cell">€25</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">100 tal borden, kommen, bestek, ...</td>
                                <td class="table__cell">€10</td>
                                <td class="table__cell">€10</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Sjorbalken (groot en klein)</td>
                                <td class="table__cell">€20</td>
                                <td class="table__cell">€100</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Seniortent</td>
                                <td class="table__cell">€50</td>
                                <td class="table__cell">€100</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Bartent</td>
                                <td class="table__cell">€50</td>
                                <td class="table__cell">€500</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Friteuse</td>
                                <td class="table__cell">€25</td>
                                <td class="table__cell">€25</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Tafels</td>
                                <td class="table__cell">€10</td>
                                <td class="table__cell">€10</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Banken</td>
                                <td class="table__cell">€10</td>
                                <td class="table__cell">€10</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Gasbekken + gasfles</td>
                                <td class="table__cell">€25</td>
                                <td class="table__cell">€25</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Alpinotent</td>
                                <td class="table__cell">€20</td>
                                <td class="table__cell">€50</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Grondzeil (rood)</td>
                                <td class="table__cell">€25</td>
                                <td class="table__cell">€25</td>
                            </tr>
                            <tr class="table__row">
                                <td class="table__cell">Grondboor</td>
                                <td class="table__cell">€10</td>
                                <td class="table__cell">€10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-12 col-lg-4">
                    <h3>Contact</h3>

                    <p>
                        Wil je iets huren of heb je een vraag? Contacteer dan één van onze materiaalmeesters.
                    </p>

                    <div class="leiding-card-list">
                        @foreach($responsibles as $leider)
                            @component('components.leiding_card', [
                                'leider' => $leider,
                            ])
                            @endcomponent
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <h3>Contact</h3>
                    <p>
                        Wil je iets huren of heb je een vraag? Contacteer dan één van onze materiaalmeesters.
                    </p>
                    <br>
                    <table class="table">
                        <tr class="table__row">
                            <td class="table__cell">
                                <b>Nandoe</b><br>
                                Bavo Lescroart
                            </td>

                            <td class="table__cell">
                                0476/29 23 00
                            </td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__cell">
                                <b>Tayra</b><br>
                                Shannen De Loof
                            </td>

                            <td class="table__cell">
                                0499/36 97 56
                            </td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__cell">
                                <b>Simoeng</b><br>
                                Maarten Van Walleghem
                            </td>

                            <td class="table__cell">
                                0491/17 51 60
                            </td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__cell">
                                <b>Gems</b><br>
                                Senne Catry
                            </td>

                            <td class="table__cell">
                                0495/19 55 20
                            </td>
                        </tr>
                        <tr class="table__row">
                            <td class="table__cell">
                                <b>Joshua Minne</b>
                            </td>

                            <td class="table__cell">
                                0494/82 62 14
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection