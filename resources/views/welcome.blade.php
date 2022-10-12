<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ТЕЛЕГА @yield('title')</title>

        <!-- Fonts -->
        <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">
        <script src="{{asset('public/assets/js/bootstrap.bundle.js')}}"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Меню панели</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('main')}}">Главная страница</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('telegram-setting.index')}}">Настройки Telegram</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Команда Telegram</a>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content') {{-- поле контента--}}
    </body>
</html>
