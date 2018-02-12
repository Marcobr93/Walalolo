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

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="bg-light">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light color-fondo">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <img class="nav-item img-responsive img-fluid img-portfolio img-hover mb-3" src="/images/wololopequeño.png"
                 alt="Logo"/>

            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-inverse p-4">
                        <h4 class="text-white">Collapsed content</h4>
                        <span class="text-muted">Toggleable via the navbar brand.</span>
                    </div>
                </div>
                <nav class="navbar navbar-inverse bg-inverse">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"
                            aria-controls="navbarToggleExternalContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>

            <div class="collapse navbar-collapse justify-content-start" id="menu">
                <ul class="navbar-nav">
                    @auth()
                        <li class="nav-item active"><a href="{{ url('/') }}/productos/create" class="nav-link">Añadir
                                Producto</a></li>
                        <li class="nav-item active"><a href="{{ url('/') }}/perfil/{{Auth::user()->nombre_usuario}}" class="nav-link">Perfil</a></li>
                        <li class="nav-item active"><a href="{{ url('/') }}/ofertas/{{Auth::user()->nombre_usuario}}"
                                                       class="nav-link">Ofertas</a></li>
                        <li class="nav-item active"><a href="{{ url('/') }}/user/{{Auth::user()->slug}}"
                                                       class="nav-link">Tus productos</a></li>
                    @endauth
                </ul>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registro</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->slug}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ url('/') }}/profile" class="dropdown-item">
                                    Perfil
                                </a>
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
<script src="{{ asset('js/validacionRegistro.js') }}"></script>
<script src="{{ asset('js/validacionProducto.js') }}"></script>
{{--<script src="{{ asset('js/datos.js') }}"></script>--}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

</body>
</html>
