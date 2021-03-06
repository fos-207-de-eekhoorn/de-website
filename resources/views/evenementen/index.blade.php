@extends('layouts.app')

@section('title', 'Evenementen')

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
            @if (session('warning_not_found'))
                @component('components.flash_message', [
                    'type' => 'warning',
                ])
                    We konden je evenement niet vinden. Alle komende evenementen kan je hier vinden.
                @endcomponent
            @endif

            @if(!$evenementen->isEmpty())
                <ul class="evenementen-list row small-gutters">
                    @foreach($evenementen as $evenement)
                        <li class="evenementen-list__item col-12 col-md-6">
                            <a href="{{
                                $evenement->has_static_url
                                    ? route('evenementen.'.$evenement->url)
                                    : route('evenementen.details', ['evenement' => $evenement->url])
                            }}">
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

                                        @if (isset($evenement->locatie))
                                            <p class="evenementen-list-item__text evenementen-list-item__text--location d-flex">
                                                <span class="evenementen-list-item__icon"><i class="fas fa-map-marker-alt"></i></span>{!! $evenement->locatie !!}
                                            </p>
                                        @endif

                                        @if (isset($evenement->start_uur))
                                            <p class="evenementen-list-item__text evenementen-list-item__text--time">
                                                <span class="evenementen-list-item__icon"><i class="fas fa-clock"></i></span>Start om {{ Carbon\Carbon::parse($evenement->start_uur)->format('H\ui') }}
                                            </p>
                                        @endif

                                        @if (isset($evenement->prijs))
                                            <p class="evenementen-list-item__text evenementen-list-item__text--price">
                                                <span class="evenementen-list-item__icon"><i class="fas fa-euro-sign"></i></span>{{ $evenement->prijs }}
                                            </p>
                                        @endif

                                        @if (isset($evenement->snelle_info))
                                            <p class="evenementen-list-item__text">
                                                <span class="evenementen-list-item__icon"><i class="fas fa-comment"></i></span>{{ $evenement->snelle_info }}
                                            </p>
                                        @endif
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
