@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing banner banner--full">
        <img src="{{ asset('/img/banner.jpg') }}" alt="Banner" class="banner__banner">
    </section>

    <div class="row section section--small-spacing">
        <div class="col-12">
            <h2>Wat kost de scouts?</h2>

            <p>
                Wij proberen de kost van onze werking zo laag mogelijk te houden. 
            </p>

            <p>
                De totale kost verschilt per leeftijdsgroep. Hoe ouder uw zoon/dochter, hoe duurder over het algemeen de kost voor de scouts. Een geschat overzicht vindt u hieronder. Hou er rekening mee dat onderstaande prijzen lichte veranderingen kunnen ondergaan. Voor sommige activiteiten wordt soms een extra kost gevraagd van enkele euro’s.
            </p>
        </div>
    </div>

    <div class="row section">
        <div class="col-12 col-md-7">
            <div class="section">
                <h4>Jaarlijks</h4>
                <table class="table">
                    <thead>
                        <tr class="table__row">
                            <td class="table__cell"></td>
                            <td class="table__cell">Bevers</td>
                            <td class="table__cell">Welpen</td>
                            <td class="table__cell">JG/V's</td>
                            <td class="table__cell">OG/V's</td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="table__row">
                            <td class="table__cell">Lidgeld</td>
                            <td class="table__cell">€38,00</td>
                            <td class="table__cell">€38,00</td>
                            <td class="table__cell">€38,00</td>
                            <td class="table__cell">€38,00</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Bivak</td>
                            <td class="table__cell">€50,00</td>
                            <td class="table__cell">€50,00</td>
                            <td class="table__cell">€50,00</td>
                            <td class="table__cell">€50,00</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Kamp</td>
                            <td class="table__cell">€95,00</td>
                            <td class="table__cell">€150,00</td>
                            <td class="table__cell">€150,00</td>
                            <td class="table__cell">€150,00</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">TOTAAL</td>
                            <td class="table__cell">€183,00</td>
                            <td class="table__cell">€238,00</td>
                            <td class="table__cell">€238,00</td>
                            <td class="table__cell">€238,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="section">
                <h4>Vaste kosten</h4>
                <table class="table">
                    <thead>
                        <tr class="table__row">
                            <td class="table__cell"></td>
                            <td class="table__cell">Bevers</td>
                            <td class="table__cell">Welpen</td>
                            <td class="table__cell">JG/V's</td>
                            <td class="table__cell">OG/V's</td>
                        </tr>
                    </thead>

                    <tbody>                     
                        <tr class="table__row">
                            <td class="table__cell">Uniform</td>
                            <td class="table__cell">€10,00</td>
                            <td class="table__cell">€35,00</td>
                            <td class="table__cell">€38,00</td>
                            <td class="table__cell">€38,00</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Das</td>
                            <td class="table__cell">€10,00</td>
                            <td class="table__cell">€10,00</td>
                            <td class="table__cell">€10,00</td>
                            <td class="table__cell">€10,00</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Badge welp</td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€1,30</td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Kenteken FOS</td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€1,50</td>
                            <td class="table__cell">€1,50</td>
                            <td class="table__cell">€1,50</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Belofteteken</td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€1,50</td>
                            <td class="table__cell">€1,50</td>
                            <td class="table__cell">€1,50</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">Eenheidsteken</td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€2,50</td>
                            <td class="table__cell">€2,50</td>
                            <td class="table__cell">€2,50</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">jaarteken</td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€1,20</td>
                            <td class="table__cell">€1,20</td>
                            <td class="table__cell">€1,20</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">provincieteken</td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€0,50</td>
                            <td class="table__cell">€0,50</td>
                            <td class="table__cell">€0,50</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">kenteken verkenner/gids</td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell">€3,00</td>
                            <td class="table__cell">€3,00</td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                            <td class="table__cell"></td>
                        </tr>

                        <tr class="table__row">
                            <td class="table__cell">TOTAAL</td>
                            <td class="table__cell">€20,00</td>
                            <td class="table__cell">€53,50</td>
                            <td class="table__cell">€58,20</td>
                            <td class="table__cell">€58,20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-md-5">
            <h4>Toelichting</h4>

            <div class="section section--small-spacing">
                <h5>
                    Lidgeld
                </h5>
                
                <p>
                    Het lidgeld is een jaarlijkse kost die iedereen die actief is in onze werking moet betalen. Het grootste deel hiervan gaat rechtstreeks naar onze koepel, FOS Open Scouting, dit ondersteunt hun werking en in ruil hiervoor ben je bij ons verzekerd voor lichamelijke ongevallen en burgerlijke aansprakelijkheid. Een klein deeltje hiervan gaat naar onze eenheid en bekostigd voor een stuk onze dagelijkse werking (materiaal, 4-uurtjes etc.).
                </p>
                
                <p>
                    De kost voor het lidgeld bedraagt 38 euro
                </p>
            </div>

            <div class="section section--small-spacing">
                <h5>
                    Bivak
                </h5>
                
                <p>
                    Al onze takken gaan jaarlijks op weekend, het bivak. Voor de bevers & de welpen is dit samen en valt dit in de paasvakantie. De JGV’s en OGV’s gaan apart en in tenten op bivak.
                </p>
                
                <p>
                    Voor alle groepen bedraagt de prijs hiervan typisch rond de 50 euro.
                </p>
            </div>

            <div class="section section--small-spacing">
                <h5>
                    Zomerkamp
                </h5>
                
                <p>
                    Elke zomer gaan wij met alle groepen samen op kamp. Dit is het hoogtepunt van het jaar en zorgt bij iedereen voor onvergetelijke momenten. De welpen, JGV’s en OGV’s gaan 10 dagen. In het midden is er een dag waarop de ouders verwelkomd worden om het kampterrein te bezoeken, de ouderbezoekdag. Terwijl kunnen de ouders van de bevers hun kinderen brengen. Voor hen begint het kamp dan en duurt dit 5 dagen.
                </p>
                
                <p>
                    De prijs hiervoor bedraagt bij de bevers 95 euro en bij de oudere groepen 150 euro. Hebt u meerdere kinderen die lid zijn van de scouts? Dan gaat er per kind 5 euro van de kostprijs van het kamp (dus de kost is dan 145 euro voor het 2e kind, 140 voor het 3e kind enzovoort)
                </p>
            </div>

            <div class="section section--small-spacing">
                <h5>
                    Uniform
                </h5>
                
                <p>
                    Voor de bevers bestaat het uniform slechts uit een T-shirt en een das. Vanaf de welpen wordt dat T-shirt ingeruild voor een hemd. Het hemd wordt uitgerust met allerlei badges. Sommige badges gaan de hele scoutscarrière mee en anderen behoren enkel tot een specifieke tak. Meer info over het uniform vindt u <a href="https://scoutsoostkamp.be/alle-info/uniform-shop">hier</a>.
                </p>
            </div>
        </div>
    </div>

    <div class="row section justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="section section--small-spacing">
                <p>
                    Wij doen er alles aan om de kost voor onze werking laag te houden. We beseffen dat dit een grote kost kan zijn, zeker voor grote en kwetsbare gezinnen. Daarom bieden wij enkele mogelijkheden aan om korting aan te vragen op bovenstaande kosten. Deze bestaan uit de <b>SJaCosbonnen</b> van gemeente Oostkamp en het <b>SOMkort</b> en <b>SOMfonds</b>  van FOS Open Scouting.
                </p>
            </div>

            <div class="section section--small-spacing">
                <h5>
                    SJaCosbonnen
                </h5>
                
                <p>
                    Ook de gemeente Oostkamp ondersteunt gezinnen met behulp van de SJaCosbonnen. Bij cash betaling van het lidgeld kunt u ons een SJaCosbon geven. De prijs van het lidgeld wordt verminderd met de waarde van uw SJaCosbon. Meer info vindt u <a href="https://www.oostkamp.be/product/241/sjacosbon---vrijetijdsbon-voor-sport-jeugd-en-cultuur">hier</a>.
                </p>
            </div>

            <div class="section section--small-spacing">
                <h5>
                    SOMkort
                </h5>
                
                <p>
                    Fos Open Scouting biedt voor gezinnen die daar nood aan hebben een korting op het lidgeld aan. Bovenop de korting van FOS geven wij nog een extra korting waardoor zij die hier nood aan hebben slechts de helft van het lidgeld moeten betalen, nog 19 euro dus. Wenst u hier gebruik van te maken? Stort dan 19 i.p.v. 38 euro en vermeld “SOMkort” bij je betaling.
                </p>
            </div>

            <div class="section section--small-spacing">
                <h5>
                    SOMfonds
                </h5>
                
                <p>
                    Aanvullend op het SOMkort-systeem is er ook het SOMfonds systeem. Bij het SOMfonds gaat het om een toelage voor ouders die daar nood aan hebben, voor alles (behalve lidgeld) waar uw kind nood aan heeft om aan scouting te kunnen deelnemen. Denk aan: weekendprijs, kampprijs, unifom, ...
                </p>
                
                <p>
                    Wenst u hier gebruik van te maken of meer over te weten? Praat dan met de takleider van je kind of de eenheidsleiding, of stuur een mailtje naar onze email fos207ste@gmail.com.
                </p>
            </div>
        </div>
    </div>
@endsection