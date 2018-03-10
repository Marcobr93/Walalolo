@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <div class="row justify-content-md-center mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-center card-header bg-dark blanco">Añadir producto</div>
                    <div class="card-body bg-color4">
                        <form action="{{ url('/') }}/productos/crear" id="formularioCreacionProducto" method="post"
                              enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group row{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <label for="titulo" class="col-lg-2 col-form-label text-lg-right ng">Título</label>

                                <div class="col-lg-8">
                                    <input id="titulo" type="text" class="form-control" name="titulo"
                                           value="{{ old('titulo') }}" autofocus>

                                    @if($errors->has('titulo'))
                                        @foreach($errors->get('titulo') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row{{ $errors->has('precio') ? ' has-error' : '' }}">
                                <label for="precio" class="col-lg-2 col-form-label text-lg-right ng">Precio</label>

                                <div class="col-lg-8">
                                    <input id="precio" type="number" step="any" min="0" class="form-control"
                                           name="precio" value="{{ old('precio') }}" autofocus>

                                    @if($errors->has('precio'))
                                        @foreach($errors->get('precio') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row">
                                <label for="foto" class="col-lg-2 col-form-label text-lg-right ng">Añadir Imagen</label>

                                <div class="col-lg-6">
                                    <input type="file" name="foto" id="foto" class="text-center">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 form-group row{{ $errors->has('destacado') ? ' has-error' : '' }}">
                                    <label for="destacado"
                                           class="col-lg-4 col-form-label text-lg-right ng">Destacado</label>

                                    <div class="col-lg-6">
                                        <select name="destacado" class="custom-select custom-select-lg mb-3"
                                                id="destacado" title="Destacado">
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
                                    @include('layouts.spinner')
                                </div>

                                <div class="col-lg-6 form-group row{{ $errors->has('tipo_envio') ? ' has-error' : '' }}">
                                    <label for="tipo_envio" class="col-lg-4 col-form-label text-lg-right ng">Tipo de
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

                                        @if($errors->has('tipo_envio'))
                                            @foreach($errors->get('tipo_envio') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    @include('layouts.spinner')
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 form-group row{{ $errors->has('negociacion_precio') ? ' has-error' : '' }}">
                                    <label for="negociacion_precio" class="col-lg-4 col-form-label text-lg-right ng">Negociación
                                        precio</label>

                                    <div class="col-lg-6">
                                        <select name="negociacion_precio" class="custom-select custom-select-lg mb-3"
                                                id="negociacion_precio" title="Tipo de envío">
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
                                    @include('layouts.spinner')
                                </div>


                                <div class="col-lg-6 form-group row{{ $errors->has('intercambio_producto') ? ' has-error' : '' }}">
                                    <label for="intercambio_producto" class="col-lg-4 col-form-label text-lg-right ng">Intercambio
                                        producto</label>

                                    <div class="col-lg-6">
                                        <select name="intercambio_producto" class="custom-select custom-select-lg mb-3"
                                                id="intercambio_producto" title="Intercambio producto">
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
                                    @include('layouts.spinner')
                                </div>

                            </div>

                            <div class="form-group row{{ $errors->has('categoria') ? ' has-error' : '' }}">
                                <label for="categoria"
                                       class="col-lg-2 col-form-label text-lg-right ng">Categoría</label>

                                <div class="col-lg-8">
                                    <select name="categoria" class="custom-select custom-select-lg mb-3" id="categoria"
                                            title="Categoría">
                                        <option selected value="Sin determinar">Selecciona</option>
                                        <option value="Coches">Coches</option>
                                        <option value="Motor y Accesorios">Motor y Accesorios</option>
                                        <option value="Electrónica">Electrónica</option>
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

                                    @if($errors->has('categoria'))
                                        @foreach($errors->get('categoria') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>


                            <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label for="descripcion"
                                       class="col-lg-2 col-form-label text-lg-right ng">Descripción</label>

                                <div class="col-lg-8">
                                    <textarea id="descripcion" class="form-control" name="descripcion" rows="5"
                                              autofocus></textarea>

                                    @if($errors->has('descripcion'))
                                        @foreach($errors->get('descripcion') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-dark btnSubmit">
                                    Añadir producto
                                </button>
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