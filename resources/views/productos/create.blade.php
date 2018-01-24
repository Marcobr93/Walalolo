@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Añadir producto</div>

                    <div class="panel-body">
                        <form action="{{ url('/') }}/productos/create" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nombre_usuario') ? ' has-error' : '' }}">
                                <label for="nombre_usuario" class="col-md-4 control-label">Nombre de usuario</label>

                                <div class="col-md-6">
                                    <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="{{ old('nombre_usuario') }}" autofocus>

                                    @if($errors->has('nombre_usuario'))
                                        @foreach($errors->get('nombre_usuario') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <label for="titulo" class="col-md-4 control-label">Título</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" autofocus>

                                    @if($errors->has('titulo'))
                                        @foreach($errors->get('titulo') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                                <label for="foto" class="col-md-4 control-label">Foto</label>

                                <div class="col-md-6">
                                    <input id="foto" type="text" class="form-control" name="foto" value="{{ old('foto') }}" autofocus>

                                    @if($errors->has('foto'))
                                        @foreach($errors->get('foto') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion" class="col-md-4 control-label">Dirección</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autofocus>

                                    @if($errors->has('direccion'))
                                        @foreach($errors->get('direccion') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('poblacion') ? ' has-error' : '' }}">
                                <label for="poblacion" class="col-md-4 control-label">Población</label>

                                <div class="col-md-6">
                                    <input id="poblacion" type="text" class="form-control" name="poblacion" value="{{ old('name') }}" autofocus>

                                    @if($errors->has('poblacion'))
                                        @foreach($errors->get('poblacion') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                                <label for="precio" class="col-md-4 control-label">Precio</label>

                                <div class="col-md-6">
                                    <input id="precio" type="number" step="any" class="form-control" name="precio" value="{{ old('precio') }}" autofocus>

                                    @if($errors->has('precio'))
                                        @foreach($errors->get('precio') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                                <label for="categoria" class="col-md-4 control-label">Categoría</label>

                                <div class="col-md-6">
                                    <select name="categoria" class="custom-select custom-select-lg mb-3" id="categoria" title="Categoría">
                                        <option selected>Selecciona</option>
                                        <option value="deporte_ocio">Deporte y Ocio</option>
                                        <option value="muebles_deco_jardin">Muebles, Deco y Jardín</option>
                                        <option value="consolas_videojuegos">Consolas y Videojuegos</option>
                                        <option value="libros_peliculas_musica">Libros, Películas y Música</option>
                                        <option value="moda_accesorios">Moda y Accesorios</option>
                                        <option value="niños_bebes">Niños y Bebés</option>
                                        <option value="inmobiliaria">Inmobiliaria</option>
                                        <option value="electrodomesticos">Electrodomésticos</option>
                                        <option value="servicios">Servicios</option>
                                        <option value="otros">Otros</option>
                                    </select>

                                    @if($errors->has('categoria'))
                                        @foreach($errors->get('categoria') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tipo_envio') ? ' has-error' : '' }}">
                                <label for="tipo_envio" class="col-md-4 control-label">Tipo de envío</label>

                                <div class="col-md-6">
                                    <select name="tipo_envio" class="custom-select custom-select-lg mb-3" id="tipo_envio" title="Tipo de envío">
                                        <option selected>Selecciona</option>
                                        <option value="sin_envio">Sin envío</option>
                                        <option value="5_kg_max">5 kg max.</option>
                                        <option value="10_kg_max">10 kg max.</option>
                                        <option value="20_kg_max">20 kg max.</option>
                                        <option value="30_kg_max">30 kg max.</option>
                                    </select>

                                    @if($errors->has('tipo_envio'))
                                        @foreach($errors->get('tipo_envio') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('negociacion_precio') ? ' has-error' : '' }}">
                                <label for="negociacion_precio" class="col-md-4 control-label">Negociación precio</label>

                                <div class="col-md-6">
                                    <select name="negociacion_precio" class="custom-select custom-select-lg mb-3" id="negociacion_precio" title="Tipo de envío">
                                        <option selected>Selecciona</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>

                                    @if($errors->has('negociacion_precio'))
                                        @foreach($errors->get('negociacion_precio') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('intercambio_producto') ? ' has-error' : '' }}">
                                <label for="intercambio_producto" class="col-md-4 control-label">Intercambio producto</label>

                                <div class="col-md-6">
                                    <select name="intercambio_producto" class="custom-select custom-select-lg mb-3" id="intercambio_producto" title="Intercambio producto">
                                        <option selected>Selecciona</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>

                                    @if($errors->has('intercambio_producto'))
                                        @foreach($errors->get('intercambio_producto') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('destacado') ? ' has-error' : '' }}">
                                <label for="destacado" class="col-md-4 control-label">Destacado</label>

                                <div class="col-md-6">
                                    <select name="destacado" class="custom-select custom-select-lg mb-3" id="destacado" title="Destacado">
                                        <option selected>Selecciona</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>

                                    @if($errors->has('destacado'))
                                        @foreach($errors->get('destacado') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                                <div class="col-md-6">
                                    <textarea id="descripcion" class="form-control" name="descripcion" rows="5" autofocus></textarea>

                                    @if($errors->has('descripcion'))
                                        @foreach($errors->get('descripcion') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Añadir producto
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