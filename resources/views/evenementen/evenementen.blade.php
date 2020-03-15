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

            <ul class="evenementen-list row small-gutters">
                @foreach($evenementen as $evenement)
                    <li class="evenementen-list__item col-12 col-md-6">
                        <a href="#">
                            <div class="evenementen-list-item">
                                <div class="evenementen-list-item__visual evenementen-list-item__visual--{{ $evenement->kleur }}">
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
                                    <h3 class="evenementen-list-item__titel">
                                        {{ $evenement->naam }}
                                    </h3>

                                    <p class="evenementen-list-item__text evenementen-list-item__text--location">
                                        <span class="evenementen-list-item__icon"><i class="fas fa-map-marker-alt"></i></span>{{ $evenement->locatie }}
                                    </p>

                                    <p class="evenementen-list-item__text evenementen-list-item__text--time">
                                        <span class="evenementen-list-item__icon"><i class="fas fa-clock"></i></span>Start om {{ Carbon\Carbon::parse($evenement->start_uur)->format('H\ui') }}
                                    </p>

                                    <p class="evenementen-list-item__text evenementen-list-item__text--price">
                                        <span class="evenementen-list-item__icon"><i class="fas fa-euro-sign"></i></span>{{ $evenement->prijs }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
