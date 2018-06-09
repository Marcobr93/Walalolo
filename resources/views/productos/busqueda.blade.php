@extends('layouts.app')

@section('content')

    <button id="btnCollapseBusqueda" data-toggle="collapse" class="btn btn-dark center my-4">
        Búsqueda avanzada
    </button>
    <div class="collapse multi-collapse" id="mostrarBusqueda">
        @include('productos.categorias')
    </div>

    <div class="bg-color2">
        <div id="paginacion">
            @include('productos.producto')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush