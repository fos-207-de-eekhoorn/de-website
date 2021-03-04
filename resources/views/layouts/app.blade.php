<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.app_components.head')
    </head>

    <body>
        @include('layouts.app_components.header')

        <main class="main">
            @if (config('app.env') === 'staging')
                @component('components.page_warning', [
                    'type' => 'error',
                ])
                    Dit is een testversie van onze website.<br>
                    De informatie die hier te vinden is, is NIET actueel of juist.
                @endcomponent
            @endif

            <div class="container cs-white shadow">
                <div class="main__inner">
                    @yield('content')
                </div>
            </div>
        </main>

        @include('layouts.app_components.footer')

        @include('layouts.app_components.bottom_footer')
    </body>
</html>