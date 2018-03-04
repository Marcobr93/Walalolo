@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img class="img-responsive img-fluid img-portfolio img-hover" src="{{ asset('images/404.gif') }}">
    </div>

    <h1 class="text-center mt-4 ng">
        Productos aleatorios
    </h1>
    @if($productos->isEmpty())
        <p>No hay productos para mostrar.</p>
    @endif

    @foreach($productos->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row my-4">
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
                                     data-src="{{ $producto->user->avatar }}"
                                     onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                                     alt="Foto del usuario {{ $producto->user->nombre_usuario }}"/>
                            </a>
                        </h5>
                        <h5 class="card-img">
                            <a href="/producto/{{ $producto['id'] }}">
                                <img class="lozad img-responsive img-fluid img-portfolio img-hover mb-3 "
                                     data-src="{{ $producto['foto'] }}"
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
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}"></script>
@endpush