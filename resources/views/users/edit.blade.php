@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-lg-12 text-center">
                <table class="mt-4 table table-striped table-bordered">
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" @if(Request::is('perfil/cuenta')) class="bg-color3" @endif><a href="{{route('perfil.cuenta')}}">Cuenta</a></th>
                        <th scope="col" @if(Request::is('perfil/password')) class="bg-color3" @endif><a href="{{route('perfil.password')}}">Contraseña</a></th>
                        <th scope="col" @if(Request::is('perfil/avatar')) class="bg-color3" @endif><a href="{{route('perfil.avatar')}}">Foto</a></th>
                        <th scope="col" @if(Request::is('perfil/datos-personales')) class="bg-color3" @endif><a href="{{route('perfil.personal')}}">Datos personales</a></th>
                    </tr>
                    </thead>
                </table>
            </div>

            <div class="col-lg-12 form-group row center">
                @if( session('exito') )
                    <div class="bg-success">
                        <h5>Actualización correcta</h5>
                    </div>
                @elseif( session('error'))
                    <div class="bg-danger">
                        <h5>{{ session('error') }}</h5>
                    </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data" class="ml-4">
                    {{ csrf_field() }}

                    @if(Request::is('perfil/cuenta'))
                        @include('users.partials.cuenta')

                    @elseif(Request::is('perfil/password'))
                        @include('users.partials.password')

                    @elseif(Request::is('perfil/avatar'))
                        @include('users.partials.avatar')

                    @elseif(Request::is('perfil/datos-personales'))
                        @include('users.partials.datosPersonales')

                    @endif

                </form>
            </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/validacionEditar.js') }}"></script>
<script src="{{ asset('js/lozad.js') }}"></script>
@endpush