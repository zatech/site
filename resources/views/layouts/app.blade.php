<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ config('services.google.analytics') }}');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name'))</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand navbar-light bg-light mb-5">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                        </li>
                    @else
                        <!-- Well this is awkward! 🙇‍
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.connect') }}">Connect</a>
                        </li>
                        -->
                    @endauth
                </ul>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </body>
</html>
