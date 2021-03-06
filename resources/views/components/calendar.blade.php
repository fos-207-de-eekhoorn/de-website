<div class="calendar">
    <div class="calendar__divider"></div>

    @forelse($evenementen as $evenement)
        <p class="calendar__date calendar__date--{{ $evenement->kleur }}">
            <span class="calendar__day">{{ Carbon\Carbon::parse($evenement->start_datum)->format('j') }}</span>
            <span class="calendar__month">{{ Carbon\Carbon::parse($evenement->start_datum)->format('M') }}</span>
        </p>

        <div class="calendar__info">
            <h5 class="calendar__name">
                <a href="{{
                    $evenement->has_static_url
                        ? route('evenementen.'.$evenement->url)
                        : route('evenementen.details', ['evenement' => $evenement->url])
                }}" class="calendar__link calendar__link--{{ $evenement->kleur }}">
                    {{ $evenement->naam }}
                </a>
            </h5>

            <div class="calendar__details">
                <span class="calendar__icon icon fa--before"><i class="fas fa-clock"></i></span>
                <span class="calendar__time">{{ substr($evenement->start_uur, 0, 5) }}</span>
                <span class="calendar__icon icon fa--before"><i class="fas fa-map-marker-alt"></i></span>
                <span class="calendar__location">{{ $evenement->locatie }}</span>
            </div>

            @if (sizeof($evenement->evenement_tak) > 0)
                <div class="calendar__takken tags">
                    @foreach($evenement->evenement_tak as $evenement_tak)
                        <a href="{{ route('takken.details', ['tak' => $evenement_tak->tak->slug]) }}" class="tags__tag tags__tag--is-link">{{ $evenement_tak->tak->naam }}</a>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="calendar__divider"></div>
    @empty
        <div class="calendar__no-event">Geen geplande evenementen</div>
        <div class="calendar__divider"></div>
    @endforelse
</div>

<p class="text--align-right small-margin-top no-margin-bottom">
    <a href="{{ route('evenementen') }}" class="text--align-right">
        Alle evenementen<span class="fa--after"><i class="fas fa-angle-right"></i></span>
    </a>
</p>