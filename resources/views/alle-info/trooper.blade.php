@extends('layouts.app')

@section('title', 'Trooper')

@section('content')
    <section class="section section--small-spacing banner banner--full">
        <img src="/img/trooperbanner.png" alt="Banner" class="banner__banner">
    </section>

    <div class="row section">
        <div class="col-12 col-md-7">
            <div class="row section">
                <div class="col-12">
                    <h2>Wat is Trooper?</h2>
                    <p>
                        <b>Trooper</b> is een online platform dat samenwerkt met webshops.
                    </p>
                    <p>
                        Door online een aankoop te doen via Trooper kan je onze vereniging steunen. Er wordt een percentage van jouw aankoop aan onze vereniging geschonken, zonder dat jij extra moet betalen!
                    </p>
                </div>
            </div>
            <div class="section">
                <h3>Cool! Hoe werk dat?</h3>
                <p>
                    Voor je een online aankoopt doet, surf je naar <a href="https://trooper.be/fos207eekhoorn" target="_blank">https://trooper.be/fos207eekhoorn</a>. Op deze pagina staan links naar webshops. Als je via die links naar de webshop surft, weet de shop welke vereniging jij wil steunen. De link doet het werk, en jij kan gewoon shoppen zoals je normaal shopt. Van elke aankoop die jij doet, gaat er een percentje naar jouw vereniging.
                </p>
                <br>
                <br>
                <h3>Trooperbot</h3>
                <p>
                    Ben je wat vergeetachtig? Installeer dan zeker de Trooperbot. Telkens je op een Troopershop komt, zal hij verschijnen en zeggen: “bliep, bliep, Troopershop gevonden.” Jij klikt om Trooper te activeren. Trooperbot stuurt het nodige naar TrooperHQ. De monnies zijn binnen. <a href="https://trooper.be/trooperbot" target="_blank">https://trooper.be/trooperbot</a>
                </p>
                <br>
                <p>
                    Heb je hier nog vragen over? We helpen graag!
                </p>
                <br>
                <p>
                    Groetjes,
                </p>
                <p>
                    De leiding
                </p>
                <br>
            </div> 
        </div>
        <div class="col-12 col-md-5">
            <h2>Troopershops</h2>
            <p>
                Dit is een kleine selectie van winkels die samenwerken met Trooper, op de Trooper website vindt u er nog veel meer.
            </p>
            <br>
            <table class="table">
                <tr class="table__row">
                    <td class="table__cell">Coolblue</td>
                    <td class="table__cell">gem. 2.60%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Bol.com</td>
                    <td class="table__cell">gem. 2,00%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Booking.com</td>
                    <td class="table__cell">gem. 3,00%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Collect & Go</td>
                    <td class="table__cell">gem. €1</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Decathlon</td>
                    <td class="table__cell">gem. 3,75%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">TORFS</td>
                    <td class="table__cell">gem. 3,90%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Dreamland</td>
                    <td class="table__cell">gem. 2,00%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Plopsaland</td>
                    <td class="table__cell">gem. 5,70%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Pizzahut</td>
                    <td class="table__cell">gem. 3,50%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Domino's pizza</td>
                    <td class="table__cell">gem. 3,00%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">A.S.Adventure</td>
                    <td class="table__cell">gem. 2,50%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Ali Express</td>
                    <td class="table__cell">gem. 3,70%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Takeaway.com</td>
                    <td class="table__cell">gem. 2,25%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">Zalandolounge</td>
                    <td class="table__cell">gem. 3,00%</td>
                </tr>
                <tr class="table__row">
                    <td class="table__cell">HEMA</td>
                    <td class="table__cell">gem. 4,20%</td>
                </tr>
            </table>
        </div>
    </div>
@endsection