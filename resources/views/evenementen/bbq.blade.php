@extends('layouts.app')

@section('title')
	BBQ
@endsection

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'BBQ',
        'page_sub_title' => '2 november',
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
		        		Op zaterdag 2 november organiseren wij na de activiteit een BBQ. 
		        	</p>
		        	<p class="text--align-center">
		        		Naast lekker eten en drinken kunnen jullie ook de foto's van kamp bezichtigen en genieten van leuke showtjes van alle takken. 
		        	</p>
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Waar?</h3>
		        	<p class="text--align-center">
		        		De BBQ gaat door in de Wara in Waardamme.
		        	</p>
		        	<p class="text--align-center">
		        		Adres: Beekstraat 2, Waardamme
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Wanneer?</h3>
		        	<p class="text--align-center">
		        		Zaterdag 2 november. Jullie zijn welkom vanaf 19u. 
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Wat valt er te eten?</h3>
		        	<p class="text--align-center">
		        		<table class="table">
		        			<tr class="table__row">
		        				<td class="table__cell">Klein</td>
		        				<td class="table__cell">worst, frietjes, groentjes</td>
		        				<td class="table__cell">€10</td>
		        			</tr>
		        			<tr class="table__row">
		        				<td class="table__cell">Middel</td>
		        				<td class="table__cell">worst, rib, frietjes, groentjes</td>
		        				<td class="table__cell">€13</td>
		        			</tr>
		        			<tr class="table__row">
		        				<td class="table__cell">Groot</td>
		        				<td class="table__cell">worst, rib, steak, frietjes, groentjes</td>
		        				<td class="table__cell">€16</td>
		        			</tr>
		        			<tr class="table__row">
		        				<td class="table__cell">Veggie</td>
		        				<td class="table__cell">veggie, frietjes, groentjes</td>
		        				<td class="table__cell">€11</td>
		        			</tr>
				        </table>
		        	</p>
		        	<br>
		        	<br>
				    <h3 class="text--align-center">Inschrijven maar!</h3>
				    <p class="text--align-center">
				        Inschrijven doe je door het juiste bedrag te storten op BE38 9730 1630 9572 met als vermelding FORMULE + NAAM.
				    </p>
				    <br>
				    <p class="text--align-center">
				        <b>Deadline: 20 oktober!</b>
				    </p>
		        	<br>
		        	<br>
		        	<p class="text--align-center">
		        		Hopelijk tot dan!
		        	</p>
		        	<p class="text--align-center">
		        		De leiding
		        	</p>
		        </div>
            </div>
        </div>
    </div>
@endsection