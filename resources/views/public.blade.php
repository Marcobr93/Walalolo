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
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel slide w-100 m-auto" role="listbox" data-interval="7000" data-pause="false" data-ride="carousel">
            <div class="item active">
                <img src="http://www.idhardware.com/wp-content/uploads/2012/07/imagen-equipo.jpg" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="http://www.ikea.com/es/es/images/products/gamlared-mesa__0517435_PE640691_S4.JPG" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="http://www.ikea.com/es/es/images/products/lerhamn-silla-beige__0449225_PE598749_S4.JPG" alt="...">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @forelse($productos as $producto)
        <div class="col-md-4 producto ng">
            <div>
                <h3>
                    Usuario: {{ $producto->user->name }}
                </h3>
            </div>

            <div>
                <h4 class="ng">
                    {{ $producto['titulo'] }}
                </h4>
            </div>

            <div>
                <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $producto['foto'] }}" alt="Foto del producto." />
            </div>

            <div>
                <h4 class="ng">
                    Precio: {{ $producto['precio'] }} €
                </h4>
            </div>
            <div>
                Descripción: {{ $producto['descripcion'] }}
            </div>
        </div>
    @empty
        <p>No hay productos para mostrar.</p>
    @endforelse

    <div class="text-center">{{ $productos->links() }}</div>

@endsection