<div class="evenement-bar">
    <p class="evenement-bar__item">
        <span class="evenement-bar__icon"><i class="fas fa-map-marker-alt"></i></span>
        {{ $locatie }}
    </p>

    <p class="evenement-bar__item">
        <span class="evenement-bar__icon"><i class="fas fa-euro-sign"></i></span>
        @if ($prijs === 0)
            FREE
        @else
            <span><span class="text--unit">€</span>{{ $prijs }}</span>
        @endif
    </p>

    <p class="evenement-bar__item">
        <span class="evenement-bar__icon"><i class="fas fa-clock"></i></span>
        {{ $start_uur }}
    </p>

    <p class="evenement-bar__item">
        <span class="evenement-bar__icon"><i class="fas fa-clock"></i></span>
        {{ $eind_uur }}
    </p>
</div>