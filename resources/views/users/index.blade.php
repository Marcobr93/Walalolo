@extends('layouts.app')

@section('content')
    <div class="bg-color4" id="usuario">

        <div class="col-lg-12 my-3">
            <h4 class="col-lg-12 text-center">
                <img class="lozad" data-src="{{ asset('images/location.png') }}">
                @if($data->postal_code !== ""){{$data->postal_code . ','}} @endif{{$data->city}}
            </h4>
            <div id="map" class="map col-lg-12"></div>
        </div>

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

                <div class="text-center mt-4">
                    <a href="/user/{{ $user->slug }}">
                        <img class="rounded mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_user"
                             data-src="{{ $user->avatar }}"
                             onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                             alt="Foto del usuario {{ $user->nombre_usuario }}"/>
                    </a>
                </div>

            @endif
        @endauth

        <div class="text-center mt-4 jumbotron-fluid">
            <h1>Productos de {{ $user->nombre_usuario }} ({{$totalProductos}})</h1>
        </div>

        <div id="paginacionUser">
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

        <button id="btnCollapse" data-toggle="collapse" class="btn btn-dark center my-4">
            Mostrar {{$user->reviews->count()}} Comentarios
        </button>

        <div class="col-lg-12 collapse multi-collapse mb-4 bg-color4" id="mostrarReviews">
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
            <script src="{{ asset('js/disableButton.js') }}"></script>
        @endif
    @endauth
    <script src="{{ asset('funcionesAsync.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/lozad.js') }}" defer></script>

    <script>
        $(function () {
            maps('{{ $data->lat }}', '{{ $data->lon }}', '{{ $data->city }}');
        })
    </script>
@endpush