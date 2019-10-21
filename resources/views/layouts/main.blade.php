<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>FOS207 'De Eekhoorn' / Home</title>

        <!-- Styles -->
        <link href="/css/style.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    </head>

    <body>
        <header class="header">
            <div class="container header__inner">
                <div class="header__content logo">
                    <a href="/" class="logo__link">
                        <img src="/img/logo.jpg" alt="FOS 207 'De Eekhoorn'" class="logo__img">
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

                                <li class="nav__sublist-item">
                                    <a href="/takken/bevers" class="nav__link nav__link--sublist">
                                        Bevers
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/takken/welpen" class="nav__link nav__link--sublist">
                                        Welpen
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/takken/jonge" class="nav__link nav__link--sublist">
                                        JV/G
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/takken/oude" class="nav__link nav__link--sublist">
                                        OV/G
                                    </a>
                                </li>
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

                        <li class="nav__list-item nav__list-item--sublist">
                            <input type="checkbox" id="nav__toggle-sublist--evenementen" class="nav__checkbox" hidden>

                            <label for="nav__toggle-sublist--evenementen" class="nav__link">
                                Evenementen<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                            </label>

                            <ul class="nav__sublist">
                                {{--
                                <li class="nav__sublist-item">
                                    <a href="/evenementen" class="nav__link nav__link--sublist">
                                        Overzicht
                                    </a>
                                </li>
                                --}}

                                <li class="nav__sublist-item">
                                    <a href="/evenementen/spaghetti-avond" class="nav__link nav__link--sublist">
                                        Spaghetti avond
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/evenementen/bbq" class="nav__link nav__link--sublist">
                                        BBQ
                                    </a>
                                </li>

                                <li class="nav__sublist-item">
                                    <a href="/evenementen/winterbar" class="nav__link nav__link--sublist">
                                        Winterbar
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{--
                        <li class="nav__list-item">
                            <a href="/contact" class="nav__link {{ Request::is('/contact') ? 'nav__link--active' : '' }}">
                                Contact
                            </a>
                        </li>
                        --}}
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main">
            <div class="container cs-white">
                <div class="main__inner">
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="footer">
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
                                    <li class="footer-nav__item">
                                        <a href="/takken/bevers" class="footer-nav__link footer-nav__link--sublink">Bevers</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/takken/welpen" class="footer-nav__link footer-nav__link--sublink">Welpen</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/takken/jonge" class="footer-nav__link footer-nav__link--sublink">Jonge</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/takken/oude" class="footer-nav__link footer-nav__link--sublink">Oude</a>
                                    </li>
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
                                        <a href="/alle-info/verhuurlijst" class="footer-nav__link footer-nav__link--sublink">Lid worden</a>
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

                            <li class="footer-nav__item">
                                <a class="footer-nav__link footer-nav__link--parent">Evenementen</a>
                                <ul class="footer-nav__sublist">
                                    <li class="footer-nav__item">
                                        <a href="/evenementen/spaghetti-avond" class="footer-nav__link footer-nav__link--sublink">Spaghetti-avond</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/evenementen/bbq" class="footer-nav__link footer-nav__link--sublink">BBQ</a>
                                    </li>

                                    <li class="footer-nav__item">
                                        <a href="/evenementen/winterbar" class="footer-nav__link footer-nav__link--sublink">Winterbar</a>
                                    </li>
                                </ul>
                            </li>

                            {{--
                            <li class="footer-nav__item">
                                <a href="/contact" class="footer-nav__link footer-nav__link--parent">Contact</a>
                            </li>
                            --}}
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
                            <div class="contact">
                                <div class="row">
                                    <div class="col-4"> 
                                        <div class="contact__img-wrapper">
                                            <img src="/img/eenheidsleiding.jpg" alt="Ara" class="contact__img">
                                        </div>
                                    </div>
                            
                                    <div class="col-8">
                                        <h5 class="contact__title">Eenheidsleidster</h5>
                                        <p>Marie 'Ara'<br>Lammertyn</p>
                                        <a href="tel:0491089740" target="_blank">0491/08.97.40</a>
                                        <a href="mailto:fos207ste@gmail.com" target="_blank">fos207ste@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </footer>

        <div class="footer footer--bottom cs-grey-dark">
            <div class="container">
                <div class="footer__inner">
                    <a href="/privacy" class="footer__bottom-text" target="_blank">Privacyverklaring</a>

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