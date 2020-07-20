@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Bivak bevers & welpen',
        'page_sub_title' => 'Afgelast',
    ])
    @endcomponent

    <div class="row section justify-content-center">
        <div class="col-5">
            <h2 class="text--align-center">
                Met spijt moeten wij meedelen
            </h2>

            <h4 class="text--align-center">
                Dat ons bever en welpen bivak is afgelast wegens het coronavirus.

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
        <h2>Bivak bevers & welpen</h2>
            <p>Geachte ouders/verantwoordelijke</p>
            <br>
            <p><strong>Vrijdag 17 april</strong> is het eindelijk zo ver, dan gaan de bevers en welpen tot en met <strong>zondag 19 april</strong> op bivak. Wij willen er een super tof weekend van maken. De prijs voor bivak bedraagt <strong>€50</strong>. </p>
            <br>
        </div>

        <div class="col-12 col-lg-3">
            <h3>Praktische zaken</h3>
            <p>Wij verblijven het weekend in:</p>
            <p>Bivakhuis Ter Elven – Poperinge</p>
            <p>Bethunestraat 11</p>
            <p>8970 Poperinge</p>
            <br>
        </div>
        <div class="col-12 col-lg-9">
            <br>
            <br>
            <br>
            <p>We spreken af vrijdag 17 april om <strong>17u</strong> aan het bivakhuis.</p>
            <p>Op zondag 19 april kunt u uw kleine spuit terug komen halen om <strong>15u</strong>.</p>
            <br>
        </div>
        <div class="col-12 col-lg-3">
            <h3>Wat neem je mee?</h3>
            <lu>
                <li>Das</li>
                <li>4 onderbroeken </li>
                <li>Pyjama en knuffelbeer</li>
                <li>2 lange broeken</li>
                <li>3 t-shirts</li>
                <li>2 warme pulls</li>
                <li>Slaapzak, kussen, kussensloop</li>
                <li>(regen)jas</li>
                <li>Toiletgerief</li>
                <li>Handdoek</li>
                <li>4 paar kousen</li>
            </lu>
            <br>
        </div>
        <div class="col-12 col-lg-3">
            <br>
            <br>
            <lu>
                <li>Stevige schoenen</li>
                <li>Laarzen</li>
                <li>Zaklamp</li>
                <li>Pantoffels</li>
                <li>Drinkfles</li>
                <li>Een paar strips of boeken </li>
                <li>Muts/sjaal/handschoenen</li>
                <li>Medicijnen en dosering</li>
                <li>SIS kaart </li>
                <li>Klevertjes van de ziekenbond</li>
            </lu>
            <br>
        </div>
        <div class="col-12 col-lg-6">
            <br>
            <br>
            <p>Dit zijn de belangrijkste zaken die bevers en welpen nodig hebben. We vragen nadrukkelijk om uw kind geen speelgoed, geld, snoep, gsm, ipad, gameboy,… mee te geven op bivak. Heeft uw kind dit toch mee, dan wordt het afgenomen door de leiding en op het einde van bivak pas teruggegeven.</p>
            <br>
            <p>Als laatste willen we jullie, ouders, nog meedelen dat we zeer blij zijn dat u het vertrouwen aan ons schenkt om uw bever/welp mee te ‘geven’ op bivak. Wij zijn hierdoor vereerd en u kan er op rekenen dat wij ons uiterste best zullen doen om uw vertrouwen niet te schenden en uw kind een onvergetelijk weekend te bezorgen!</p>
            <br>
            
        </div>
        <div class="col-12">
            <h3>Inschrijven maar!</h3>
            <p>Inschrijven kan door het bedrag van €50 te storten op: <strong>BE71 9730 1630 9269</strong> met de mededeling: <strong>Bivak bevers/welpen 2020 + naam</strong>.</p>
            <p>Inschrijven kan tot en met <strong>4 april</strong>.</p>
            <br>
            <p>Heeft u nog vragen betreffende het bivak?  Je kan altijd een leiding aanspreken voor/na de activiteit, bellen/bericht sturen naar jullie takleiding Wasbeer (bevers) of Oeakari (welpen).
            <br>
            <br>
            <p>We hopen alvast op een talrijke opkomst!</p>
            <p>Vele groetjes van jullie leiding.</p>
        </div>       
    </div>
    --}}
@endsection