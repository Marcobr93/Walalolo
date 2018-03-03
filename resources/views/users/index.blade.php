@extends('layouts.app')

@section('content')
    <div class="bg-color4">

        @include('valoraciones.valoracion')

        @auth
            @include('valoraciones.valorar')
            @include('users.mensajeDirecto')

            @if($user->id !== Auth::user()->id)
                <ul class="nav nav-pills nav-justified">
                    <a id="abrirModalValorar" class="nav-item nav-link active btn-primary mx-4 mt-1">Valorar</a>
                    <a id="abrirModalMD" class="nav-item nav-link active btn-primary mx-4 mt-1">Mensaje Directo</a>
                </ul>

                @if( $conversation )
                    <div class="text-center">
                        <a href="{{ route('conversation.show', $conversation->id) }}">
                            <img src="{{ asset('images/message.png') }}">
                        </a>
                    </div>
                @endif

            @endif
        @endauth

        <div class="text-center mt-4">
            <img class="img-responsive img-fluid img-portfolio img-hover lozad ancho_max_imagen"
                 data-src="{{ $user['avatar']}}" src="{{ $user['avatar']}}"
                 onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                 alt="Avatar del usuario."/>
        </div>

        <div class="text-center mt-4">
            <h1>Productos de {{ $user['nombre_usuario'] }} ({{$totalProductos}})</h1>
        </div>

        <div id="paginacion">
            @include('productos.producto')
        </div>

        <ul class="nav nav-pills nav-justified">
            @auth
                @if($user->id !== Auth::user()->id)
                    @include('reviews.create')
                    <a id="abrirModalComentar" class="nav-item nav-link active btn-primary mx-4 mt-1">Comentar</a>
                @endif
            @endauth
        </ul>

        <button id="btntoggle" data-toggle="collapse" class="btn btn-dark center my-4">
            Mostrar {{$user->reviews->count()}} Comentarios
        </button>

                <div class="col-lg-12 collapse multi-collapse mb-4 bg-color4" id="elemento1">
                    <div class="card card-body bg-dark">
                        @include('reviews.reviews')
                    </div>
                </div>

    </div>
@endsection

@push('scripts')
    @auth
        @if($user->id !== Auth::user()->id)
            <script src="{{ asset('js/iziModal.js') }}"></script>
            <script src="{{ asset('js/modal.js') }}"></script>
        @endif
    @endauth
    <script src="{{ asset('js/collapse.js') }}"></script>
@endpush