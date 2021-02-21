@extends('layouts.app')

@section('title')
    Startdag
@endsection

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Startdag',
        'page_sub_title' => '14 september',
    ])
    @endcomponent

	<div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="evenement">
                <div class="card__content">
                    <p class="text--align-center">
        				Met een schitterend jaar en een fantastisch kamp achter de rug staan we te trappelen om aan het nieuwe scoutsjaar te beginnen. Zaterdag 14 september gaan we van start. Wie zou jullie nieuwe leiding zijn? Wat is dat mysterie rond die doos nu toch? Kom af en ontdek het allemaal!
		        	</p>
		        	<p class="text--align-center">
		        		Hopelijk tot dan!
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Praktische info</h3>
		        	<p class="text--align-center">
		        		De startdag loopt van 13u tot 17u. Onze lokalen zijn te vinden achter de valkaart.
		        	</p>
		        	<p class="text--align-center">
		        		Om 13u beginnen we met de 'overgang'. Er wordt bekendgemaakt wie in welke tak zit. Daarna beginnen de takken elk met hun activiteit. 
		        	</p>
		        	<p class="text--align-center">
		        		Tijdens de activiteit zal de bar open zijn waar ouders en sympatisanten kunnen genieten van een hapje en een drankje terwijl de kinderen spelen.
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Mysterie box</h3>
		        	<p class="text--align-center">
		        		We hebben in de scouts een mysterieus pakje ontvangen. Ben jij ook benieuwd wat er in zit? Op startdag proberen we er samen achter te komen!
		        	</p>
		        	<p class="text--align-center">
		        		Denk jij te weten wat er in deze doos zit? Voor een klein bedrag kan je een gokje wagen. Als je het juist hebt win je een leuke prijs!
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Nieuwe leden</h3>
		        	<p class="text--align-center">
		        		Ben je nieuw of kom je eens kijken hoe het er in de scouts aantoe gaat? Sluit vrijblijvend een proefverzekering af om te ontdekken of scouts iets voor jou is. <a href="{{ route('info.lid-worden') }}">Hier</a> vind je alle info!
		        	</p>
		        	<p class="text--align-center">
		        		Lid worden in onze scouts kan van 5 tot 16 jaar.
		        	</p>
		        </div>
            </div>
        </div>
    </div>
@endsection