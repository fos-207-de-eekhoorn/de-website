@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Jeugdwerkregels werkjaar i.v.m. covid-19',
    ])
    @endcomponent
    <div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-4">
                    <h4>Fases</h4>

                    <p>
                        <a href="#Groene fase"><span class="fa--before text-color--corona-green"><i class="fas fa-circle"></i></span>Groene fase</a><br>
                        <a href="#Gele fase"><span class="fa--before text-color--corona-yellow"><i class="fas fa-circle"></i></span>Gele fase</a><br>
                        <a href="#Oranje fase"><span class="fa--before text-color--corona-orange"><i class="fas fa-circle"></i></span>Oranje fase</a><br>
                        <a href="#Rode fase"><span class="fa--before text-color--corona-red"><i class="fas fa-circle"></i></span>Rode fase</a>
                    </p>
                </div>

                <div class="col-8">
                    @component('components.current_fase', [
                        'with_link' => 0,
                    ])@endcomponent 
                </div>
            </div>
        </div>
    </div>

    {{-- Groene fase --}}
    <div class="row justify-content-center section" id="Groene fase">
        <div class="col-12 col-md-8">
            <h2><span class="fa--before text-color--corona-green"><i class="fas fa-circle"></i></span>Groene fase</h2>

            <div class="row">
                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Voor wie?</h3>

                    <p>
                        In de groene fase kan iedereen deelnemen aan de activiteiten, ook de mensen die tot de risicogroep behoren voor COVID-19.
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Organisatie</h3>

                    <p>
                        Alle activiteiten kunnen plaatsvinden volgens de normale manier van werken.
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Hygiëne</h3>

                    <p>
                        We blijven aandachtig voor het wassen van de handen.
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Activiteiten</h3>

                    <p>
                        Alle activiteiten gaan in de groene fase door zoals gepland, er zijn geen belemmeringen.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Gele fase --}}
    <div class="row justify-content-center section" id="Gele fase">
        <div class="col-12 col-md-8">
            <h2><span class="fa--before text-color--corona-yellow"><i class="fas fa-circle"></i></span>Gele fase</h2>

            <div class="row">
                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Voor wie?</h3>

                    <p>
                        Tijdens de gele fase zijn er enkele belangrijke basisregels voor wie naar de acitviteiten mag komen:
                    </p>

                    <ul>
                        <li>Behoort een deelnemer tot een risicogroep? Dan mag die meedoen aan de activiteit als hij toestemming heeft van de ouders, voogd (bij chronische ziektes onder controle door medicatie) of mits toestemming van de huisarts.</li>
                        <li>Was je ziek vóór de start (minimaal 3 dagen symptoomvrij zijn voor deelname) van de activiteit of tijdens de activiteit? Dan mag je niet (meer) deelnemen. Dat geldt voor iedereen die betrokken is: kinderen, jongeren, begeleiders, kookouders, enzovoort.</li>
                        <li>Tijdens de gele fase worden de aanwezigheidslijsten goed bijgehouden, zodat we kunnen blijven nagaan wie op welke activiteit was in het geval van een mogelijke besmetting.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Organisatie</h3>

                    <p>
                        Net zoals op zomerkamp wordt er wekelijks een contactbubbel gevormd door de leden & de leiding van een tak:
                    </p>

                    <ul>
                        <li>Binnen bubbels is contact met elkaar mogelijk, moet je geen afstand houden en geen mondmasker gebruiken.</li>
                        <li>In een bubbel zitten er maximum 50 personen (leden + leiding).</li>
                        <li>Indien contact nodig is houden ze 1,5 meter afstand  of gebruik een mondmasker als de afstand niet kan behouden worden.</li>
                        <li>Er kunnen meerdere bubbels op 1 locatie aanwezig zijn, de bubbels onderling houden afstand van elkaar = bubbel distancing.</li>
                        <li>Iedereen gaat bewust om met de bubbels: de deelnemers, maar ook externen, ouders,…</li>
                        <li>Ouders en andere externen kunnen niet in de bubbels.</li>
                        <li>Ouders brengen & halen hun kind(eren) snel terug op. Voor ouders is het dragen van een mondmasker vanaf de gele fase verplicht! Blijf niet praten met andere ouders als je je kind afzet of ophaalt in zijn/haar zone.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Hygiëne</h3>

                    <h5>Persoonlijke hygiëne</h5>
                    <p>
                        Hygiëne en jeugdwerk is niet altijd de beste combinatie. Maar dit jaar is het noodzakelijk. Extra de handen wassen, hoesten in de elleboog, niezen in een papieren zakdoek: dat blijft ook tijdens het jeugdwerk nodig.
                    </p>

                    <h5>Infrastructuur</h5>
                    <p>
                        We zorgen voor maximale ventilatie van de lokalen en zetten waar mogelijk deuren en ramen open. 
                    </p>

                    <h5>Materiaal</h5>
                    <p>
                        In de gele en oranje fase kan materiaal gedeeld gebruikt worden binnen éénzelfde bubbel. Als er verschillende bubbels hetzelfde materiaal nodig hebben, wordt dit ontsmet tussen de bubbels door. 
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Activiteiten</h3>

                    <ul>
                        <li>De activiteiten vinden zoveel mogelijk plaats in openlucht en op het eigen terrein.</li>
                        <li>Contact met anderen in de publieke ruimte wordt vermeden.</li>
                        <li>In de gele fase geldt de bubbelwerking en kan fysiek contact dus, maar wordt intens fysiek contact nog steeds vermeden, in het bijzonder bij +12-jarige takken (JVG's, VG's, Stam).</li>
                        <li>In de gele fase kunnen contacten met externen, mits de social distancing-maatregelen gerespecteerd kunnen worden en de afstand bewaard kan blijven.</li>
                        <li>Overnachtingen kunnen plaatsvinden, mits maatregelen (goed verluchten, voldoende rust, extra handen wassen voor/na maaltijden/spelen, ...).</li>
                        <li>Uitstappen zijn mogelijk, maar dan zijn we onderhevig aan de samenlevingsmaatregelen.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Oranje fase --}}
    <div class="row justify-content-center section" id="Oranje fase">
        <div class="col-12 col-md-8">
            <h2><span class="fa--before text-color--corona-orange"><i class="fas fa-circle"></i></span>Oranje fase</h2>

            <div class="row">
                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Voor wie?</h3>

                    <p>
                        Tijdens de oranje fase zijn er enkele belangrijke basisregels voor wie naar de acitviteiten mag komen:
                    </p>

                    <ul>
                        <li>Behoort een deelnemer tot een risicogroep? Dan mag die meedoen aan de activiteit als hij toestemming heeft van de ouders, voogd (bij chronische ziektes onder controle door medicatie) of mits toestemming van de huisarts.</li>
                        <li>Was je ziek vóór de start (minimaal 3 dagen symptoomvrij zijn voor deelname) van de activiteit of tijdens de activiteit? Dan mag je niet (meer) deelnemen. Dat geldt voor iedereen die betrokken is: kinderen, jongeren, leiding, enzovoort.</li>
                        <li>Tijdens de oranje fase worden de aanwezigheidslijsten goed bijgehouden, zodat we kunnen blijven nagaan wie op welke activiteit was in het geval van een mogelijke besmetting. Ook contactlogboeken worden tijdens de activiteiten bijgehouden.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Organisatie</h3>

                    <p>
                        Net zoals op zomerkamp wordt er wekelijks een contactbubbel gevormd door de leden & de leiding van een tak. Bij +12 jaar (JVG's, OVG's, Stam) wordt een onderscheid gemaakt tussen binnen en buitenactiviteiten. Bij binnen-activiteiten mag de bubbel maximaal 20 deelnemers bevatten, buiten kunnen dit 50 personen zijn. Bij -12 jaar kan zowel binnen als buiten de bubbel uit max. 50 personen bestaan.
                    </p>

                    <ul>
                        <li>Binnen bubbels is contact met elkaar mogelijk, moet je geen afstand houden en geen mondmasker gebruiken.</li>
                        <li>Indien contact nodig is houden ze 1,5 meter afstand  of gebruik een mondmasker als de afstand niet kan behouden worden.</li>
                        <li>Er kunnen meerdere bubbels op 1 locatie aanwezig zijn, de bubbels onderling houden afstand van elkaar = bubbel distancing.</li>
                        <li>Iedereen gaat bewust om met de bubbels: de deelnemers, maar ook externen, ouders,…</li>
                        <li>Ouders en andere externen kunnen niet in de bubbels.</li>
                        <li>Ouders brengen & halen hun kind(eren) snel terug op. Voor ouders is het dragen van een mondmasker vanaf de gele fase al verplicht! Blijf niet praten met andere ouders als je je kind afzet of ophaalt in zijn/haar zone.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Hygiëne</h3>

                    <h5>Persoonlijke hygiëne</h5>
                    <p>
                        Hygiëne en jeugdwerk is niet altijd de beste combinatie. Maar dit jaar is het noodzakelijk. Extra de handen wassen, hoesten in de elleboog, niezen in een papieren zakdoek: dat blijft ook tijdens het jeugdwerk nodig.
                    </p>

                    <h5>Infrastructuur</h5>
                    <p>
                        We zorgen voor maximale ventilatie van de lokalen en zetten waar mogelijk deuren en ramen open. We doen ons best om zoveel mogelijk buiten te blijven tijdens onze activiteiten.
                    </p>

                    <h5>Materiaal</h5>
                    <p>
                        In de gele en oranje fase kan materiaal gedeeld gebruikt worden binnen éénzelfde bubbel. Als er verschillende bubbels hetzelfde materiaal nodig hebben, wordt dit ontsmet tussen de bubbels door.
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Activiteiten</h3>

                    <ul>
                        <li>De activiteiten vinden zoveel mogelijk plaats in openlucht en op het eigen terrein.</li>
                        <li>Contact met anderen in de publieke ruimte wordt vermeden.</li>
                        <li>In de oranje fase geldt de bubbelwerking en kan fysiek contact dus, maar wordt intens fysiek contact nog steeds vermeden, in het bijzonder bij +12-jarige takken (JVG's, OVG's)</li>
                        <li>Enkel met externen (tov. de bubbel) wordt social distancing toegepast.</li>
                        <li>Overnachtingen kunnen plaatsvinden, mits maatregelen (goed verluchten, voldoende rust, extra handen wassen voor/na maaltijden/spelen, ...)</li>
                        <li>We beperken onze externe contacten, deze kunnen alleen mits maatregelen.</li>
                        <li>Uitstappen kunnen ook, hierbij worden de maatregelen van toepassing op de samenleving verder gevolgd.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Rode fase --}}
    <div class="row justify-content-center section" id="Rode fase">
        <div class="col-12 col-md-8">
            <h2><span class="fa--before text-color--corona-red"><i class="fas fa-circle"></i></span>Rode fase</h2>

            <div class="row">
                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Voor wie?</h3>

                    <p>
                        Jeugdwerk kan nog doorgaan maar wel in heel beperkte vorm. Code rood is de meest ernstige situatie. Onze activiteiten blijven mogelijk maar alleen door sterke maatregelen te nemen: we werken alleen met groepen van 20 personen waarbij social distancing binnen de groep ook aan de orde is en bij +12 jaar (JVG's, OVG's) mondmaskers deel uitmaken van de werking. Wanneer deze fase van kracht zou zijn, dan communiceren we nog hoe de leden eventueel verdeeld zullen worden om per 20 in een bubbel te kunnen zitten.
                    </p>

                    <ul>
                        <li>Behoort een deelnemer tot een risicogroep? Dan mag die meedoen aan de activiteit als hij toestemming heeft van de ouders, voogd (bij chronische ziektes onder controle door medicatie) of mits toestemming van de huisarts.</li>
                        <li>Was je ziek vóór de start (minimaal 3 dagen symptoomvrij zijn voor deelname) van de activiteit of tijdens de activiteit? Dan mag je niet (meer) deelnemen. Dat geldt voor iedereen die betrokken is: kinderen, jongeren, begeleiders, kookouders, enzovoort.</li>
                        <li>Tijdens de rode fase worden de aanwezigheidslijsten goed bijgehouden, zodat we kunnen blijven nagaan wie op welke activiteit was in het geval van een mogelijke besmetting. Ook contactlogboeken & medische fiches worden tijdens de activiteiten bijgehouden.</li>
                    </ul>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Organisatie</h3>

                    <p>
                        Net zoals op zomerkamp wordt er wekelijks een contactbubbel gevormd door de leden & de leiding van een tak, met een maximum van 20 personen per bubbel. In deze fase houden we enkel nog maar activiteiten in de buitenlucht. Tussen de deelnemers in elke bubbel is er geen contact. Bij de JVG's & OVG's wordt het mondmasker verplicht als er onderling geen social distancing kan gegarandeerd worden. Contact met externen is in de rode fase uit den boze.
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Hygiëne</h3>

                    <h5>Persoonlijke hygiëne</h5>
                    <p>
                        Hygiëne en jeugdwerk is niet altijd de beste combinatie. Maar dit jaar is het noodzakelijk. Extra de handen wassen, hoesten in de elleboog, niezen in een papieren zakdoek: dat blijft ook tijdens het jeugdwerk nodig. Bij de JVG's, OVG's wordt het mondmasker verplicht als er onderling geen social distancing kan gegarandeerd worden.
                    </p>

                    <h5>Infrastructuur</h5>
                    <p>
                        We zorgen voor maximale ventilatie van de lokalen en zetten waar mogelijk deuren en ramen open.
                    </p>

                    <h5>Materiaal</h5>
                    <p>
                        Persoonlijk materiaal per individu heeft de voorkeur. Materiaal dat wordt doorgegeven wordt tussenin ontsmet.
                    </p>
                </div>

                <div class="col-12 col-md-6 section section--small-spacing">
                    <h3>Activiteiten</h3>

                    <ul>
                        <li>Activiteiten vinden plaats in openlucht en op het eigen terrein.</li>
                        <li>In de rode fase wordt alle fysiek contact vermeden.</li>
                        <li>In de rode fase zijn externe contacten te vermijden, als deze contacten essentieel zijn, worden de maatregelen gevolgd.</li>
                        <li>Geen overnachtingen.</li>
                        <li>Geen uitstappen.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection