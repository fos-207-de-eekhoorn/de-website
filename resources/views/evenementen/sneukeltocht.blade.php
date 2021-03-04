@extends('layouts.app')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'green',
            'pattern' => '1',
            'strength' => 'light',
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
		        		Warm je benen maar goed op want op 13 oktober organiseren DE OUDE een heuse sneukeltocht! Wat kan je verwachten? Een leuke fiets- of wandeltocht waarbij je tussendoor een hapje of een drankje krijgt en waar een challenge/ activiteit je te wachten staat. Een gezellige en sportieve zondag gegarandeerd! Er zijn zowel 2 fietsroutes waaruit je kan kiezen, als 2 wandelroutes.
		        	</p>

		        	<h3 class="text--align-center" style="margin-top: 2rem">
		        		Routes en prijzen<br>
		        		(Vrij te kiezen welke je wil wandelen of fietsen)
		        	</h3>

		        	<p class="text--align-center">
		        		7km - 2 postjes= 5 euro<br>
		        		15 km - 3 postjes= 8 euro<br>
		        		25 km - 2 postjes= 5 euro<br>
		        		50 km - 3 postje= 8 euro
		        	</p>

		        	<h3 class="text--align-center" style="margin-top: 2rem">
		        		Inschrijven
		        	</h3>

		        	<p class="text--align-center">
		        		Inschrijven kan door een mailtje te sturen naar fos207ste@gmail.com of een berichtje te sturen naar iemand van de oude leiding! Graag het aantal personen en de route erbij te vermelden. 
		        	</p>

		        	<p class="text--align-center">
		        		Gelieve na inschrijving zo snel mogelijk te storten, dit mag naar BE05 7360 1246 5675 met vermelding van de naam van de hoofdinschrijver.
		        	</p>

		        	<p class="text--align-center" style="margin-top: 2rem">
		        		Sportieve groetjes van de oude tak.<br>
		        		Tot dan!
		        	</p>
		        </div>
            </div>
        </div>
    </div>
@endsection