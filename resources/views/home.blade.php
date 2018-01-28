@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header">Productos destacados</h1>
            </div>
        </div>
    </div>

    <div id="carousel" class="carousel slide w-100 m-auto" data-interval="7000" data-pause="false" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid center" src="http://www.idhardware.com/wp-content/uploads/2012/07/imagen-equipo.jpg" alt="Primera imagen">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid center" src="http://www.ikea.com/es/es/images/products/gamlared-mesa__0517435_PE640691_S4.JPG" alt="Segunda imagen">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid center" src="http://www.ikea.com/es/es/images/products/lerhamn-silla-beige__0449225_PE598749_S4.JPG" alt="Tercera imagen">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    @if($productos->isEmpty())
        <p>No hay productos para mostrar.</p>
    @endif

    @foreach($productos->chunk(3) as $chunk)
        <div class="row course-set courses__row producto">
            @foreach($chunk as $producto)
                <div class="col-md-4">
                    <div>
                        <h3>
                            Usuario: {{ $producto->user->name }}
                        </h3>
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