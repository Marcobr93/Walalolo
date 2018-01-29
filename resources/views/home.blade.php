@extends('layouts.app')

@section('content')
    <div class="bg-white">
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
                <img class="img-fluid center" src="data:image/jpeg;base64,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">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            @foreach($productos as $producto)
                @if($producto['destacado'] !== 0)
            <div class="carousel-item">
                <img class="img-fluid center" src="{{ $producto['foto'] }}" alt="Imagen destacada">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
                @endif
            @endforeach
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

      @include('productos.producto')

    <div class="text-center">{{ $productos->links('pagination::bootstrap-4') }}</div>
    </div>
@endsection
