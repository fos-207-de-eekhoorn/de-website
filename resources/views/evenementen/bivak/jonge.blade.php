@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'red',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Bivak JV/G',
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
            <h2>Bivak JV/G</h2>
            <p>Geachte ouders/verantwoordelijke</p>
            <br>
            <p><strong>Vrijdag 10 april</strong> is het zo ver, dan vertrekken wij met de JGV tot en met <strong>maandag 13 april</strong> op bivak naar Ieper. Wij zouden het tof vinden als uw dochter/zoon samen met ons er een spetterend bivak kan van maken vol toffe en verrassende activiteiten. De prijs voor bivak bedraagt €50. </p>
            <br>
            <p>Dankzij een geslaagde spaghetti avond hebben we ook een spannende activiteit kunnen boeken, nog eens bedankt voor jullie inzet! Deze activiteit zal professioneel begeleid worden en kijken wij als leiding ook al erg naar uit. Wat deze activiteit inhoudt, houden wij nog eventjes geheim ;-) </p>
            <br>
        </div>

        <div class="col-12 col-lg-7">
            <h3>Carpool</h3>
            <p>We hebben gekeken om met het openbaar vervoer naar onze bivak plaats te begeven. Dit bleek helaas niet haalbaar. Met het openbaar vervoer zijn we minstens 2u30 onderweg, 2 uur langer dan als we met de auto gaan. Om onze ecologische voetafdruk toch zo klein mogelijk te houden zetten wij een carpool systeem op poten. Ouders die het zien zitten om te rijden mogen een seintje geven aan Tamaroe, de bedoeling is om met zo weinig mogelijk auto’s in Ieper te geraken. Je vindt zijn gsm nummer onderaan de brief.</p>
            <br>
            <p>We spreken af vrijdag 10 april om 9u30 aan het scoutslokaal. Wij zullen daar zijn met een camionette, je kan daar al je trekrugzakken/valiezen in deponeren. We vertrekken op maandag 13 april om 15u, aankomst terug aan het scoutslokaal rond 16u.</p>
            <br>
            <p>Wij verblijven het weekend in:</p>
            <p>Provinciaal domein “De Palingbeek”</p>
            <p>Verbrandemolenstraat 5</p>
            <p>8902 Ieper (Zillebeke)</p>
        </div>

        <div class="col-12 col-lg-5">
            <h3>Wat neem je mee?</h3>
            <lu>
                <li>Scouts uniform + das</li>
                <li>Lunchpakket voor vrijdagmiddag</li>
                <li>Slaapzak + slaapmatje</li>
                <li>Toiletgerief</li>
                <li>Hoofdkussen</li>
                <li>Warme kledij (4 dagen) die vuil mag worden + reserve kledij</li>
                <li>Stevige schoenen/wandelschoenen</li>
                <li>Regenkledij</li>
                <li>Zaklamp</li>
                <li>Gamel + bestek + beker</li>
                <li>Identiteitskaart of Kids ID</li>
                <li>Eventueel medicatie</li>
            </lu>
            <br>
        </div>

        <div class="col-12">
            <h3>Inschrijven maar!</h3>
            <p>Inschrijven kan door het bedrag van €50 te storten op: <strong>BE44 9731 8913 1745</strong> met de mededeling: <strong>Bivak JVG’S 2020 + naam</strong>.</p>
            <p>Inschrijven kan tot en met <strong>14 maart</strong>.</p>
            <br>
            <p>Heeft u nog vragen betreffende het bivak? Ben je bereidt enkele jonge te voeren naar bivak? Je kan altijd een leiding van de JGV’s aanspreken voor/na de activiteit, bellen/bericht sturen naar Tamaroe via <a href="tel:0498/51 73 84">0498/51 73 84</a> of een mail sturen naar <a href="mailto:fos207.jonge@gmail.be">fos207.jonge@gmail.be</a>.</p>
            <br>
            <p>Hopelijk tot dan!</p>
            <p>De jonge leiding</p>
        </div>
    </div>
    --}}
@endsection