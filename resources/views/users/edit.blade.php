@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-md-center mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center card-header bg-dark blanco">Editar datos</div>
                    <div class="card-body">
                        <form role="form" id="formularioEditar"
                              action="{{route('user.update',array('id'=>Auth::user()->id))}}" method="post"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group row @if( $errors->has('nombre_usuario'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right" for="nombre_usuario">Nombre de
                                    Usuario</label>

                                <div class="col-lg-9">

                                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario"
                                           placeholder="Nombre de Usuario" value="{{ Auth::user()->nombre_usuario}}">

                                    @if ($errors->has('nombre_usuario'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row @if( $errors->has('name'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right" for="name">Nombre</label>

                                <div class="col-lg-9">

                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                           value="{{ Auth::user()->name}}">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row @if( $errors->has('apellido'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right" for="apellido">Apellidos</label>

                                <div class="col-lg-9">

                                    <input type="text" class="form-control" name="apellido" id="apellido"
                                           placeholder="Apellidos" value="{{ Auth::user()->apellido }}">
                                    @if ($errors->has('apellido'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('apellido') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="avatar">Avatar</label>

                                    <div class="col-lg-6">
                                        <input type="file" class="text-center" name="avatar" id="avatar"
                                               value="{{ Auth::user()->avatar }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row @if( $errors->has('num_telefono'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="num_telefono">Número de
                                        teléfono</label>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="num_telefono" id="num_telefono"
                                               placeholder="Número de teléfono" value="{{Auth::user()->num_telefono}}">
                                        @if ($errors->has('num_telefono'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('num_telefono') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6 form-group row @if( $errors->has('email'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="email">Email</label>

                                    <div class="col-lg-6">

                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Email"
                                               value="{{ Auth::user()->email }}">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row @if( $errors->has('dni'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="dni">DNI</label>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI"
                                               value="{{Auth::user()->dni}}">
                                        @if ($errors->has('dni'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('dni') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6  form-group row">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="website">WebSite</label>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="website" id="website"
                                               placeholder="WebSite"
                                               value="{{ Auth::user()->website}}">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row widget @if( $errors->has('poblacion'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right"
                                           for="poblacion">Población</label>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="poblacion" id="poblacion"
                                               placeholder="Población" value="{{Auth::user()->poblacion}}">


                                        @if ($errors->has('poblacion'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('poblacion') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row @if( $errors->has('direccion'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right"
                                       for="direccion">Dirección</label>

                                <div class="col-lg-9">

                                    <input type="text" class="form-control" name="direccion" id="direccion"
                                           placeholder="Dirección" value="{{Auth::user()->direccion}}">
                                    @if ($errors->has('direccion'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row @if( $errors->has('descripcion'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right"
                                       for="descripcion">Descripción</label>

                                <div class="col-lg-9">

                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5">
                                        {{Auth::user()->descripcion}}
                                    </textarea>
                                    @if ($errors->has('descripcion'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-dark" id="botonEditar" type="submit">Enviar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@push('scripts')--}}
    {{--<script src="{{ asset('js/validacionEditar.js') }}"></script>--}}
    {{--@endpush--}}
    @push('scripts')
        {{--<script src="{{ asset('js/autocomplete.js') }}" defer></script>--}}
        <script src="{{ asset('js/search.js') }}" defer></script>
    @endpush
@endsection