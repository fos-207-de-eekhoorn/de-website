<div class="corona-fase">
	<div class="corona-fase__color corona-fase__color--{{ config('corona.active_fase') }}"></div>
	<div class="corona-fase__content">
		<h3 class="corona-fase__title">Huidige fase</h3>
		<h4 class="corona-fase__fase">
			@if (config('corona.active_fase') === 'green')
				Groene fase
			@elseif (config('corona.active_fase') === 'yellow')
				Gele fase
			@elseif (config('corona.active_fase') === 'orange')
				Oranje fase
			@elseif (config('corona.active_fase') === 'red')
				Rode fase
			@else
				<span class="corona-fase__error">Er is iets foutgelopen. Gelieve de takleider te contacteren voor meer informatie</span>
			@endif
		</h4>

		@if (isset($with_link) && $with_link)
			<div class="wrapper__btn corona-fase__btn">
				<a href="{{ url('/alle-info/jeugdwerkregels') }}" class="btn btn--primary">Meer informatie</a>
			</div>
		@endif
	</div>
</div>