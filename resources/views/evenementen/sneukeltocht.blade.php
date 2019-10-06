@extends('layouts.main')

@section('content')
    @component('components.carousel', [
        'images' => [
            [
                'image' => asset('/img/evenementen/Banner-evenementen-achtergrond.png'),
                'alt' => 'Sneukeltocht',
            ],
        ],
        'page_title' => 'Sneukeltocht',
        'page_sub_title' => '13 oktober',
    ])
    @endcomponent

	<div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="evenement">
                <div class="card__content">
                    <p class="text--align-center">
        				Beste ouders & sympathisanten,
		        	</p>
		        	<p class="text--align-center">
		        		Op zondag 13 oktober organiseren de oudgids/-verkenners een sneukeltocht om hun kas te spijzen voor het nieuwe scoutsjaar.
		        	</p>
		        	<br>
		        	<br>
		        	<h3 class="text--align-center">Wat?</h3>
		        	<p class="text--align-center">
		        		Een sneukeltocht voor jong en oud! Voor een schappelijke prijs zal je een fiets- of wandeltocht kunnen afleggen langs verschillende kraampjes met een hapje, een drankje, of iets anders leuks. Verwacht je maar aan veel lekkers en diverse randanimatie!
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Waar?</h3>
		        	<p class="text--align-center">
		        		Er zullen drie routes van verschillende lengte vertrekken van ons lokaal achter De Valkaart. De precieze routes zullen later nog bekendgemaakt worden! 
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Wanneer?</h3>
		        	<p class="text--align-center">
		        		Dit evenement zal plaatsvinden op zondag 13 oktober. Vertrekken zal kunnen gedurende de voormiddag.
		        	</p>
		        	<br>
		        	<br>
		        	<p class="text--align-center">
		        		Verdere info volgt nog.
		        	</p>
		        	<p class="text--align-center">
		        		Hopelijk tot dan!
		        	</p>
		        	<p class="text--align-center">
		        		De leiding van de oudgids/-verkenners
		        	</p>
		        </div>
            </div>
        </div>
    </div>
@endsection