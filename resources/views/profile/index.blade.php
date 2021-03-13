@extends('layouts.app')

@section('title', 'Admin console')

@section('content')
    @component('components.banner', [
        'banner' => (object)[
            'color' => 'blue',
            'pattern' => '1',
            'strength' => 'light',
            'size' => 'small',
        ],
        'page_title' => 'Admin profiel',
    ])
    @endcomponent

    <div class="row section">
        <div class="col-12">
            @component('components.breadcrumbs', [
                'current' => 'Profiel',
            ])@endcomponent     
        </div>

        <div class="col-12 col-md-4 section">
            <div class="profile">
                <h2 class="profile__name">
                    Hey @if (isset($user->identity->totem))
                        {{ $user->identity->totem }}
                    @else
                        {{ $user->identity->firstname }}
                    @endif
                </h2>

                <img src="{{ asset('/img/leiding/'.$user->identity->foto) }}" alt="" class="profile__profile-image">

                <p class="profile__info">
                    <span class="fa--before"><i class="fas fa-phone"></i></span>{{ $user->identity->telefoon }}
                </p>

                <p class="profile__info">
                    <span class="fa--before"><i class="fas fa-at"></i></span>{{ $user->identity->email }}
                </p>

                @if(isset($user->identity->tak) || isset($user->identity->roles))
                    <div class="profile__extras">
                        @if(isset($user->identity->tak))
                            <div>
                                <h5 class="profile__extras-title">
                                    {{ $user->identity->tak->korte_naam }}
                                </h5>

                                <p class="profile__tak-introductie">
                                    {{ $user->identity->tak->introductie }}
                                </p>
                            </div>
                        @endif

                        @if(isset($user->identity->roles))
                            <div>
                                <h5 class="profile__extras-title">
                                    Roles
                                </h5>

                                <ul class="profile__roles-list">
                                    @foreach ($user->identity->roles as $role)
                                        <li class="profile__roles-list-item">
                                            <span class="profile__roles-list-icon fa--before">
                                                <i class="fas fa-circle"></i>
                                            </span>
                                            {{ $role->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endif

                <p class="profile__edit">
                    <a href="{{ route('profile.edit') }}">
                        <span class="fa--before"><i class="fas fa-pencil-alt"></i></span>
                        Pas je profiel aan
                    </a>
                </p>
            </div>
        </div>

        <div class="col-12 col-md-8 section">
            <h3>Modules</h3>

            <div class="row small-gutters">
                <div class="col-12 col-md-4 section section--extra-small-spacing">
                    <a href="{{ route('admin.activiteiten') }}" class="admin-module">
                        <h4>Activiteiten</h4>
                        <div class="admin-module__icon">
                            <i class="fas fa-dice"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 section section--extra-small-spacing">
                    <a href="{{ route('admin.evenementen') }}" class="admin-module">
                        <h4>Evenementen</h4>
                        <div class="admin-module__icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 section section--extra-small-spacing">
                    <a href="{{ route('admin.inschrijvingen') }}" class="admin-module">
                        <h4>Inschrijvingen</h4>
                        <div class="admin-module__icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 section section--extra-small-spacing">
                    <a href="{{ route('admin.blog.posts') }}" class="admin-module">
                        <h4>Blog</h4>
                        <div class="admin-module__icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 section section--extra-small-spacing">
                    <a href="{{ route('admin.contents') }}" class="admin-module">
                        <h4>Content</h4>
                        <div class="admin-module__icon">
                            <i class="fas fa-comment-alt"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-md-4 section section--extra-small-spacing">
                    <a href="{{ route('admin.settings') }}" class="admin-module">
                        <h4>Instellingen</h4>
                        <div class="admin-module__icon">
                            <i class="fas fa-cog"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection