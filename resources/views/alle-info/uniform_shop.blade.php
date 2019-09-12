@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing carousel">
        <img src="/img/banner.jpg" alt="Banner" class="carousel__banner">
    </section>

    <div class="row section">
        <div class="col-12 col-md-8">
            <h2>Uniform</h2>

            <div class="row section">
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
                    De fosshop is elke zaterdag open om 17u. Daar krijgt u meer uitleg over alle andere badges die op het uniform horen te hangen. 
                </p>
                <br>
                <p>
                    Tot dan!
                </p>
                <p>
                    Groetjes, het fosshop team.
                </p>
                <p>
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
            <h2>Shop</h2>
            <p>
                De Fosshop is elke zaterdag open vanaf 17u.
            </p>
            <br>
            <table class="table">
                <tr class="table__row">
                    <td class="table__cell">Uniformmaat 28-32</td>
                    <td class="table__cell">€35,00</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Uniform maat 34-48</td>
                    <td class="table__cell">€38,00</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">T-shirt 207e FOS “De Eekhoorn”</td>
                    <td class="table__cell">€10,00</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">T-shirt 207e FOS “De Eekhoorn”</td>
                    <td class="table__cell">€1,30</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Das</td>
                    <td class="table__cell">€10,00</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Badges welpen/gidsen-verkenners</td>
                    <td class="table__cell">€1,30</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Wolfje</td>
                    <td class="table__cell">€1,50</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Ster</td>
                    <td class="table__cell">€2,00</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Kenteken FOS Open Scouting België</td>
                    <td class="table__cell">€1,50</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Belofteteken FOS Open Scouting</td>
                    <td class="table__cell">€1,50</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Eenheidsteken</td>
                    <td class="table__cell">€2,50</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Jaarteken</td>
                    <td class="table__cell">€1,20</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Provincie "West-Vlaanderen"</td>
                    <td class="table__cell">€0,50</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Kenteken Verkenner (jongens)</td>
                    <td class="table__cell">€3,00</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Kenteken Gidsen (meisjes)</td>
                    <td class="table__cell">€3,00</td>
                </tr>
            </table>
        </div>
    </div>
@endsection