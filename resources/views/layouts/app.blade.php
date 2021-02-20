<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.app_components.head')
    </head>

    <body>
        @include('layouts.app_components.header')

        <main class="main">
            <div class="container page-warning page-warning--error">
                <div class="page-warning__icon icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

                <p class="page-warning__warning text--align-center">
                    Dit is een testversie van onze website.<br>
                    De informatie die hier te vinden is, is NIET actueel of juist.
                </p>

                <div class="page-warning__icon icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>

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