@extends('layouts.app')

@section('content')
    <div class="text-center">{{ $productos->links() }}</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header">Productos</h1>
            </div>
        </div>
    </div>
    @foreach($productos->chunk(3) as $chunk)
        <div class="row course-set courses__row producto">
            @foreach($chunk as $producto)
                <div class="col-md-4">

                    <div class="ng">
                        <h3>
                            Usuario: {{ $producto->user->name }}
                        </h3>
                    </div>

                    <div class="ng">
                        <h4>
                            {{ $producto['titulo'] }}
                        </h4>
                    </div>

                    <div>
                        <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $producto['foto'] }}" alt="Foto del producto." />
                    </div>

                    <div>
                        <h4 class="price ng">
                            Precio: {{ $producto['precio'] }} €
                        </h4>
                    </div>
                    <div>
                        <p class="ng">
                            Descripción: {{ $producto['descripcion'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="text-center">{{ $productos->links() }}</div>

@endsection