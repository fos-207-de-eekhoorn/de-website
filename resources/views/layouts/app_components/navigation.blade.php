<nav class="nav">
    <input type="checkbox" id="nav__toggle" class="nav__checkbox" hidden>

    <div class="nav__responsive" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <label for="nav__toggle" class="nav__toggle">
            <i class="fas fa-bars"></i>
        </label>
    </div>

    <div class="nav__inner">
        <ul class="nav__list">
            {{-- Home --}}
            <li class="nav__list-item">
                <a href="{{ route('home') }}" class="nav__link{{ Request::is('/') ? ' nav__link--active' : '' }}">
                    Home
                </a>
            </li>

            {{-- Takken --}}
            <li class="nav__list-item nav__list-item--sublist">
                <input type="checkbox" id="nav__toggle-sublist--takken" class="nav__checkbox" hidden>

                <label for="nav__toggle-sublist--takken" class="nav__link">
                    Takken<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                </label>

                <ul class="nav__sublist">
                    <li class="nav__sublist-item">
                        <a href="{{ route('takken') }}" class="nav__link nav__link--sublist">
                            Overzicht
                        </a>
                    </li>

                    <div class="nav__sublist-item-divider"></div>

                    @foreach($takken as $tak)
                        <li class="nav__sublist-item">
                            <a href="{{ route('takken.details', ['tak' => $tak->slug]) }}" class="nav__link nav__link--sublist">
                                {{ $tak->naam }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            {{-- Info --}}
            <li class="nav__list-item nav__list-item--sublist">
                <input type="checkbox" id="nav__toggle-sublist--alle-info" class="nav__checkbox" hidden>

                <label for="nav__toggle-sublist--alle-info" class="nav__link">
                    Alle&nbsp;info<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                </label>

                <ul class="nav__sublist">
                    <li class="nav__sublist-item">
                        <a href="{{ route('info') }}" class="nav__link nav__link--sublist">
                            Overzicht
                        </a>
                    </li>

                    <div class="nav__sublist-item-divider"></div>

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.uniform') }}" class="nav__link nav__link--sublist">
                            Uniform & shop
                        </a>
                    </li>

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.verhuurlijst') }}" class="nav__link nav__link--sublist">
                            Verhuurlijst
                        </a>
                    </li>

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.lid-worden') }}" class="nav__link nav__link--sublist">
                            Lid worden
                        </a>
                    </li>

                    {{--
                    <li class="nav__sublist-item">
                        <a href="{{ route('info.inschrijven') }}" class="nav__link nav__link--sublist">
                            Inschrijven
                        </a>
                    </li>
                    --}}

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.kost') }}" class="nav__link nav__link--sublist">
                            Kost scouts
                        </a>
                    </li>

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.documenten') }}" class="nav__link nav__link--sublist">
                            Attesten & documenten
                        </a>
                    </li>

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.trooper') }}" class="nav__link nav__link--sublist">
                            Trooper
                        </a>
                    </li>

                    <li class="nav__sublist-item">
                        <a href="{{ route('info.jeugdwerkregels') }}" class="nav__link nav__link--sublist">
                            Jeugdwerkregels
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Evenementen --}}
            <li class="nav__list-item nav__list-item--sublist">
                <input type="checkbox" id="nav__toggle-sublist--evenementen" class="nav__checkbox" hidden>

                <label for="nav__toggle-sublist--evenementen" class="nav__link">
                    Evenementen<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                </label>

                <ul class="nav__sublist">
                    <li class="nav__sublist-item">
                        <a href="{{ route('evenementen') }}" class="nav__link nav__link--sublist">
                            Overzicht
                        </a>
                    </li>

                    <div class="nav__sublist-item-divider"></div>

                    @foreach($evenementen as $evenement)
                        <li class="nav__sublist-item">
                            <a href="{{
                                $evenement->has_static_url
                                    ? route('evenementen.'.$evenement->url)
                                    : route('evenementen.details', ['evenement' => $evenement->url])
                            }}" class="nav__link nav__link--sublist">
                                {{ $evenement->naam }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            {{-- Inschrijven
            <li class="nav__list-item">
                <a href="/inschrijven" class="nav__link {{ Request::is('/kamp') ? 'nav__link--active' : '' }}">
                    Inschrijven
                </a>
            </li>
            --}}

            {{-- Contact --}}
            <li class="nav__list-item">
                <a href="/contact" class="nav__link {{ Request::is('/contact') ? 'nav__link--active' : '' }}">
                    Contact
                </a>
            </li>

            {{-- Login --}}
            {{-- Admin --}}
            @guest
                @if (config('app.env') === 'local')
                    <li class="nav__list-item nav__list-item--small">
                        <a href="/login" class="nav__link">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </li>
                @endif
            @else
                <li class="nav__list-item nav__list-item--sublist{{ Request::is('/profile*') || Request::is('/admin*') ? ' nav__link--active' : '' }}">
                    <input type="checkbox" id="nav__toggle-sublist--auth" class="nav__checkbox" hidden>

                    <label for="nav__toggle-sublist--auth" class="nav__link">
                        Admin<span class="fa--after"><i class="fas fa-caret-down"></i></span>
                    </label>

                    <ul class="nav__sublist">
                        {{-- Overzicht --}}
                        <li class="nav__sublist-item">
                            <a href="/profile" class="nav__link nav__link--sublist">
                                Profiel
                            </a>
                        </li>

                        <div class="nav__sublist-item-divider"></div>

                        {{-- Activiteiten --}}
                        <li class="nav__sublist-item">
                            <a href="/admin/activiteiten" class="nav__link nav__link--sublist">
                                <span class="fa--before icon"><i class="fas fa-dice"></i></span>Activiteiten
                            </a>
                        </li>

                        {{-- Evenementen --}}
                        <li class="nav__sublist-item">
                            <a href="/admin/evenementen" class="nav__link nav__link--sublist">
                                <span class="fa--before icon"><i class="fas fa-calendar-alt"></i></span>Evenementen
                            </a>
                        </li>

                        {{-- Inschrijvingen --}}
                        <li class="nav__sublist-item">
                            <a href="/admin/inschrijvingen" class="nav__link nav__link--sublist">
                                <span class="fa--before icon"><i class="fas fa-user-plus"></i></span>Inschrijvingen
                            </a>
                        </li>

                        {{-- Blog --}}
                        <li class="nav__sublist-item">
                            <a href="/admin/blog/" class="nav__link nav__link--sublist">
                                <span class="fa--before icon"><i class="fas fa-newspaper"></i></span>Blog
                            </a>
                        </li>

                        {{-- Content --}}
                        <li class="nav__sublist-item">
                            <a href="/admin/contents" class="nav__link nav__link--sublist">
                                <span class="fa--before icon"><i class="fas fa-comment-alt"></i></span>Content
                            </a>
                        </li>

                        {{-- Instellingen --}}
                        <li class="nav__sublist-item">
                            <a href="/admin/settings" class="nav__link nav__link--sublist">
                                <span class="fa--before icon"><i class="fas fa-cog"></i></span>Instellingen
                            </a>
                        </li>

                        <div class="nav__sublist-item-divider"></div>

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
    </div>
</nav>