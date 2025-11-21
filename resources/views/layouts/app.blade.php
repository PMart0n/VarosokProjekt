<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Városok Projekt</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="is-preload">

        <div id="wrapper">

                <div id="main">
                        <div class="inner">

                            <header id="header">
                                    <a href="{{ route('fooldal') }}" class="logo"><strong>Városok Projekt</strong></a>
                            </header>

                            @yield('content')

                        </div>
                    </div>

                <div id="sidebar">
                        <div class="inner">

                            <nav id="menu">
                                    <header class="major">
                                        <h2>Menü</h2>
                                    </header>
                                    <header class="minor">
                                        @auth
                                            <p>Üdvözöllek, {{ auth()->user()->name }}!</p>
                                        @endauth

                                        @guest
                                            <p>Üdvözöllek, Vendég!</p>
                                        @endguest
                                    </header>
                                    <br>
                                    <ul>
                                        <li><a href="{{ route('fooldal') }}">Főoldal</a></li>
                                        <li><a href="{{ route('adatbazis') }}">Adatbázis</a></li>
                                        <li><a href="{{ route('diagram') }}">Diagram</a></li>
                                        <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>
                                    </ul>
                                    
                                    <br>

                                    <header class="major">
                                        <h2>Fiók</h2>
                                    </header>
                                    <ul>
                                        @guest
                                            <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
                                            <li><a href="{{ route('register') }}">Regisztráció</a></li>
                                        @endguest                                   
                                        @auth
                                            @if(auth()->user()->role === 'user' || auth()->user()->role === 'admin')
                                                <li><a href="{{ route('uzenetek') }}">Üzenetek</a></li>
                                            @endif
                                            @if(auth()->user()->role === 'admin')
                                                <li><a href="{{ route('admin') }}">Admin</a></li>
                                            @endif
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Kijelentkezés
                                            </a></li>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @endauth
                                        
                                    </ul>
                                </nav>

                            <footer id="footer">
                                    <p class="copyright">&copy; Városok Projekt. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                                </footer>

                        </div>
                    </div>

            </div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
            <script src="{{ asset('assets/js/browser.min.js') }}"></script>
            <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
            <script src="{{ asset('assets/js/util.js') }}"></script>
            <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>