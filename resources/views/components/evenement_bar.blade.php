<div class="evenement-bar">
    <p class="evenement-bar__item">
        <span class="evenement-bar__icon"><i class="fas fa-play-circle"></i></span>
        <span class="evenement-bar__day">
            {{ Carbon\Carbon::parse($start_datum)->format('j') }}
        </span>
        <span class="evenement-bar__month">
            {{ Carbon\Carbon::parse($start_datum)->monthName }}
        </span>
        <span class="evenement-bar__year">
            {{ Carbon\Carbon::parse($start_datum)->format('Y') }}
        </span>
        <span class="evenement-bar__time">
            {{ $start_uur }}
        </span>
    </p>

    <p class="evenement-bar__item">
        <span class="evenement-bar__icon"><i class="fas fa-stop-circle"></i></span>
        <span class="evenement-bar__day">
            {{ Carbon\Carbon::parse($eind_datum)->format('j') }}
        </span>
        <span class="evenement-bar__month">
            {{ Carbon\Carbon::parse($eind_datum)->monthName }}
        </span>
        <span class="evenement-bar__year">
            {{ Carbon\Carbon::parse($eind_datum)->format('Y') }}
        </span>
        <span class="evenement-bar__time">
            {{ $eind_uur }}
        </span>
    </p>

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
</div>