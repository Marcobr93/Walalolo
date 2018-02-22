@extends('layouts.app')

@section('content')

    @include('valoraciones.valoracion')

    @auth
        @include('valoraciones.valorar')
        @include('users.mensajeDirecto')

        @if($user->id !== Auth::user()->id)
            <ul class="nav nav-pills nav-justified">
                <a id="abrirModalValorar" class="nav-item nav-link active btn-primary mx-4 mt-1">Valorar</a>
                <a id="abrirModalMD" class="nav-item nav-link active btn-primary mx-4 mt-1">Mensaje Directo</a>
            </ul>

            <div class="text-center">
                <a href="/user/{{ $user->slug }}/conversation">
                    <img src="{{ asset('images/message.png') }}">
                </a>
            </div>
        @endif
    @endauth

    <div class="text-center producto">
        <h1>Productos de {{ $user['nombre_usuario'] }}</h1>
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

    <button id="btntoggle" class="btn btn-dark center my-4">Mostrar {{$user->reviews->count()}} Comentarios</button>

    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse mb-4" id="elemento1">
                <div class="card card-body">
                    @include('reviews.reviews')
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    @auth
        @if($user->id !== Auth::user()->id)
            <script src="{{ asset('js/izimodal.min.js') }}"></script>
            <script src="{{ asset('js/modal.js') }}"></script>
        @endif
    @endauth
    <script src="{{ asset('js/collapse.js') }}"></script>
@endpush