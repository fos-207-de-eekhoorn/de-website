<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>FOS207 'De Eekhoorn' / Home</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/img/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/img/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/img/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/img/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/img/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/img/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/img/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/img/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/img/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/img/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('/img/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#c9dd03">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Slick -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <!-- Styles -->
        <link href="/css/style.css?v=0.4.9" rel="stylesheet">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        @component('components.analytics')
        @endcomponent
    </head>

    <body>
        <header class="header">
            <div class="container header__inner">
                <div class="header__content logo">
                    <a href="/" class="logo__link">
                        <img src="{{ asset('/img/logo.png') }}" alt="FOS 207 'De Eekhoorn'" class="logo__img">
                    </a>
                </div>

                <nav class="nav">
                    <input type="checkbox" id="nav__toggle" class="nav__checkbox" hidden>

                    <div class="nav__responsive" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <label for="nav__toggle" class="nav__toggle">
                            <i class="fas fa-bars"></i>
                        </label>
                    </div>

                    <ul class="nav__list">
                        <li class="nav__list-item">
                            <a href="/" class="nav__link{{ Request::is('/') ? ' nav__link--active' : '' }}">
                                Home
                            </a>
                        </li>

                        <li class="nav__list-item nav__list-item--sublist">
                            <input type="checkbox" id="nav__toggle-sublist--takken" class="nav__checkbox" hidden>

                            <label for="nav__toggle-sublist--takken" class="nav__link">
                                Takken<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                            </label>

                            <ul class="nav__sublist">
                                <li class="nav__sublist-item">
                                    <a href="/takken/" class="nav__link nav__link--sublist">
                                        Overzicht
                                    </a>
                                </li>

                                @foreach($takken as $tak)
                                    <li class="nav__sublist-item">
                                        <a href="/takken/{{ $tak->link }}" class="nav__link nav__link--sublist">
                                            {{ $tak->naam }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav__list-item nav__list-item--sublist">
                            <input type="checkbox" id="nav__toggle-sublist--alle-info" class="nav__checkbox" hidden>

                            <label for="nav__toggle-sublist--alle-info" class="nav__link">
                                Alle&nbsp;info<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                            </label>

                            <ul class="nav__sublist">
                                <li class="nav__sublist-item">
                                    <a href="/alle-info" class="nav__link nav__link--sublist">
                                        Overzicht
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/alle-info/uniform-shop" class="nav__link nav__link--sublist">
                                        Uniform & shop
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/alle-info/verhuurlijst" class="nav__link nav__link--sublist">
                                        Verhuurlijst
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/alle-info/lid-worden" class="nav__link nav__link--sublist">
                                        Lid worden
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/alle-info/kost-scouts" class="nav__link nav__link--sublist">
                                        Kost scouts
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/alle-info/trooper" class="nav__link nav__link--sublist">
                                        Trooper
                                    </a>
                                </li>
                                {{--
                                <li class="nav__sublist-item">
                                    <a href="/alle-info/docs" class="nav__link nav__link--sublist">
                                        Attesten & documenten
                                    </a>
                                </li>
                                --}}
                            </ul>
                        </li>

                        {{--
                        <li class="nav__list-item nav__list-item--sublist">
                            <input type="checkbox" id="nav__toggle-sublist--evenementen" class="nav__checkbox" hidden>

                            <label for="nav__toggle-sublist--evenementen" class="nav__link">
                                Evenementen<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                            </label>

                            <ul class="nav__sublist">
                                <li class="nav__sublist-item">
                                    <a href="/evenementen" class="nav__link nav__link--sublist">
                                        Overzicht
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/evenementen/bivak/bevers-welpen" class="nav__link nav__link--sublist">
                                        Bivak bevers & welpen
                                    </a>
                                </li>
                            </ul>
                        </li>
                        --}}

                        <li class="nav__list-item">
                            <a href="/inschrijven" class="nav__link {{ Request::is('/kamp') ? 'nav__link--active' : '' }}">
                                Inschrijven
                            </a>
                        </li>

                        <li class="nav__list-item">
                            <a href="/contact" class="nav__link {{ Request::is('/contact') ? 'nav__link--active' : '' }}">
                                Contact
                            </a>
                        </li>

                        @guest
                        @else
                            <li class="nav__list-item nav__list-item--sublist{{ Request::is('/admin*') ? ' nav__link--active' : '' }}">
                                <input type="checkbox" id="nav__toggle-sublist--auth" class="nav__checkbox" hidden>

                                <label for="nav__toggle-sublist--auth" class="nav__link">
                                    Admin<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                                </label>

                                <ul class="nav__sublist">
                                    <li class="nav__sublist-item">
                                        <a href="/admin/activiteiten" class="nav__link nav__link--sublist">
                                            Activiteiten
                                        </a>
                                    </li>

                                    <li class="nav__sublist-item">
                                        <a href="/admin/inschrijvingen" class="nav__link nav__link--sublist">
                                            Inschrijvingen
                                        </a>
                                    </li>

                                    <li class="nav__sublist-item">
                                        <a href="/change-password" class="nav__link nav__link--sublist">
                                            Wijzig wachtwoord
                                        </a>
                                    </li>

                                    <li class="nav__sublist-item">
                                        <a href="{{ route('logout') }}" class="nav__link nav__link--sublist" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="fa--before"><i class="fas fa-sign-out-alt"></i></span>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main">
            <div class="container cs-white shadow">
                <div class="main__inner">
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="footer cs-grey-extra-light">
            <div class="container">
                <div class="row">
                    <nav class="col-12 col-lg-8 footer__section">
                        <ul class="footer__section footer-nav">
                            <li class="footer-nav__item">
                                <a href="/" class="footer-nav__link footer-nav__link--parent">Home</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="/takken" class="footer-nav__link footer-nav__link--parent">Takken</a>

                                <ul class="footer-nav__sublist">
                                    @foreach($takken as $tak)
                                        <li class="footer-nav__item">
                                            <a href="/takken/{{ $tak->link }}" class="footer-nav__link footer-nav__link--sublink">
                                                {{ $tak->naam }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="footer-nav__item">
                                <a href="/alle-info" class="footer-nav__link footer-nav__link--parent">Meer informatie</a>

                                <ul class="footer-nav__sublist">
                                    <li class="footer-nav__item">
                                        <a href="/alle-info/uniform-shop" class="footer-nav__link footer-nav__link--sublink">Uniform & shop</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/alle-info/verhuurlijst" class="footer-nav__link footer-nav__link--sublink">Verhuurlijst</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/alle-info/lid-worden" class="footer-nav__link footer-nav__link--sublink">Lid worden</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/alle-info/kost-scouts" class="footer-nav__link footer-nav__link--sublink">Kost scouts</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/alle-info/trooper" class="footer-nav__link footer-nav__link--sublink">Trooper</a>
                                    </li>

                                    {{--
                                    <li class="footer-nav__item">
                                        <a href="/alle-info/docs" class="footer-nav__link footer-nav__link--sublink">Attesten & documenten</a>
                                    </li>
                                    --}}
                                </ul>
                            </li>

                            {{--
                            <li class="footer-nav__item">
                                <a class="footer-nav__link footer-nav__link--parent">Evenementen</a>

                                <ul class="footer-nav__sublist">
                                    <li class="footer-nav__item">
                                        <a href="/evenementen/bivak/bevers-welpen" class="footer-nav__link footer-nav__link--sublink">Bivak bevers & welpen</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/evenementen/bivak/jonge" class="footer-nav__link footer-nav__link--sublink">Bivak JG/V</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/evenementen/bivak/oude" class="footer-nav__link footer-nav__link--sublink">Bivak JG/V</a>
                                    </li>
                                </ul>
                            </li>
                            --}}

                            <li class="footer-nav__item">
                                <a href="/inschrijven" class="footer-nav__link footer-nav__link--parent">Inschrijven</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="/contact" class="footer-nav__link footer-nav__link--parent">Contact</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="col-12 col-lg-4 footer__section">
                        <section class="footer__section">
                            <h3 class="footer__title">Waar kan je ons vinden?</h3>

                            <ul class="social">
                                <li class="social__item">
                                    <a href="https://www.facebook.com/fos207/" class="social__link social__link--facebook" target="_blank">
                                        <span class="fa--lg"><i class="fab fa-facebook-square"></i></span>
                                    </a>
                                </li>
                            
                                <li class="social__item">
                                    <a href="https://www.instagram.com/fos207_de_eekhoorn/" class="social__link social__link--instagram" target="_blank">
                                        <span class="fa--lg"><i class="fab fa-instagram"></i></span>
                                    </a>
                                </li>
                            
                                <li class="social__item">
                                    <a href="https://www.google.be/maps/place/51%C2%B009'26.2%22N+3%C2%B014'36.3%22E/@51.1572892,3.2426402,18z/data=!3m1!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d51.1572881!4d3.243414" class="social__link social__link--google" target="_blank">
                                        <span class="fa--lg"><i class="fas fa-map-marked-alt"></i></span>
                                    </a>
                                </li>
                            
                                <li class="social__item">
                                    <a href="mailto:fos207ste@gmail.com" class="social__link social__link--mail" target="_blank">
                                        <span class="fa--lg"><i class="fas fa-at"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </section>

                        <section class="footer__section">
                            <h3 class="footer__title">Contacteer ons</h3>

                            @component('components.leiding_card', [
                                'leider' => $el,
                                'email_overwrite' => 'fos207ste@gmail.com',
                            ])
                            @endcomponent
                        </section>
                    </div>
                </div>
            </div>
        </footer>

        <div class="footer footer--bottom cs-grey-dark">
            <div class="container">
                <div class="footer__inner">
                    <a href="https://fosopenscouting.be/nl/privacyverklaring" class="footer__bottom-text" target="_blank">Privacyverklaring</a>

                    <p class="footer__bottom-text">
                        Copyright &copy; FOS207 'De Eekhoorn'
                    </p>

                    <p class="footer__bottom-text">
                        Gemaakt door Nel Vandenbrande en Orry Verpoort
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>