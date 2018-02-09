@extends('layouts.app')

@section('content')
    <div class="card-group row course-set courses__row producto">
        <div class="col-md-12">

            <div class="card-header bg-transparent border-primary">
                <h3>
                    {{ $producto['titulo'] }}
                </h3>
            </div>
            <div class="card-body">
                <h3 class="card-title">
                    <a class="btn pull-right" href="/user/{{ $producto->user->slug }}">
                        {{ $producto->user->nombre_usuario }}
                    </a>
                </h3>

                <h5 class="card-img">
                    <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $producto['foto'] }}"
                         alt="Foto del producto."/>
                </h5>

                <h3 class="card-text">Precio: {{ $producto['precio'] }} €</h3>

                <h3 class="card-text">Dirección: {{ $producto['direccion'] }}</h3>

                <h3 class="card-text">Población: {{ $producto['poblacion'] }}</h3>

                <h3 class="card-text">Categoría: {{ $producto['categoria'] }}</h3>

                <h3 class="card-text">Tipo de envío: {{ $producto['tipo_envio'] }}</h3>

                <h3 class="card-text">
                    @if($producto['intercambio_producto'] === 1)

                        <h3>
                            Intercambio del producto: Sí.
                        </h3>
                    @else
                        <h3>
                            Intercambio del producto: No.
                        </h3>
                    @endif
                </h3>

                <h3 class="card-text">
                    @if($producto['destacado'] === 1)
                        <h3>
                            Destacado: Sí.
                        </h3>
                    @else
                        <h3>
                            Destacado: No.
                        </h3>
                    @endif
                </h3>

                <h3 class="card-text">Descripción: {{ $producto['descripcion'] }}</h3>

            </div>
            <div class="card-footer bg-transparent border-primary">
                @if($producto['negociacion_precio'] === 1)
                    <h3>
                        Negociación del precio: Sí.
                    </h3>
                    @auth()
                        @include('contraofertas.contraoferta')
                    @endauth
                @else
                    <h3>
                        Negociación del precio: No.
                    </h3>
                @endif
            </div>
        </div>
    </div>
@endsection