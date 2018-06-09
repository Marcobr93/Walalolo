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

        <div id="paginacion">
            @include('productos.producto')
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
    <script src="{{ asset('js/datos.js') }}" defer></script>
    <script src="{{ asset('js/collapse.js') }}"></script>
@endpush