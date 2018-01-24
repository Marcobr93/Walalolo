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
    @forelse($productos as $producto)
        <div class="row">
            <div class="col-4">
                <div class="main-category-image">

                    <div class="ng">Título: {{ $producto['titulo'] }}</div>

                    <img class="img-fluid img-portfolio img-hover mb-3" src="{{ $producto['foto'] }}" />

                    <div class="caption">
                        <h4 class="pull-left price ng">
                            Precio: {{ $producto['precio'] }}
                        </h4>
                        <div class="clearfix"></div>
                        <p class="product-block-description hidden-sm-down ng">
                            Descripción: {{ $producto['descripcion'] }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <p>No hay productos para mostrar.</p>
    @endforelse

    <div class="text-center">{{ $productos->links() }}</div>

@endsection