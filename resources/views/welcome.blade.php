<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{asset('public/assets/css/bootstrap.css')}}" rel="stylesheet">
        <script src="{{asset('public/assets/js/bootstrap.bundle.js')}}"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('welcome')}}">Практика</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Главная</a>
                        </li>
                        @guest
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Авторизация</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}">Выход</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="{{route('cabinet')}}">Кабинет</a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role->role=='admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Администрирование
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('admin.users.index')}}">Пользователи</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{route('admin.roles.index')}}">Роли</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
