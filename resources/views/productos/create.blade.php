@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Añadir producto</div>
                    <div class="card-body">
                        <form action="{{ url('/') }}/productos/create" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <label for="titulo" class="col-lg-4 col-form-label text-lg-right">Título</label>

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

                            <div class="form-group row{{ $errors->has('foto') ? ' has-error' : '' }}">
                                <label for="foto" class="col-lg-4 col-form-label text-lg-right">Foto</label>

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

                            <div class="form-group row{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion" class="col-lg-4 col-form-label text-lg-right">Dirección</label>

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


                            <div class="form-group row{{ $errors->has('poblacion') ? ' has-error' : '' }}">
                                <label for="poblacion" class="col-lg-4 col-form-label text-lg-right">Población</label>

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

                            <div class="form-group row{{ $errors->has('precio') ? ' has-error' : '' }}">
                                <label for="precio" class="col-lg-4 col-form-label text-lg-right">Precio</label>

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

                            <div class="form-group row{{ $errors->has('categoria') ? ' has-error' : '' }}">
                                <label for="categoria" class="col-lg-4 col-form-label text-lg-right">Categoría</label>

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

                            <div class="form-group row{{ $errors->has('tipo_envio') ? ' has-error' : '' }}">
                                <label for="tipo_envio" class="col-lg-4 col-form-label text-lg-right">Tipo de envío</label>

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

                            <div class="form-group row{{ $errors->has('negociacion_precio') ? ' has-error' : '' }}">
                                <label for="negociacion_precio" class="col-lg-4 col-form-label text-lg-right">Negociación precio</label>

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

                            <div class="form-group row{{ $errors->has('intercambio_producto') ? ' has-error' : '' }}">
                                <label for="intercambio_producto" class="col-lg-4 col-form-label text-lg-right">Intercambio producto</label>

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

                            <div class="form-group row{{ $errors->has('destacado') ? ' has-error' : '' }}">
                                <label for="destacado" class="col-lg-4 col-form-label text-lg-right">Destacado</label>

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

                            <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label for="descripcion" class="col-lg-4 col-form-label text-lg-right">Descripción</label>

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

                            <div class="form-group row">
                                <div class="col-lg-7 col-form-label text-lg-right">
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