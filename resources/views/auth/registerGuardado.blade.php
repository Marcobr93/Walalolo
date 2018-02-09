@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro de Usuario</div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group row{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                                <label for="nombre_usuario" class="col-lg-4 col-form-label text-lg-right">Nombre de usuario</label>

                                <div class="col-md-6">
                                    <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="{{ old('nombre_usuario') }}"  autofocus>

                                    @if ($errors->has('nombre_usuario'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('apellido') ? ' has-error' : '' }}">
                                <label for="apellido" class="col-lg-4 col-form-label text-lg-right">Apellidos</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}"  autofocus>

                                    @if ($errors->has('apellido'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('apellido') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('dni') ? ' has-error' : '' }}">
                                <label for="dni" class="col-lg-4 col-form-label text-lg-right">DNI</label>

                                <div class="col-md-6">
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" autofocus>

                                    @if ($errors->has('dni'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('num_telefono') ? ' has-error' : '' }}">
                                <label for="num_telefono" class="col-lg-4 col-form-label text-lg-right">Nº Teléfono</label>

                                <div class="col-md-6">
                                    <input id="num_telefono" type="text" class="form-control" name="num_telefono" value="{{ old('num_telefono') }}" autofocus>

                                    @if ($errors->has('num_telefono'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('num_telefono') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion" class="col-lg-4 col-form-label text-lg-right">Dirección</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}"  autofocus>

                                    @if ($errors->has('direccion'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('poblacion') ? ' has-error' : '' }}">
                                <label for="poblacion" class="col-lg-4 col-form-label text-lg-right">Población</label>

                                <div class="col-md-6">
                                    <input id="poblacion" type="text" class="form-control" name="poblacion" value="{{ old('poblacion') }}"  autofocus>

                                    @if ($errors->has('poblacion'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('poblacion') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-lg-4 col-form-label text-lg-right">Avatar</label>

                                <div class="col-md-6">
                                    <input id="avatar" type="text" class="form-control" name="avatar" value="{{ old('avatar') }}" autofocus>

                                    @if ($errors->has('avatar'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="website" class="col-lg-4 col-form-label text-lg-right">Website</label>

                                <div class="col-md-6">
                                    <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}" autofocus>

                                    @if ($errors->has('website'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label for="descripcion" class="col-lg-4 col-form-label text-lg-right">Descripción</label>

                                <div class="col-md-6">
                                    <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" autofocus>

                                    @if ($errors->has('descripcion'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-lg-4 col-form-label text-lg-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" >

                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label text-lg-right">Confirmar contraseña</label>

                                <div class="col-lg-6">
                                    <input
                                            type="password"
                                            class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                            name="password_confirmation"
                                    >
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <button type="submit" class="btn btn-primary">
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
@endsection
