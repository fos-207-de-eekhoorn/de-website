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
            @if (session('warning'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    We konden het event '{{ session('warning') }}' niet vinden
                @endcomponent
            @endif

            @if(!$evenementen->isEmpty())
                <ul class="evenementen-list row small-gutters">
                    @foreach($evenementen as $evenement)
                        <li class="evenementen-list__item col-12 col-md-6">
                            <a href="{{ url('/evenementen/' . str_replace(' ', '-', strtolower($evenement->naam))) }}">
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
            @else
                <div class="geen-output justify-self-center">
                    <div class="geen-output__icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>

                    <div class="geen-output__message">
                        <h2>
                            Het spijt ons<span class="fa--after text-color--blue-light"><i class="far fa-frown"></i></span>
                        </h2>

                        <h4>
                            Er zijn geen evenementen
                        </h4>

                        <p>
                            Momenteel zijn er geen evenementen gepland in de nabije toekomst.<br>
                            Kom zeker later eens terug om op de hoogte te blijven van onze evenementen!
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
