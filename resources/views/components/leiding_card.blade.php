<div class="leiding-card">
    <div class="row">
        <div class="col-4"> 
            <div class="leiding-card__img-wrapper">
                <img src="{{ asset('/img/leiding/' . $leider->foto) }}" alt="{{ $leider->totem }}" class="leiding-card__img">
            </div>
        </div>

        <div class="col-8 leiding-card__info">
            <h5 class="leiding-card__title no-margin-bottom">
                @if (isset($titel))
                    {{ $titel }}
                @else
                    @if ($leider->is_el == 1)
                        @if ($leider->geslacht === 'male')
                            Eenheidsleider
                        @elseif ($leider->geslacht === 'female')
                            Eenheidsleidster
                        @else
                            Eenheidsleid(st)er
                        @endif
                    @elseif ($leider->is_ael_financien == 1)
                        @if ($leider->geslacht === 'male')
                            Assistent eenheidsleider financiën
                        @elseif ($leider->geslacht === 'female')
                            Assistent eenheidsleidster financiën
                        @else
                            Assistent eenheidsleid(st)er financiën
                        @endif
                    @elseif ($leider->is_ael_leden == 1)
                        @if ($leider->geslacht === 'male')
                            Assistent eenheidsleider leden
                        @elseif ($leider->geslacht === 'female')
                            Assistent eenheidsleidster leden
                        @else
                            Assistent eenheidsleid(st)er leden
                        @endif
                    @else
                        @if ($leider->geslacht === 'male')
                            Leider
                        @elseif ($leider->geslacht === 'female')
                            Leidster
                        @else
                            Leid(st)er
                        @endif
                    @endif
                @endif
            </h5>

            <p>
                {{ $leider->voornaam }} @if ($leider->totem != NULL)'{{ $leider->totem }}'@endif {{ $leider->achternaam }}
            </p>

            <a href="tel:{{ $leider->telefoon_link }}" target="_blank">{{ $leider->telefoon }}</a>

            @if (isset($email_overwrite))
                <a href="mailto:{{ $email_overwrite }}" target="_blank">{{ $email_overwrite }}</a>
            @else
                <a href="mailto:{{ $leider->email }}" target="_blank">{{ $leider->email }}</a>
            @endif
        </div>
    </div>
</div>