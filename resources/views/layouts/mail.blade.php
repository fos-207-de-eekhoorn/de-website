<!DOCTYPE html>
<html lang="be-nl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            {{ $subject }}
        </title>

        <style>
            body {
                padding: 15px;
                background-color: #f4f4f4;

                font-family: Arial, sans-serif;
                font-size: 16px;
                font-weight: 400;
                color: #666666;
            }

            .container {
                max-width: 600px;
                padding: 30px;
                margin: 0 auto;
                border-radius: 0.25rem;
                background-color: #fff;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            }

            .logo {
                display: block;
                max-width: 300px;
                margin: .5rem auto 30px;
            }
            .logo--tradler {
                display: block;
                width: 120px;
                margin: 0 auto 30px 0;
            }

            .seperator {
                margin: 2rem 0;

                text-align: right;
            }
            .seperator__line {
                height: 1px;
                width: 100%;
                margin: .25rem 0;
                background-color: #e2e3e5;
            }
            .seperator__flag {
                height: 1rem;
                width: auto;
                margin-left: 5px;
            }

            h1,
            h2,
            h3,
            h4 {
                color: #333c4e;
            }

            h1,
            h2,
            h3,
            h4,
            p {
                margin: 0 0 1rem;
            }

            h1 {
                font-size: 1.8rem;
            }
            h2 {
                font-size: 1.8rem;
            }
            h3 {
                font-size: 1.4rem;
            }
            h4 {
                font-size: 1.1rem;
                margin-bottom: 0;
            }

            a {
                color: #3bafbf;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }

            .support {
                font-size: .8rem;
                color: #828282;
            }

            .button {
                transition: box-shadow 150ms ease-in-out;
                display: inline-block;
                padding: .75rem 1.5rem;
                margin-top: 5px;
                border-radius: 4px;
                background-color: #3bafbf;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);

                font-size: 1.5rem;
                text-decoration: none;
                color: #fff;
            }
            .button:hover {
                box-shadow: 0 1.5px 3px rgba(0, 0, 0, 0.1);

                text-decoration: none;
            }

            .text--bold {
                font-weight: 700;
            }

            .text--italic {
                font-style: italic;
            }

            .text--blue {
                color: #3bafbf;
            }

            @media only screen and (max-device-width: 480px) {
                body,
                .container {
                    padding: 0;
                }
            }

            @hasSection('style')
                @yield('style')
            @endif
        </style>
    </head>

    <body style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;background-color:#f4f4f4;font-family:Arial, sans-serif;font-size:16px;font-weight:400;color:#666666;" >
        <div class="container" style="max-width:600px;padding-top:30px;padding-bottom:30px;padding-right:30px;padding-left:30px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;border-radius:0.25rem;background-color:#fff;box-shadow:0 3px 6px rgba(0, 0, 0, 0.1);" >
                <img src="{{ asset('/img/logo.png') }}" alt="FOS 207 De Eekhoorn" class="logo" style="display:block;max-width:300px;margin-top:.5rem;margin-bottom:30px;margin-right:auto;margin-left:auto;" >
                @yield('body')
        </div>
    </body>
</html>
