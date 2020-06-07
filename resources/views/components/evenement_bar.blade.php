<div class="evenement-bar">
    <div class="evenement-bar__essentials">
        <span class="evenement-bar__event">{{ $naam }}</span>
        <span class="evenement-bar__datetime">
            {{ Carbon\Carbon::parse($start_datum)->isoFormat('dddd') }}
            {{ Carbon\Carbon::parse($start_datum)->format('j') }}
            {{ Carbon\Carbon::parse($start_datum)->monthName }}
            {{ Carbon\Carbon::parse($start_datum)->year }}
            @if ($start_datum === $eind_datum)
                <br>van {{ $start_uur }} tot 
            @elseif ($start_datum !== $eind_datum)
                {{ Carbon\Carbon::parse($eind_datum)->isoFormat('dddd') }}
                {{ Carbon\Carbon::parse($eind_datum)->format('j') }}
                {{ Carbon\Carbon::parse($eind_datum)->monthName }}
                {{ Carbon\Carbon::parse($eind_datum)->year }}
            @endif
            {{ $eind_uur }}
        </span>
    </div>
</div>