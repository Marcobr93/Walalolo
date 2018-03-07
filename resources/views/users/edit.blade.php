@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12 text-center row">
            <table class="mt-4 table table-striped table-bordered">
                <thead class="bg-dark">
                <tr>
                    <th scope="col" @if(Request::is('perfil/editar/cuenta')) class="bg-color5" @endif><a
                                href="{{route('perfil.cuenta')}}">Cuenta</a></th>
                    <th scope="col" @if(Request::is('perfil/editar/password')) class="bg-color5" @endif><a
                                href="{{route('perfil.password')}}">Contraseña</a></th>
                    <th scope="col" @if(Request::is('perfil/editar/avatar')) class="bg-color5" @endif><a
                                href="{{route('perfil.avatar')}}">Foto</a></th>
                    <th scope="col" @if(Request::is('perfil/editar/datos-personales')) class="bg-color5" @endif><a
                                href="{{route('perfil.personal')}}">Datos personales</a></th>
                    <th scope="col"
                        @if(Request::is('perfil/editar/borrar-usuario')) class="bg-color5" @endif><a
                                href="{{route('usuario.borrar')}}">Borrar Usuario</a></th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="col-lg-12 form-group row center">
            @if( session('exito') )
                <div class="alert alert-success text-center" role="alert">
                    <h5>Actualización correcta</h5>
                </div>
            @elseif( session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    <h5>{{ session('error') }}</h5>
                </div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data" class="ml-4">
                {{ csrf_field() }}

                @if(Request::is('perfil/editar/cuenta'))
                    @include('users.editar.cuenta')

                @elseif(Request::is('perfil/editar/password'))
                    @include('users.editar.password')

                @elseif(Request::is('perfil/editar/avatar'))
                    @include('users.editar.avatar')

                @elseif(Request::is('perfil/editar/datos-personales'))
                    @include('users.editar.datosPersonales')

                @elseif(Request::is('perfil/editar/borrar-usuario'))
                    @include('users.editar.delete')
                @endif

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/validacionEditar.js') }}"></script>
    <script src="{{ asset('js/lozad.js') }}"></script>
@endpush