@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills nav-justified">
        @auth
            @include('valoraciones.valorar')
            @include('reviews.review')
        @if($user->id !== Auth::user()->id)
            <a class="nav-item nav-link active btn-primary mx-4" data-toggle="modal"
               data-target="#valorar">Valorar</a>

            <a class="nav-item nav-link active btn-primary mx-4" data-toggle="modal"
               data-target="#comentar">Comentar</a>
            @endif
        @endauth
    </ul>

    <div class="text-center producto">
        <h1>Productos de {{ $user['nombre_usuario'] }}</h1>
    </div>
     {{--@include('valoraciones.valoracion')--}}

    @include('productos.producto')

    <ul class="nav nav-pills nav-justified producto">
        <a class="nav-item nav-link active btn-primary" onClick="muestra_oculta('reviews')">Mostrar {{$user->reviews->count()}}
            Comentarios</a>
    </ul>

    @include('reviews.reviews')

    <div class="text-center">{{ $productos->links('pagination::bootstrap-4') }}</div>
@endsection