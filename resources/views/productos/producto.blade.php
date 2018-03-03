@if(!Request::is('user/*'))
    @include('layouts.carousel')
@endif

@if($productos->isEmpty())
    <p>No hay productos para mostrar.</p>
@endif

@foreach($productos->chunk(3) as $chunk)
    <div class="card-group row course-set courses__row producto">
        @foreach($chunk as $producto)
            <div class="card col-lg-4 mr-2 bg-light">
                <div class="card-header bg-transparent border-primary text-truncate">
                    <a data-toggle="tooltip" data-placement="top" title="Información del producto"
                       href="/producto/{{ $producto['id'] }}">{{ $producto['titulo'] }} </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a data-toggle="tooltip" data-placement="bottom" title="Perfil del usuario"
                           class="btn pull-right" href="/user/{{ $producto->user->slug }}">
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
                    </h5>
                    <h5 class="card-img">
                        <a href="/producto/{{ $producto['id'] }}">
                            <img class="lozad img-responsive img-fluid img-portfolio img-hover mb-3 "
                                 src="{{ $producto['foto'] }}"
                                 onerror="src='{{ asset('images/default_product.jpeg') }}'"
                                 alt="Foto del producto {{ $producto['titulo'] }}"/>
                        </a>
                    </h5>
                    <p class="card-text">{{ $producto['descripcion'] }}</p>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <h4 class="price ng">
                        Precio: {{ $producto['precio'] }} €
                    </h4>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

<div class="col-lg-6 offset-lg-3">
    <div class="pagination mx-auto text-center mb-4">
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>
</div>

