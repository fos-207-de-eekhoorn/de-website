@extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'salmon',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'FOS shop & uniform',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12 col-md-8">
            <h2>Uniform</h2>

            <div class="row section section--extra-small-spacing">
                <div class="col-12 col-md-5">
                    <img src="{{ asset('/img/uniform.jpg') }}" alt="Uniform">
                </div>

                <div class="col-12 col-md-7">
                    <p>
                        Net als elke andere jeugdbeweging heeft FOS Open Scouting een eigen uniform. Met het donkerblauwe hemd kan iedereen zien dat je lid bent van één en dezelfde groep. 
                    </p>
                    <p>
                        Een hemd is ook een weerspiegeling van je scoutscarrière. Met je kentekens toon je in welke tak je zit en welke vaardigheidsbadges je behaalde. De juiste plaats voor je kentekens, kan je zien op de afbeelding hieronder.
                    </p>
                    <p>
                        Het uniform is stevige speelkledij, waarin je kan ravotten en rennen, en zelfs vuil mag worden. 
                    </p>
                </div>
            </div>

            <div class="section">
                <p>
                    In onze eenheid mag je vanaf de welpentak een hemd dragen. Voor <strong>bevers</strong> volstaat het om een das en t-shirt van de eenheid te dragen.
                </p>

                <p>
                    Vanaf het eerste jaar dat je naar de <strong>welpen</strong> gaat mag je ook een uniform dragen. Je draagt naast alle andere badges ook de welpenbadge. Je kan dan ook eindelijk ook badges en sterren verdienen. Deze kunnen verdiend worden op speciale activiteiten en op kamp. Het is ook mogelijk om een wolfje te verdienen. Een wolfje verdien je door minstens 3 badges en 2 sterren te behalen. Een wolfje mag je je hele scouts carrière op je hemd laten hangen. Vanaf je naar de jonge gaat moeten de welpenbadges en sterren er helaas af. 
                </p>

                <p>
                    Maar geen nood! Ook bij de <strong>jong gids / verkenners</strong> kan je badges verdienen. Als JVG mag je ook je welpenbadge vervangen voor een jonge/oude verkenners of gidsen badge. Vanaf de jong gids / verkenners kan je ook beginnen aan je teervoet. De teervoet is een badge waarvoor 50 verschillende opdrachten uitgevoerd moeten worden. Deze badge is een hele grote eer en mag voor altijd op je scoutshemd blijven hangen!
                </p>

                <p>
                    Wanneer je overgaat naar de <strong>oud gids / verkenners</strong> gaan alle jonge-badges er weer af en kan je met een schone lei beginnen. Je kan nieuwe badges verdienen en verder werken aan je teervoet. 
                </p>

                <p>
                    {{-- De fosshop is elke zaterdag open om 17u. Daar krijgt u meer uitleg over alle andere badges die op het uniform horen te hangen.  --}}
                    Normaal gezien is de fosshop elke zaterdag open vanaf 17u. Omwille van corona kunnen we echter niet met zekerheid zeggen dat de fosshop elke week open zal zijn. Mondmasker is verplicht, alcoholische handgel om te desinfecteren is voorzien. Contacteer ons bij vragen gerust via <a href="mailto:eekhoorn.fosshop@gmail.com">eekhoorn.fosshop@gmail.com</a>.
                </p>

                <p>
                    Tot dan!<br>
                    Groetjes, het fosshop team.<br>
                    Nandoe, Chigi, Grizzly
                </p>
            </div>

            <div class="row align-items-center section">
                <div class="col-12 col-md-5">
                    <img src="{{ asset('/img/uniform-toelichting.png') }}" alt="Toelichting uniform">
                </div>
                

                <div class="col-12 col-md-7">
                    <ol>
                        <li>Kenteken van FOS Open Scouting</li>
                        <li>Provinciebandje</li>
                        <li>Eenheidskenteken</li>
                        <li>Jaarkenteken</li>
                        <li>Belofte-kenteken</li>
                        <li>Teervoet</li>
                        <li>Welpenbadge, jong gids / JVG badge / OVG badge</li>
                        <li>Kenteken België</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="section">
                <h2>Shop</h2>

                <p class="medium-margin-bottom">
                    {{-- De Fosshop is elke zaterdag open vanaf 17u. --}}
                    Normaal gezien is de fosshop elke zaterdag open vanaf 17u. Omwille van corona kunnen we echter niet met zekerheid zeggen dat de fosshop elke week open zal zijn. Mondmasker is verplicht, alcoholische handgel om te desinfecteren is voorzien. Contacteer ons bij vragen gerust via <a href="mailto:eekhoorn.fosshop@gmail.com">eekhoorn.fosshop@gmail.com</a>.
                </p>

                <table class="table">
                    <tr class="table__row">
                        <td class="table__cell">Uniformmaat 28-32</td>
                        <td class="table__cell"><span class="text--unit">€</span>35,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Uniform maat 34-48</td>
                        <td class="table__cell"><span class="text--unit">€</span>38,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">T-shirt 207e FOS “De Eekhoorn” Kindermaten</td>
                        <td class="table__cell"><span class="text--unit">€</span>10,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">T-shirt 207e FOS “De Eekhoorn” Volwassen maten</td>
                        <td class="table__cell"><span class="text--unit">€</span>15,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Das</td>
                        <td class="table__cell"><span class="text--unit">€</span>10,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Badges welpen/gidsen-verkenners</td>
                        <td class="table__cell"><span class="text--unit">€</span>1,30</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Wolfje</td>
                        <td class="table__cell"><span class="text--unit">€</span>1,50</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Ster</td>
                        <td class="table__cell"><span class="text--unit">€</span>2,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Kenteken FOS Open Scouting België</td>
                        <td class="table__cell"><span class="text--unit">€</span>1,50</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Belofteteken FOS Open Scouting</td>
                        <td class="table__cell"><span class="text--unit">€</span>1,50</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Eenheidsteken</td>
                        <td class="table__cell"><span class="text--unit">€</span>2,50</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Jaarteken</td>
                        <td class="table__cell"><span class="text--unit">€</span>1,20</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Provincie "West-Vlaanderen"</td>
                        <td class="table__cell"><span class="text--unit">€</span>0,50</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Kenteken Verkenner (jongens)</td>
                        <td class="table__cell"><span class="text--unit">€</span>3,00</td>
                    </tr>
                    <tr class="table__row">
                        <td class="table__cell">Kenteken Gidsen (meisjes)</td>
                        <td class="table__cell"><span class="text--unit">€</span>3,00</td>
                    </tr>
                </table>
            </div>

            <div class="section">
                <h3>Contact</h3>

                <p>
                    Wil je iets huren of heb je een vraag? Contacteer dan één van onze FOS shop verantwoordelijke.
                </p>

                <div class="leiding-card-list">
                    @foreach($responsibles as $leider)
                        @component('components.leiding_card', [
                            'leider' => $leider,
                            'titel' => 'FOS shop verantwoordelijke',
                        ])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection