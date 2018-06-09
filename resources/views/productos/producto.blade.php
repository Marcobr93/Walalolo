@if((!Request::is('user/*')) && (!Request::is('busqueda*')))
    @include('layouts.carousel')

    <button id="btnCollapseBusqueda" data-toggle="collapse" class="btn btn-dark center my-4">
        Búsqueda avanzada
    </button>
    <div class="collapse multi-collapse" id="mostrarBusqueda">
        @include('productos.categorias')
    </div>

@endif

@if($productos->isEmpty())
    <h4 class="text-center">No hay productos para mostrar.</h4>
@endif

@foreach($productos->chunk(3) as $chunk)
    <div class="card-group row course-set courses__row producto" id="prueba">
        @foreach($chunk as $producto)
            <div class="card col-lg-4 mr-2 bg-light">
                <div class="card-header bg-transparent border-primary text-truncate">
                    {{ $producto['titulo'] }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        @if(!Request::is('user/*'))
                            <a data-toggle="tooltip" data-placement="bottom"
                               title="Perfil de {{ $producto->user->nombre_usuario }}"
                               class="pull-right badge badge-pill badge-dark" href="/user/{{ $producto->user->slug }}">
                                {{ $producto->user->nombre_usuario }}
                            </a>
                            <a href="/user/{{ $producto->user->slug }}">
                                <img class="rounded-circle mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_conversation"
                                     src="{{ $producto->user->avatar }}"
                                     onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                                     alt="Foto del usuario {{ $producto->user->nombre_usuario }}"/>
                            </a>
                            <div class="card-text text-right">
                                <img src="{{ asset('images/visitas.png') }}">
                                {{$producto->getVisitasCount()}}
                            </div>
                        @else
                            <div class="card-text text-center">
                                <img src="{{ asset('images/visitas.png') }}">
                                {{$producto->getVisitasCount()}}
                            </div>
                        @endif
                    </h5>
                    <h5 class="card-img">
                        <a href="/producto/{{ $producto['id'] }}" TARGET="_BLANK">
                            <img class="rounded lozad img-responsive img-fluid img-portfolio img-hover mb-3 "
                                 src="{{ $producto['foto'] }}"
                                 onerror="src='{{ asset('images/default_product.jpeg') }}'"
                                 alt="Foto del producto {{ $producto['titulo'] }}"/>
                        </a>
                    </h5>
                    <h5 class="card-text">{{ $producto['descripcion'] }}</h5>
                </div>
                <div class="row card-footer bg-transparent border-primary">
                    <h4 class="price ng col-lg-8">
                        Precio: {{ $producto['precio'] }} €
                    </h4>
                    @if(Auth::user() == $producto->user)
                        <form class="col-lg-4" action="{{ route('borrar.async', $producto->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="btn bg-light">
                                <a href="#" class="nav-link blanco" data-toggle="modal" data-target="#borrarProducto">
                                    <img class="img-responsive img-fluid img-portfolio img-hover"
                                         src="{{ asset('images/delete.png') }}"
                                         alt="Borrar producto."/>
                                </a>
                            </button>
                            <div class="modal fade mt-4" id="borrarProducto" tabindex="-1" data-backdrop="static" data-show="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark blanco">
                                            <h5 class="modal-title" id="ejemploLabel">Borrar Producto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h1 class="alert alert-danger text-center mt-2">El borrado del producto es irreversible.</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="borrarAsync" type="submit" class="btn btn-primary btnSubmit">BORRAR</button>
                                            <button id="cancel" type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endforeach

<div class="col-lg-6 offset-lg-3">
    <div class="pagination mx-auto text-center mb-4">
        {{ $productos->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>
