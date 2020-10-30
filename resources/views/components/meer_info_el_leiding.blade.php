<h3>Heb je vragen?</h3>

<p>
    Contacteer een van onze eenheidsleiding of stuur een berichtje via ons <a href="{{ url('/contact') }}">contact</a> pagina.
</p>

<div class="leiding-card-list">
    @foreach($el_leiding as $leider)
        @component('components.leiding_card', [
            'leider' => $leider,
        ])
        @endcomponent
    @endforeach
</div>

<div class="wrapper__btn large-margin-top">
    <a href="{{ url('/contact') }}" class="btn btn--secondary">Stuur een berichtje</a>
</div>