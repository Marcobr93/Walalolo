@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark blanco">Registro de Usuario</div>
                    <div class="card-body mt-2">
                        <form role="form" id="formularioRegistro" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group row{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                                <label for="nombre_usuario" class="col-lg-4 col-form-label text-lg-right ng">Nombre de
                                    usuario</label>

                                <div class="col-md-6">
                                    <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario"
                                           value="{{ old('nombre_usuario') }}" autofocus>

                                    @if ($errors->has('nombre_usuario'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-lg-4 col-form-label text-lg-right ng">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password"
                                       class="col-lg-4 col-form-label text-lg-right ng">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right ng">Confirmar contraseña</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation"
                                    >
                                    @include('layouts.spinner')
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" id="botonRegistro" class="btn btn-dark blanco">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/validacionRegistro.js') }}"></script>
    @endpush
@endsection
