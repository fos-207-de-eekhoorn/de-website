@extends('layouts.app')

@section('title', 'Eikeltjesquiz')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'brown',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Eikeltjesquiz',
        'page_sub_title' => '30 november',
    ])
    @endcomponent

	<div class="row justify-content-center section">
        <div class="col-12 col-md-8">
            <div class="evenement">
                <div class="card__content">
                    <p class="text--align-center">
        				Beste ouders & sympathisanten,
		        	</p>
		        	<br>
		        	<p class="text--align-center">
		        		Fos 207 presenteert hun vernieuwde quiz:
		        	</p>
		        	<p class="text--align-center">
		        		De Eikeltjesquiz!
		        	</p>
		        	<br>
		        	<p class="text--align-center">
		        		Na 20 jaar "Putjesquiz" en met het vertrek van onze befaamde quizmaster Koenraad "Oere" Sörensen hebben we onze quiz in een volledig nieuw jasje gestoken.
		        	</p>
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Wat?</h3>
		        	<p class="text--align-center">
		        		Uiteenlopende vragen in verschillende leutige rondes.
						Een quiz voor jong en oud, plezier verzekerd!
						De opbrengst gaat zoals altijd naar de FOS 207 De Eekhoorn.
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Waar en wanneer?</h3>
		        	<p class="text--align-center">
		        		Met de Eikeltjesquiz verhuizen we naar onze collega-jeugdwerking van jeugdontmoetingscentrum 't JOC Den Artisjoc!
		        	</p>
		        	<p class="text--align-center">
		        		Om 19u30 gaan de deuren open, om 20u begint de quiz. Het einde van de quiz wordt voorzien rond 22u30, de prijsuitreiking rond 23u. Let op! Hierna kan nog gezellig nagepraat en -gedronken worden. 
		        	</p>
		        	<br>
		        	<h3 class="text--align-center">Inschrijven maar!</h3>
		        	<p class="text--align-center">
		        		Inschrijven kan in teams van 5 personen en kost 20 euro per ploeg.
						Inschrijven kan bij de leiding van FOS 207 of via <a href="https://docs.google.com/forms/d/e/1FAIpQLSeIbdzx2bxtAUN3MBelgH3ZlsLaTTjA2iclcV9FfYfx6QFkdg/viewform?fbclid=IwAR0H5NxDZozCb4jQF99Isg5jMiFmBtBX037SaIgExv8lmmkWzhWOn-9sV-U">deze link</a>.
		        	</p>
		        	<p class="text--align-center">
		        		Gelieve na inschrijving het inschrijvingsgeld te storten op BE71 9730 1630 9269 met vermelding van ploegnaam. Waarvoor dank!
		        	</p>
		        	<br>
		        	<br>
				    <p class="text--align-center">
				        De quiz zal gepresenteerd worden door lokale beroemdheid en sfeermaker Thomas Lammertyn. 
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