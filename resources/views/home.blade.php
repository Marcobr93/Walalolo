@extends('layouts.app')

@section('content')
    <div class="bg-color4 mb-4 border rounded">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header text-center">Productos destacados</h1>
                </div>
            </div>
        </div>


        <div id="carousel" class="carousel slide w-100 m-auto" data-interval="7000" data-pause="false"
             data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                @foreach($productos as $producto)
                    @if($producto['destacado'] === 1)
                        <div class="carousel-item {{ $elementoActivo == $producto['id']?'active':'' }} ">
                            <a href="/producto/{{ $producto['id'] }}">
                                <img class="img-fluid center lozad img-size" data-src="{{ $producto['foto'] }}"
                                     src="{{ $producto['foto'] }}" alt="Imagen destacada">
                            </a>
                            <div class="carousel-caption d-none d-md-block"></div>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="paginacion">
            @include('productos.producto')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
    {{--<script src="{{ asset('js/datos.js') }}" defer></script>--}}
@endpush