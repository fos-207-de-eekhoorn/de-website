<footer class="footer cs-grey-extra-light">
    <div class="container">
        <div class="row">
            <nav class="col-12 col-lg-8 footer__section">
                <ul class="footer__section footer-nav">
                    <li class="footer-nav__item">
                        <a href="/" class="footer-nav__link footer-nav__link--parent">Home</a>
                    </li>

                    <li class="footer-nav__item">
                        <a href="{{ route('takken') }}" class="footer-nav__link footer-nav__link--parent">Takken</a>

                        <ul class="footer-nav__sublist">
                            @foreach($takken as $tak)
                                <li class="footer-nav__item">
                                    <a href="{{ route('takken.details', ['tak' => $tak->slug]) }}" class="footer-nav__link footer-nav__link--sublink">
                                        {{ $tak->naam }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="footer-nav__item">
                        <a href="{{ route('info') }}" class="footer-nav__link footer-nav__link--parent">Meer informatie</a>

                        <ul class="footer-nav__sublist">
                            <li class="footer-nav__item">
                                <a href="{{ route('info.uniform') }}" class="footer-nav__link footer-nav__link--sublink">Uniform & shop</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="{{ route('info.verhuurlijst') }}" class="footer-nav__link footer-nav__link--sublink">Verhuurlijst</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="{{ route('info.lid-worden') }}" class="footer-nav__link footer-nav__link--sublink">Lid worden</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="{{ route('info.kost') }}" class="footer-nav__link footer-nav__link--sublink">Kost scouts</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="{{ route('info.documenten') }}" class="footer-nav__link footer-nav__link--sublink">Attesten & documenten</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="{{ route('info.trooper') }}" class="footer-nav__link footer-nav__link--sublink">Trooper</a>
                            </li>

                            <li class="footer-nav__item">
                                <a href="{{ route('info.jeugdwerkregels') }}" class="footer-nav__link footer-nav__link--sublink">Jeugdwerkregels</a>
                            </li>
                        </ul>
                    </li>

                    <li class="footer-nav__item">
                        <a href="{{ route('evenementen') }}" class="footer-nav__link footer-nav__link--parent">Evenementen</a>

                        <ul class="footer-nav__sublist">
                            @foreach($evenementen as $evenement)
                                <li class="footer-nav__item">
                                    <a href="{{
                                        $evenement->has_static_url
                                            ? route('evenementen.'.$evenement->url)
                                            : route('evenementen.details', ['evenement' => $evenement->url])
                                    }}" class="footer-nav__link footer-nav__link--sublink">
                                        {{ $evenement->naam }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
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
                            <a href="https://www.youtube.com/user/ScoutsOostkamp" class="social__link social__link--youtube" target="_blank">
                                <span class="fa--lg"><i class="fab fa-youtube"></i></span>
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
                        'center_on_mobile' => 1,
                        'leider' => $el,
                        'email_overwrite' => 'fos207ste@gmail.com',
                    ])
                    @endcomponent
                </section>
            </div>
        </div>
    </div>
</footer>