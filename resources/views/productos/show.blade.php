@extends('layouts.app')

@section('content')
    <div class="row course-set courses__row producto">
        <div class="col-md-12">

            <div class="bg-light rounded">
                <h3>
                    Título: {{ $producto['titulo'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $producto['foto'] }}" alt="Foto del producto." />
            </div>

            <div class="bg-light rounded">
                <h3>
                    Precio: {{ $producto['precio'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                    {{ $producto->user->name }}
            </div>

            <div class="bg-light rounded">
                <h3>
                    Descripción: {{ $producto['descripcion'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                <h3>
                    Dirección: {{ $producto['direccion'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                <h3>
                    Población: {{ $producto['poblacion'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                <h3>
                    Categoría: {{ $producto['categoria'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                <h3>
                    Tipo de envío: {{ $producto['tipo_envio'] }}
                </h3>
            </div>

            <div class="bg-light rounded">
                @if($producto['negociacion_precio'] === 1)
                <h3>
                    Negociación del precio: Sí.
                </h3>
                @else
                    <h3>
                        Negociación del precio: No.
                    </h3>
                @endif
            </div>

            <div class="bg-light rounded">
                @if($producto['intercambio_producto'] === 1)

                <h3>
                    Intercambio del producto: Sí.
                </h3>
                @else
                    <h3>
                        Intercambio del producto: No.
                    </h3>
                @endif
            </div>

            <div class="bg-light rounded">
                @if($producto['destacado'] === 1)
                <h3>
                    Destacado: Sí.
                </h3>
                    @else
                    <h3>
                        Destacado: No.
                    </h3>
                @endif
            </div>

        </div>
    </div>
@endsection