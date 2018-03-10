<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth()
                    <li class="nav-item">
                        <a href="{{ url('/') }}/productos/crear" class="nav-link">Añadir Producto</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a href="/tabla-busqueda" class="nav-link">Tabla de productos</a>
                </li>
            </ul>
            <div class="justify-content-end">
                <ul class="navbar-nav">
                    <form class="form-inline my-2 my-lg-0 mr-4" action="/busqueda">
                        <input class="form-control mr-sm-2" type="search" id="busqueda" name="busqueda"
                               placeholder="Búsqueda" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Búsqueda</button>
                    </form>
                    @if (Auth::guest())
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registro</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <button href="#" class="btn btn-dark nav-link-active dropdown-toggle"
                                    id="navbarDropdownMenuLink"
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->nombre_usuario}}
                            </button>
                            <a href="{{ url('/') }}/perfil">
                                <img class="rounded-circle mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_navbar"
                                     data-src="{{ Auth::user()->avatar }}"
                                     onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                                     alt="Foto del usuario {{ Auth::user()->nombre_usuario }}"/>
                            </a>
                            <a href="{{ route('conversation.all', Auth::user()->slug) }}">
                                <img class="ml-2 rounded mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_navbar"
                                     data-src="{{ asset('images/mensaje.png') }}"
                                />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-dark border-primary"
                                 aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ url('/') }}/perfil" class="dropdown-item blanco">
                                    Perfil
                                </a>
                                <a href="{{ url('/') }}/ofertas/{{Auth::user()->slug}}"
                                   class="dropdown-item blanco">
                                    Ofertas</a>
                                <a href="{{ url('/') }}/user/{{Auth::user()->slug}}" class="dropdown-item blanco">
                                    Tus productos</a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item blanco"
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
    </div>
</nav>