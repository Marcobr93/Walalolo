@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-lg-12 text-center mb-4">
            <button class="btn btn-dark">
                <a class="nav-link"
                   href="/perfil/editar">Editar Perfil</a>
            </button>
        </div>

        <div class="col-lg-12 center row">

            <ul class="nav nav-pills nav-justified">
                <button id="perfilCuenta" class="nav-item nav-link  bg-color-dark mx-4 mt-1 blanco">
                    Cuenta
                </button>
                <button id="perfilDatosPersonales" class="nav-item nav-link bg-color-dark mx-4 mt-1 blanco">
                    Datos Personales
                </button>
                <button id="perfilLocalizacion" class="nav-item nav-link bg-color-dark mx-4 mt-1 blanco">
                    Localización
                </button>
            </ul>
        </div>

        <div class="col-lg-12 form-group row center">
            <div id="datosPerfil"></div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/vistas.js') }}"></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endpush