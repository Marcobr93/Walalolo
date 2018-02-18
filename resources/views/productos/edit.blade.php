@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-md-center mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center card-header">Editar datos</div>
                    <div class="card-body">
                        <form role="form" id="formularioEditar"
                              action="{{route('producto.update',array($producto->id))}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group row @if( $errors->has('titulo'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right" for="titulo">Título</label>

                                <div class="col-lg-9">

                                    <input type="text" class="form-control" name="titulo" id="titulo"
                                           placeholder="Título" value="{{ $producto->titulo }}">

                                    @if ($errors->has('titulo'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row @if( $errors->has('precio'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right" for="name">Precio</label>

                                <div class="col-lg-9">

                                    <input type="number" class="form-control" name="precio" id="precio"
                                           placeholder="Precio"
                                           value="{{ $producto->precio }}">
                                    @if ($errors->has('precio'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('precio') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row @if( $errors->has('categoria'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right" for="categoria">Categoría</label>

                                <div class="col-lg-9">

                                    <select name="categoria" class="custom-select custom-select-lg mb-3" id="categoria"
                                            title="Categoría">
                                        <option selected value="Sin determinar.">Selecciona</option>
                                        <option value="Deporte y Ocio">Deporte y Ocio</option>
                                        <option value="Muebles, Deco y Jardín">Muebles, Deco y Jardín</option>
                                        <option value="Consolas y Videojuegos">Consolas y Videojuegos</option>
                                        <option value="Libros, Películas y Música">Libros, Películas y Música</option>
                                        <option value="Moda y Accesorios">Moda y Accesorios</option>
                                        <option value="Niños y Bebés">Niños y Bebés</option>
                                        <option value="Inmobiliaria">Inmobiliaria</option>
                                        <option value="Electrodomésticos">Electrodomésticos</option>
                                        <option value="Servicios">Servicios</option>
                                        <option value="Otros">Otros</option>
                                    </select>

                                    @if ($errors->has('categoria'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('categoria') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="avatar">Foto</label>

                                    <div class="col-lg-6">

                                        <input type="text" class="form-control" name="foto" id="foto"
                                               placeholder="Foto"
                                               value="{{ $producto->foto }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row @if( $errors->has('tipo_envio'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="num_telefono">Tipo de
                                        envío</label>

                                    <div class="col-lg-6">

                                        <select name="tipo_envio" class="custom-select custom-select-lg mb-3"
                                                id="tipo_envio" title="Tipo de envío">
                                            <option selected value="Sin determinar.">Selecciona</option>
                                            <option value="Sin envío">Sin envío</option>
                                            <option value="5 kg max">5 kg max.</option>
                                            <option value="10 kg max">10 kg max.</option>
                                            <option value="20 kg max">20 kg max.</option>
                                            <option value="30 kg max">30 kg max.</option>
                                        </select>

                                        @if ($errors->has('tipo_envio'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('tipo_envio') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6 form-group row @if( $errors->has('negociacion_precio'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="negociacion_precio">Negociación
                                        del precio</label>

                                    <div class="col-lg-6">

                                        <select name="negociacion_precio" class="custom-select custom-select-lg mb-3"
                                                id="negociacion_precio" title="Tipo de envío">
                                            <option selected value="0">Selecciona</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>

                                        @if ($errors->has('negociacion_precio'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('negociacion_precio') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row @if( $errors->has('intercambio_producto'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right" for="dni">Intercambio del
                                        producto</label>

                                    <div class="col-lg-6">

                                        <select name="intercambio_producto" class="custom-select custom-select-lg mb-3"
                                                id="intercambio_producto" title="Intercambio producto">
                                            <option selected value="0">Selecciona</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>

                                        @if ($errors->has('intercambio_producto'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('intercambio_producto') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">


                                <div class="col-lg-6 form-group row @if( $errors->has('destacado'))has-error @endif">
                                    <label class="col-lg-5 col-form-label text-lg-right"
                                           for="destacado">Destacado</label>

                                    <div class="col-lg-6">

                                        <select name="destacado" class="custom-select custom-select-lg mb-3"
                                                id="destacado" title="Destacado">
                                            <option selected value="0">Selecciona</option>
                                            <option value="1">Sí</option>
                                            <option value="0">No</option>
                                        </select>

                                        @if ($errors->has('destacado'))
                                            <div class="alert alert-danger">
                                                <strong>{{ $errors->first('destacado') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row @if( $errors->has('descripcion'))has-error @endif">
                                <label class="col-lg-2 col-form-label text-lg-right"
                                       for="descripcion">Descripción</label>

                                <div class="col-lg-9">

                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="5">
                                        {{ $producto->descripcion }}
                                    </textarea>
                                    @if ($errors->has('descripcion'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary" id="botonEditar" type="submit">Enviar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/validacionProducto.js') }}"></script>
    @endpush
@endsection