@extends('layouts.main')

@section('content')
    <section class="section section--small-spacing carousel">
        <img src="{{ asset('/img/evenementen/banner-evenement-startdag.png') }}" alt="Banner" class="carousel__banner">
    </section>

	<div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="evenement">
                <h2 class="card__title"></h2>

                <div class="card__content">
                    <p class="text--align-center">
        				Met een schitterend jaar en een fantastisch kamp achter de rug staan we te trappelen om aan het nieuwe scoutsjaar te beginnen. Zaterdag 14 september gaan we van start. Wie zou jullie nieuwe leiding zijn? Wat is dat mysterie rond die doos nu toch? Kom af en ontdek het allemaal!
		        	</p>
		        	<p class="text--align-center">
		        		Hopelijk tot dan!
		        	</p>
		        	<br>
		        </div>
		        <div>
		        	<h4>Praktische info</h4>
		        	<p>
		        		De startdag loopt van 13u tot 17u. Onze lokalen zijn te vinden achter de valkaart.
		        	</p>
		        	<p>
		        		Om 13u beginnen we met de 'overgang'. Er wordt bekendgemaakt wie in welke tak zit. Daarna beginnen de takken elk met hun activiteit. 
		        	</p>
		        	<p>
		        		Tijdens de activiteit zal de bar open zijn waar ouders en sympatisanten kunnen genieten van een hapje en een drankje terwijl de kinderen spelen.
		        	</p>
		        	<br>
		        	<h4>Nieuwe leden</h4>
		        	<p>
		        		Ben je nieuw of kom je eens kijken hoe het er in de scouts aantoe gaat? Sluit vrijblijvend een proefverzekering af om te ontdekken of scouts iets voor jou is. <a href="http://localhost/alle-info/lid-worden">Hier</a> vind je alle info!
		        	</p>
		        	<p>
		        		Lid worden in onze scouts kan van 5 tot 16 jaar.
		        	</p>
		        </div>
            </div>
        </div>
    </div>
@endsection