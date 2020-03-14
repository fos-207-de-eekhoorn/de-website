@extends('layouts.main')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
        ],
        'page_title' => 'Alle evenementen',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
        	<h2>Alle evenementen</h2>

            <ul class="evenementen-list">
                @foreach($evenementen as $evenement)
                    <li class="evenementen-list__item evenementen-list-item">
                        <div class="evenementen-list-item__visual">
                            <img src="{{ asset('/img/banners/' . $evenement->kleur . '-' . $evenement->banner_patroon . '-' . $evenement->banner_sterkte . '.png') }}" class="evenementen-list-item__image">

                            <p class="evenementen-list-item__date">
                                <span class="evenementen-list-item__day">
                                    {{ Carbon\Carbon::parse($evenement->start_datum)->format('j') }}
                                </span>

                                <span class="evenementen-list-item__month">
                                    {{ Carbon\Carbon::parse($evenement->start_datum)->monthName }}
                                </span>
                            </p>
                        </div>

                        <div class="evenementen-list-item__info">
                            <h3 class="evenementen-list-item__titel">{{ $evenement->naam }}</h3>
                            <p class="evenementen-list-item__location">{{ $evenement->locatie }}</p>
                            <p class="evenementen-list-item__price">{{ $evenement->prijs }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
