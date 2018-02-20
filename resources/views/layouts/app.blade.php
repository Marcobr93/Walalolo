<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/walalolo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinner.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iziModal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>
<body class="bg-color2">
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth()
                    <li class="nav-item">
                        <a href="{{ url('/') }}/productos/create" class="nav-link">Añadir Producto</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/') }}/perfil/{{Auth::user()->nombre_usuario}}" class="nav-link">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/') }}/ofertas/{{Auth::user()->nombre_usuario}}" class="nav-link">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/') }}/user/{{Auth::user()->slug}}" class="nav-link">Tus productos</a>
                    </li>

                @endauth

                {{--<form class="form-inline my-2 my-lg-0">--}}
                {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>--}}
                {{--</form>--}}

            </ul>
            <div class="justify-content-end">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registro</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link-active dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->slug}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-color" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ url('/') }}/perfil/{{Auth::user()->nombre_usuario}}" class="dropdown-item">
                                    Perfil
                                </a>
                                <a href="{{ url('/') }}/ofertas/{{Auth::user()->nombre_usuario}}" class="dropdown-item">
                                    Ofertas</a>
                                <a href="{{ url('/') }}/user/{{Auth::user()->slug}}" class="dropdown-item">
                                    Tus productos</a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-area">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
        integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
        crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
