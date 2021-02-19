<div class="corona-fase">
	<div class="corona-fase__color corona-fase__color--{{ $active_corona_phase }}"></div>
	<div class="corona-fase__content">
		<h3 class="corona-fase__title">Covid-19 werking</h3>
		<h4 class="corona-fase__fase">
			@if ($active_corona_phase === 'green')
				Groene fase
			@elseif ($active_corona_phase === 'yellow')
				Gele fase
			@elseif ($active_corona_phase === 'orange')
				Oranje fase
			@elseif ($active_corona_phase === 'red')
				Rode fase
			@else
				<span class="corona-fase__error">Er is iets foutgelopen. Gelieve de takleider te contacteren voor meer informatie</span>
			@endif
		</h4>

		@if (isset($with_link) && $with_link)
			<div class="wrapper__btn corona-fase__btn">
				<a href="{{ route('info.jeugdwerkregels') }}" class="btn btn--primary">Meer informatie</a>
			</div>
		@endif
	</div>
</div>