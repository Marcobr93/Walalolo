@extends('layouts.app')

@section('content')

    @include('valoraciones.valoracion')

    <ul class="nav nav-pills nav-justified">
        @auth
            @include('valoraciones.valorar')
            @include('users.mensajeDirecto')
        @if($user->id !== Auth::user()->id)
                <a class="nav-item nav-link active btn-primary mx-4 mt-1" data-toggle="modal"
                   data-target="#valorar">Valorar</a>

                <a class="nav-item nav-link active btn-primary mx-4 mt-1" data-toggle="modal"
                   data-target="#mensajeDirecto">Mensaje Directo</a>
            @endif
        @endauth
    </ul>


    {{--<button class="btn btn-dark">--}}
        {{--<a href="/user/conversations/{{$conversation->id}}"--}}
           {{--class="nav-link">Ver mensajes directos</a>--}}
    {{--</button>--}}

    <div class="text-center producto">
        <h1>Productos de {{ $user['nombre_usuario'] }}</h1>
    </div>

    <div id="paginacion">
        @include('productos.producto')
    </div>

    @auth
        @include('reviews.create')
        @if($user->id !== Auth::user()->id)
            <a class="nav-item nav-link active btn-primary mx-4 text-center mt-4" data-toggle="modal"
               data-target="#comentar">Comentar</a>
        @endif
    @endauth

    <ul class="nav nav-pills nav-justified producto">
        <a class="nav-item nav-link active btn-dark"
           onClick="muestra_oculta('reviews')">Mostrar {{$user->reviews->count()}}
            Comentarios</a>
    </ul>

    @include('reviews.reviews')

@endsection

@push('scripts')
    <script src="{{ asset('js/walalolo.js') }}" defer></script>
@endpush