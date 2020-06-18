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
                <h2>Algemene info</h2>

                <p>
                    Wegens de ontwikkeling van COVID-19 moeten we ons kamp anders indelen dan anders.<br>
                    De bevers en oude gaan niet naar de geplande kampplaats.<br>
                    Alle concrete info vind u hieronder.
                </p>

                <p>
                    Hier is zeker nog eens al de informatie die je nodig hebt in een documentje:<br>
                    <a href="{{ asset('/docs/Info_kamp.pdf') }}" target="_blank"><span class="fa--before icon"><i class="fas fa-file-pdf"></i></span>Info_kamp.pdf</a>
                </p>
            </div>

            <div class="section section--extra-small-spacing">
                <h4>Fosshop</h4>
                <p>
                    Indien uw zoon/dochter nog zaken uit de fosshop nodig heeft voor kamp, kan u dit document invullen en doorsturen naar <a href="mailto:eekhoorn.fosshop@gmail.com">eekhoorn.fosshop@gmail.com</a>. Dit ten laatste tegen <strong>8 juli</strong>.
                </p>
                <p>
                    Verdere info kan u terugvinden in het document.<br>
                    <a href="{{ asset('/docs/Bestelformulier-FOSSHOP.pdf') }}" target="_blank"><span class="fa--before icon"><i class="fas fa-file-pdf"></i></span>Info_kamp.pdf</a><br>
                    <a href="{{ asset('/docs/Bestelformulier-FOSSHOP.docx') }}" target="_blank"><span class="fa--before icon"><i class="fas fa-file-word"></i></span>Info_kamp.pdf</a>
                </p>
            </div>
        </div>
    </section>

    <div class="tabs section">
        <nav class="tabs__nav">
            <ul class="tabs__list">
                <li class="tabs__nav-item" onclick="openTab($(this), 'Bevers')">Bevers</li>
                <li class="tabs__nav-item" onclick="openTab($(this), 'Welpen')">Welpen</li>
                <li class="tabs__nav-item" onclick="openTab($(this), 'Jonge')">JG/V's</li>
                <li class="tabs__nav-item" onclick="openTab($(this), 'Oude')">OG/V's</li>
            </ul>
        </nav>

        <div class="tabs__content">
            <section id="Bevers" class="tabs__section active">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 section section--small-spacing text--align-left">
                        <h4 class="text-color--dark">
                            <span class="fa--before icon"><i class="fas fa-suitcase"></i></span>
                            Je valies
                        </h4>

                        <ul>
                            <li>Eigen mondmaskers</li>
                            <li>Pampers (indien nodig)</li>
                            <li>8 onderbroeken</li>
                            <li>8 onderhemdjes</li>
                            <li>8 paar kousen</li>
                            <li>6 lange en/of korte broeken</li>
                            <li>8 T-shirts</li>
                            <li>4 truien</li>
                            <li>2 pyjama’s</li>
                            <li>Slaapzak, matje, kussen, knuffel</li>
                            <li>Regenjas en gewone jas</li>
                            <li>Laarzen</li>
                            <li>Stevige wandelschoenen</li>
                            <li>1 paar extra schoenen</li>
                            <li>Pantoffels</li>
                            <li>Toiletzak met, douchegel, shampoo, tandenborstel, tandpasta, bekertje, borstel, zonnecrème, rekkertjes…</li>
                            <li>3 kleine handdoeken</li>
                            <li>6 washandjes</li>
                            <li>1 grote handdoek</li>
                            <li>Vuile waszak </li>
                            <li>Dagrugzakje met drinkflesje</li>
                            <li>Zwemgerief</li>
                            <li>Balkleren (mooie kleren in apart zakje)</li>
                            <li>T-shirt van FOS en das.</li>
                            <li>Zaklamp</li>
                            <li>Wasknijpers</li>
                            <li>Zakdoeken</li>
                            <li>Adressen en geld om een postkaartje op te sturen</li>
                            <li>Een drinkbus met je naam op</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-8 section section--small-spacing">
                        <div class="row">
                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>
                                    Wanneer
                                </h4>

                                <p>
                                    Zondag <strong>26 juli</strong><br>
                                    -<br>
                                    Donderdag <strong>30 juli</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-map-marker-alt"></i></span>
                                    Waar
                                </h4>

                                <p>
                                    Lodewijk Coiseaukaai 11d​<br>
                                    8000 Brugge
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-euro-sign"></i></span>
                                    Prijs
                                </h4>

                                <p>
                                    De prijs voor ons kamp is €75.
                                </p>
                                <p>
                                    Inschrijven doe je door te storten <strong class="no-wrap">BE27 9730 9297 8473</strong>.
                                </p>
                                <p>
                                    Gebruik als vermelding: <i class="no-wrap"><strong>naam kind + Bever</strong></i>
                                </p>
                                <p>
                                    Eerste kind betaal je €75, voor het tweede kind betaal je €70, voor het derde kind €65 etc.
                                </p>
                                <p>
                                    Deadline: <strong>8 juli</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--blue">
                                    <span class="fa--before icon"><i class="fas fa-suitcase"></i></span>
                                    Valies ordenen
                                </h4>

                                <p>
                                    Het is gemakkelijker voor uw kind en ons als alles mooi klaar zit per dag in de valies, zo kunnen ze vlot en goed aan de dag beginnen.
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-arrival"></i></span>
                                    Aankomst op de kampplaats
                                </h4>

                                <p>
                                    We spreken af op de kampplaats zelf.<br>
                                    Het exacte uur zal nog gecommuniceerd worden.
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-departure"></i></span>
                                    Vertrek van de kampplaats
                                </h4>

                                <p>
                                    U kan uw kleine spruit terug komen ophalen op de kampplaats zelf.<br>
                                    Het exacte uur zal nog gecommuniceerd worden.
                                </p>
                            </div>

                            <div class="col-12 section section--small-spacing">
                                <h4 class="text-color--green-dark">
                                    <span class="fa--before icon"><i class="fas fa-check"></i></span>
                                    De beverwet
                                </h4>

                                <p>
                                    <i>Als bever speel ik samen met de andere bevers.<br>
                                    Ik ben eerlijk, vriendelijk en hou vol.</i>
                                </p>

                                <p>
                                    Zoals de traditie het voorschrijft wordt er elke dag een bever van de dag verkozen. Dat is een bever die zich de dag voordien super goed heeft ingezet tijdens de spellen en boven de groep uitsprong. Deze bever mag dan de volgende dag zijn/haar beverwet opzeggen bij de leiding. Het is dus aangeraden om deze op voorhand al eens te bekijken.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Welpen" class="tabs__section">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 section section--small-spacing text--align-left">
                        <h4 class="text-color--dark">
                            <span class="fa--before icon"><i class="fas fa-suitcase"></i></span>
                            Je valies
                        </h4>

                        <ul>
                            <li>Eigen mondmaskers</li>
                            <li>12 onderbroeken</li>
                            <li>12 paar kousen</li>
                            <li>3 – 5 korte broeken</li>
                            <li>2 – 3 lange broeken</li>
                            <li>7 - 10 T-shirts</li>
                            <li>4 truien</li>
                            <li>2 pyjama’s</li>
                            <li>Slaapzak, matje, kussen, knuffel</li>
                            <li>Regenjas en gewone jas</li>
                            <li>Laarzen</li>
                            <li>Stevige wandelschoenen</li>
                            <li>1 paar extra schoenen</li>
                            <li>Pantoffels</li>
                            <li>Toiletzak met douchegel, shampoo, tandenborstel, tandpasta, bekertje, borstel, zonnecrème, rekkertjes…</li>
                            <li>3 kleine handdoeken</li>
                            <li>6 washandjes</li>
                            <li>1 grote handdoek</li>
                            <li>Vuile waszak</li>
                            <li>Dagrugzakje met drinkflesje</li>
                            <li>Zaklamp</li>
                            <li>Wasknijpers</li>
                            <li>Zakdoeken</li>
                            <li>Adressen en geld om postkaartje op te sturen.</li>
                            <li>Zwemgerief</li>
                            <li>Balkledij (in apart zakje)</li>
                            <li>UNIFORM EN DAS</li>
                            <li>Een drinkbus met naam op</li>
                            <li>3 witte T-shirts</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-8 section section--small-spacing">
                        <div class="row">
                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>
                                    Wanneer
                                </h4>

                                <p>
                                    Woensdag <strong>22 juli</strong><br>
                                    -<br>
                                    Zaterdag <strong>1 augustus</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-map-marker-alt"></i></span>
                                    Waar
                                </h4>

                                <p>
                                    Bronnenweg 10<br>
                                    1755 Gooik
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-euro-sign"></i></span>
                                    Prijs
                                </h4>

                                <p>
                                    De prijs voor ons kamp is €150.
                                </p>
                                <p>
                                    Inschrijven doe je door te storten <strong class="no-wrap">BE27 9730 9297 8473</strong>.
                                </p>
                                <p>
                                    Gebruik als vermelding: <i class="no-wrap"><strong>naam kind + Welp</strong></i>
                                </p>
                                <p>
                                    Eerste kind betaal je €150, voor het tweede kind betaal je €145, voor het derde kind €140 etc.
                                </p>
                                <p>
                                    Deadline: <strong>8 juli</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-6 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-arrival"></i></span>
                                    Aankomst op de kampplaats
                                </h4>

                                <p>
                                    We spreken op <strong>woensdag 22/07</strong> af op de kampplaats zelf. Het is de bedoeling dat u uw zoon / dochter zelf brengt. Het concrete uur zal nog worden meegedeeld.
                                <p>
                                </p>
                                    <span class="fa--before icon"><i class="fas fa-exclamation"></i></span>Er mag gecarpoold worden als er enkel kinderen uit dezelfde tak in de auto zitten. Een broer & zus (uit verschillende tak) mogen samen op kamp vertrekken maar een extra kindje er bij mag niet.
                                </p>
                            </div>

                            <div class="col-12 col-md-6 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-departure"></i></span>
                                    Vertrek van de kampplaats
                                </h4>

                                <p>
                                    <strong>Maandag 01/08</strong> mag u uw kleine spruit terug komen ophalen op de kampplaats. Het concrete uur zal nog worden meegedeeld.
                                </p>
                            </div>

                            <div class="col-12 section section--small-spacing">
                                <h4 class="text-color--green-dark">
                                    <span class="fa--before icon"><i class="fas fa-check"></i></span>
                                    De welpenwet
                                </h4>

                                <p>
                                    <i>Als welp speel ik samen met de anderen in de jungle.<br>
                                    Ik luister naar de oudere wolven.<br>
                                    Ik ben eerlijk, vriendelijk en hou vol.</i>
                                </p>

                                <p>
                                    Zoals de traditie het voorschrijft wordt er elke dag een welp van de dag verkozen. Dat is een welp die zich de dag voordien super goed heeft ingezet tijdens de spellen en boven de groep uitsprong. Deze welp mag dan de volgende dag zijn/haar welpenwet opzeggen bij de leiding. Het is dus aangeraden om deze op voorhand al eens te bekijken.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Jonge" class="tabs__section">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 section section--small-spacing text--align-left">
                        <h4 class="text-color--dark">
                            <span class="fa--before icon"><i class="fas fa-suitcase"></i></span>
                            Je valies
                        </h4>

                        <p>
                            De meesten onder jullie weten intussen al wat er in hun valies moet, maar voor diegene die niet willen vergeten kan je dit lijstje gebruiken.
                        </p>

                        <ul>
                            <li>Eigen mondmaskers</li>
                            <li>12 onderbroeken</li>
                            <li>12 paar kousen</li>
                            <li>Zwemgerief</li>
                            <li>Balkledij (in apart zakje)</li>
                            <li>UNIFORM EN DAS</li>
                            <li>3 – 5 korte broeken</li>
                            <li>2 – 3 lange broeken</li>
                            <li>7-10 T-shirts</li>
                            <li>4 truien</li>
                            <li>2 pyjama’s</li>
                            <li>Slaapzak, matje, kussen, knuffel</li>
                            <li>Regenjas en gewone jas</li>
                            <li>Laarzen</li>
                            <li>Stevige wandelschoenen</li>
                            <li>1 paar extra schoenen</li>
                            <li>Pantoffels</li>
                            <li>Toiletzak met douchegel, shampoo, tandenborstel, tandpasta, bekertje, borstel, zonnecrème, rekkertjes…</li>
                            <li>3 kleine handdoeken</li>
                            <li>6 washandjes</li>
                            <li>1 grote handdoek</li>
                            <li>Vuile waszak</li>
                            <li>Dagrugzakje met drinkflesje </li>
                            <li>Zaklamp</li>
                            <li>Wasknijpers</li>
                            <li>Zakdoeken</li>
                            <li>Adressen en geld om postkaartje op te sturen.</li>
                            <li>Zakmes (grootte evenredig met verantwoordelijkheidsgevoel)</li>
                            <li>Gamel, beker en bestek</li>
                            <li>Een drinkbus met naam op</li>
                            <li>TREKRUGZAK</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-8 section section--small-spacing">
                        <div class="row">
                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>
                                    Wanneer
                                </h4>

                                <p>
                                    Woensdag <strong>22 juli</strong><br>
                                    -<br>
                                    Maandag <strong>1 augustus</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-map-marker-alt"></i></span>
                                    Waar
                                </h4>

                                <p>
                                    Bronnenweg 10<br>
                                    1755 Gooik
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-euro-sign"></i></span>
                                    Prijs
                                </h4>

                                <p>
                                    De prijs voor ons kamp is €150.
                                </p>
                                <p>
                                    Inschrijven doe je door te storten <strong class="no-wrap">BE27 9730 9297 8473</strong>.
                                </p>
                                <p>
                                    Gebruik als vermelding: <i class="no-wrap"><strong>naam kind + JG/V</strong></i>
                                </p>
                                <p>
                                    Eerste kind betaalt volle pot (€150), tweede kind €5 korting (€145), derde kind €10 korting (€140) etc.
                                </p>
                                <p>
                                    Deadline: <strong>8 juli</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-6 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-arrival"></i></span>
                                    Aankomst op de kampplaats
                                </h4>

                                <p>
                                    We spreken op <strong>woensdag 22/07</strong> af op de kampplaats zelf. Het is de bedoeling dat u uw zoon / dochter zelf brengt. Het concrete uur zal nog worden meegedeeld.
                                <p>
                                </p>
                                    <span class="fa--before icon"><i class="fas fa-exclamation"></i></span>Er mag gecarpoold worden als er enkel kinderen uit dezelfde tak in de auto zitten. Een broer & zus (uit verschillende tak) mogen samen op kamp vertrekken maar een extra kindje er bij mag niet.
                                </p>
                            </div>

                            <div class="col-12 col-md-6 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-departure"></i></span>
                                    Vertrek van de kampplaats
                                </h4>

                                <p>
                                    <strong>Maandag 01/08</strong> mag u uw kleine spruit terug komen ophalen op de kampplaats. Het concrete uur zal nog worden meegedeeld.
                                </p>
                            </div>

                            <div class="col-12 section section--small-spacing">
                                <h4 class="text-color--green-dark">
                                    <span class="fa--before icon"><i class="fas fa-check"></i></span>
                                    De wet
                                </h4>

                                <ul>
                                    <li>Een scouts / gids is eerlijk. </li>
                                    <li>Een scouts / gids eerbiedigt de overtuiging van anderen. </li>
                                    <li>Een scouts / gids maakt zich nuttig. </li>
                                    <li>Een scouts / gids is een vriend van allen. </li>
                                    <li>Een scouts / gids is vriendelijk en hoffelijk. </li>
                                    <li>Een scouts / gids kan gehoorzamen. </li>
                                    <li>Een scouts / gids staat open voor de natuur en is milieubewust. </li>
                                    <li>Een scouts / gids houdt vol. </li>
                                    <li>Een scouts / gids is ijverig. </li>
                                    <li>Een scouts / gids is zelfbewust en heeft eerbied voor zichzelf en anderen.</li>
                                </ul>

                                <p>
                                    Zoals de traditie het voorschrijft wordt er elke dag een scouts / gids van de dag verkozen. Dat is een scouts / gids die zich de dag voordien super goed heeft ingezet tijdens de spellen en boven de groep uitsprong. Deze scouts / gids mag dan de volgende dag zijn/haar wet opzeggen bij de leiding. Het is dus aangeraden om deze op voorhand al eens te bekijken.
                                </p>
                            </div>

                            <div class="col-12 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-check"></i></span>
                                    Belofte (overgang JG/V naar OG/V)
                                </h4>

                                <p>
                                    Ik beloof te trachten: goed samen te werken in de groep; te leven naar scouts-en gidsenwet en mijn overtuiging; anderen te helpen waar ik kan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="Oude" class="tabs__section">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 section section--small-spacing text--align-left">
                        <h4 class="text-color--dark">
                            <span class="fa--before icon"><i class="fas fa-suitcase"></i></span>
                            Je valies
                        </h4>

                        <p>
                            De meesten onder jullie weten intussen al wat er in hun valies moet, maar voor diegene die niet willen vergeten kan je dit lijstje gebruiken.
                        </p>

                        <ul>
                            <li>Eigen mondmaskers</li>
                            <li>12 onderbroeken</li>
                            <li>12 paar kousen</li>
                            <li>Zwemgerief</li>
                            <li>Balkledij (in apart zakje)</li>
                            <li>UNIFORM EN DAS</li>
                            <li>3 – 5 korte broeken</li>
                            <li>2 – 3 lange broeken</li>
                            <li>7-10 T-shirts</li>
                            <li>4 truien</li>
                            <li>2 pyjama’s</li>
                            <li>Slaapzak, matje, kussen, knuffel</li>
                            <li>Regenjas en gewone jas</li>
                            <li>Laarzen</li>
                            <li>Stevige wandelschoenen</li>
                            <li>1 paar extra schoenen</li>
                            <li>Pantoffels</li>
                            <li>Toiletzak met douchegel, shampoo, tandenborstel, tandpasta, bekertje, borstel, zonnecrème, rekkertjes…</li>
                            <li>3 kleine handdoeken</li>
                            <li>6 washandjes</li>
                            <li>1 grote handdoek</li>
                            <li>Vuile waszak</li>
                            <li>Dagrugzakje met drinkflesje </li>
                            <li>Zaklamp</li>
                            <li>Wasknijpers</li>
                            <li>Zakdoeken</li>
                            <li>Adressen en geld om postkaartje op te sturen.</li>
                            <li>Zakmes (grootte evenredig met verantwoordelijkheidsgevoel)</li>
                            <li>Gamel, beker en bestek</li>
                            <li>Een drinkbus met naam op</li>
                            <li>TREKRUGZAK</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-8 section section--small-spacing">
                        <div class="row">
                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>
                                    Wanneer
                                </h4>

                                <p>
                                    Dinsdag <strong>21 juli</strong><br>
                                    -<br>
                                    Vrijdag <strong>31 juli</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-map-marker-alt"></i></span>
                                    Waar
                                </h4>

                                <p>
                                    Hier, daar en nergens.
                                </p>
                            </div>

                            <div class="col-12 col-md-4 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-euro-sign"></i></span>
                                    Prijs
                                </h4>

                                <p>
                                    De prijs voor ons kamp is €150.
                                </p>
                                <p>
                                    Inschrijven doe je door te storten <strong class="no-wrap">BE27 9730 9297 8473</strong>.
                                </p>
                                <p>
                                    Gebruik als vermelding: <i class="no-wrap"><strong>naam kind + OG/V</strong></i>
                                </p>
                                <p>
                                    Eerste kind betaalt volle pot (€150), tweede kind €5 korting (€145), derde kind €10 korting (€140) etc.
                                </p>
                                <p>
                                    Deadline: <strong>8 juli</strong>
                                </p>
                            </div>

                            <div class="col-12 col-md-6 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-arrival"></i></span>
                                    Vertrek met de trein aan het station
                                </h4>

                                <p>
                                    Info volgt.
                                </p>
                            </div>

                            <div class="col-12 col-md-6 section section--small-spacing">
                                <h4 class="text-color--dark">
                                    <span class="fa--before icon"><i class="fas fa-plane-departure"></i></span>
                                    Aankomst terug aan het station
                                </h4>

                                <p>
                                    Info volgt.
                                </p>
                            </div>

                            <div class="col-12 section section--small-spacing">
                                <h4 class="text-color--green-dark">
                                    <span class="fa--before icon"><i class="fas fa-check"></i></span>
                                    De wet
                                </h4>

                                <ul>
                                    <li>Een scouts / gids is eerlijk. </li>
                                    <li>Een scouts / gids eerbiedigt de overtuiging van anderen. </li>
                                    <li>Een scouts / gids maakt zich nuttig. </li>
                                    <li>Een scouts / gids is een vriend van allen. </li>
                                    <li>Een scouts / gids is vriendelijk en hoffelijk. </li>
                                    <li>Een scouts / gids kan gehoorzamen. </li>
                                    <li>Een scouts / gids staat open voor de natuur en is milieubewust. </li>
                                    <li>Een scouts / gids houdt vol. </li>
                                    <li>Een scouts / gids is ijverig. </li>
                                    <li>Een scouts / gids is zelfbewust en heeft eerbied voor zichzelf en anderen.</li>
                                </ul>

                                <p>
                                    Zoals de traditie het voorschrijft wordt er elke dag een scouts / gids van de dag verkozen. Dat is een scouts / gids die zich de dag voordien super goed heeft ingezet tijdens de spellen en boven de groep uitsprong. Deze scouts / gids mag dan de volgende dag zijn/haar wet opzeggen bij de leiding. Het is dus aangeraden om deze op voorhand al eens te bekijken.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="row section">
        <div class="col-12 col-md-4 section">
            <h4 class="text-color--dark">
                <span class="fa--before icon"><i class="fas fa-star-of-life"></i></span>
                Medicatie & Siskaart / <span class="no-wrap">KIDS-ID</span>.
            </h4>

            <p>
                <strong>Siskaart of KIDS-ID afgeven aan de takleider.</strong>
            <p>
            </p>
                Indien uw kind medicatie neemt, verwittig de leiding en geef de dosis door aan de takleider.<br>
                Kenteken alle kledij en medicatie.<br>
                Medicatie moet in een apart afgesloten zakje worden meegegeven.
            <p>
            </p>
                <span class="fa--before icon"><i class="fas fa-exclamation"></i></span>Wij mogen <strong>enkel medicatie geven</strong> indien er <strong>een doktersvoorschrift is</strong>, geef hier dus zeker <strong>een kopie</strong> van mee.
            </p>
        </div>

        <div class="col-12 col-md-4 section">
            <h4 class="text-color--dark">
                <span class="fa--before icon"><i class="fas fa-notes-medical"></i></span>
                Medische fiche
            </h4>

            <p>
                Voor het kamp zal er opnieuw een medische fiche moeten ingevuld worden waarop alles vermeld zal moeten staan. We hebben elke medisch detail nodig. Vanaf er symptomen zijn van gelijk welke ziekte kan uw zoon/dochter naar huis gestuurd worden, tenzij deze regelmatig voorkomen en vermeld staan in de medische fiche.
            </p>
        </div>

        <div class="col-12 col-md-4 section">
            <h4 class="text-color--dark">
                <span class="fa--before icon"><i class="fas fa-viruses"></i></span>
                Ziekte / risicogroep
            </h4>

            <p>
                Indien uw zoon/dochter in de 5 dagen voor kamp ziek is geweest mag hij/zij helaas niet deelnemen aan het kamp. Als uw zoon/dochter tot de risicogroep behoort moet schriftelijke toestemming worden gegeven van de ouders & eventueel een arts bij een medische aandoening.
            </p>
        </div>

        <div class="col-12 col-md-4 section">
            <h4 class="text-color--red">
                <span class="fa--before icon"><i class="fas fa-exclamation-triangle"></i></span>
                Wat neem je zeker niet mee?
            </h4>

            <p>
                Een nintendo, PSP, iPod, iPhone, iPad of andere elektronische stufjes. Speelgoed, zakgeld, snoep en frisdrank zijn ook niet toegestaan. Zien we die toch dan nemen we deze af en krijg je die na het kamp terug. Een strip of boekje mag wel mee voor tijdens de siësta.
            </p>
        </div>

        <div class="col-12 col-md-4 section">
            <h4 class="text-color--brown">
                <span class="fa--before icon"><i class="fas fa-truck-moving"></i></span>
                Valiezenkoers
                <span class="fa--after icon"><i class="fas fa-times"></i></span>
            </h4>

            <p>
                Er zal dit jaar <strong>geen</strong> valiezenkoers zijn aangezien u uw zoon/dochter zelf naar de kampplaats brengt en dan de bagage dus kan meebrengen. Wij rekenen er op dat u zelf een luizencontrole uitvoert bij uw zoon/dochter. De medische fiche moet u dit jaar afgeven bij aankomst op de kampplaats.
            </p>
        </div>

        <div class="col-12 col-md-4 section">
            <h4 class="text-color--brown">
                <span class="fa--before icon"><i class="fas fa-hand-sparkles"></i></span>
                Ouderbezoekdag
                <span class="fa--after icon"><i class="fas fa-times"></i></span>
            </h4>

            <p>
                Door de coronamaatregelen die wij dit kamp moeten nemen zal er helaas <strong>geen</strong> OBD kunnen plaatsvinden.
            </p>
        </div>
    </section>

    <section class="row section">
        <div class="col-12 section section--small-spacing">
            <h2 class="text--align-center">Heb je nog vragen?</h2>
            <p class="text--align-center">
                Aarzal niet de takleiding te contacteren.
            </p>

            <p class="text--align-center">
                Hier is zeker nog eens al de informatie die je nodig hebt in een documentje:<br>
                <a href="{{ asset('/docs/Info_kamp.pdf') }}" target="_blank"><span class="fa--before icon"><i class="fas fa-file-pdf"></i></span>Info_kamp.pdf</a>
            </p>
        </div>

        <div class="col-12 col-md-6 section section--small-spacing">
            <div class="leiding-card-list">
                @component('components.leiding_card', [
                    'leider' => $takleiders[0],
                    'titel' => 'Takleider Bevers'
                ])
                @endcomponent
            </div>
        </div>

        <div class="col-12 col-md-6 section section--small-spacing">
            <div class="leiding-card-list">
                @component('components.leiding_card', [
                    'leider' => $takleiders[1],
                    'titel' => 'Takleider Welpen'
                ])
                @endcomponent
            </div>
        </div>

        <div class="col-12 col-md-6 section section--small-spacing">
            <div class="leiding-card-list">
                @component('components.leiding_card', [
                    'leider' => $takleiders[2],
                    'titel' => 'Takleider JG/V\'s'
                ])
                @endcomponent
            </div>
        </div>

        <div class="col-12 col-md-6 section section--small-spacing">
            <div class="leiding-card-list">
                @component('components.leiding_card', [
                    'leider' => $takleiders[3],
                    'titel' => 'Takleider OG/V\'s'
                ])
                @endcomponent
            </div>
        </div>
    </section>



    <script>
        var $tabsNavItem,
            $tabsSection;

        $tabsNavItem = $('.tabs__nav-item');
        $tabsSection = $('.tabs__section');

        function openTab($this, tab) {
            $tabsNavItem.removeClass('active');
            $tabsSection.hide();

            $('#' + tab).show();
            $this.addClass('active');
        }

        $tabsNavItem[0].click();
    </script>
@endsection