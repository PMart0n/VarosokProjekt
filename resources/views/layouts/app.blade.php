<!DOCTYPE HTML>
<html>
    <head>
        <title>Városok Projekt</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
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
                                    <ul>
                                        <li><a href="{{ route('fooldal') }}">Főoldal</a></li>
                                        <li><a href="{{ route('adatbazis') }}">Adatbázis</a></li>
                                        <li><a href="{{ route('diagram') }}">Diagram</a></li>
                                        <li><a href="#">CRUD</a></li>
                                        <li><a href="{{ route('kapcsolat') }}">Kapcsolat</a></li>
                                    </ul>
                                    
                                    <br>

                                    <header class="major">
                                        <h2>Fiók</h2>
                                    </header>
                                    <ul>
                                        <li><a href="#">Bejelentkezés</a></li>
                                        <li><a href="#">Regisztráció</a></li>
                                        
                                        <li><a href="{{ route('uzenetek') }}">Üzenetek</a></li>
                                        <li><a href="{{ route('admin') }}">Admin</a></li>
                                        <li><a href="#">Kijelentkezés</a></li>
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