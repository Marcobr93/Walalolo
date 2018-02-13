@extends('layouts.app')

@section('content')

    @push('scripts')
        <script src="{{ asset('js/walalolo.js') }}"></script>
    @endpush

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

    @include('valoraciones.valoracion')


    <div class="text-center producto">
        <h1>Productos de {{ $user['nombre_usuario'] }}</h1>
    </div>

    @include('productos.producto')

    @if($user->id !== Auth::user()->id)
        <a class="nav-item nav-link active btn-primary mx-4 text-center mt-4" data-toggle="modal"
           data-target="#comentar">Comentar</a>
    @endif


    <ul class="nav nav-pills nav-justified producto">
        <a class="nav-item nav-link active btn-primary"
           onClick="muestra_oculta('reviews')">Mostrar {{$user->reviews->count()}}
            Comentarios</a>
    </ul>

    @include('reviews.reviews')

@endsection