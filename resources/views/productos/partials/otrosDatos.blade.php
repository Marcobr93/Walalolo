{{ method_field('PATCH') }}
<div class="form-group col-lg-12 row @if( $errors->has('categoria'))has-error @endif">
    <label class="col-lg-12 col-form-label text-center ng" for="categoria">Categoría</label>

    <div class="col-lg-10 center">

        <select name="categoria" class="custom-select custom-select-lg mb-3" id="categoria"
                title="Categoría">
            <option selected value="{{ $producto->categoria }}">Selecciona</option>
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
        @if ($errors->has('categoria'))
            <div class="alert alert-danger">
                <strong>{{ $errors->first('categoria') }}</strong>
            </div>
        @endif
    </div>
    @include('layouts.spinner')

</div>

<div class="form-group row">

    <div class="col-lg-6 form-group row @if( $errors->has('destacado'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng"
               for="destacado">Destacado</label>

        <div class="col-lg-10 center">

            <select name="destacado" class="custom-select custom-select-lg mb-3"
                    id="destacado" title="Destacado">
                <option selected value="{{ $producto->destacado }}">Selecciona</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            @if ($errors->has('destacado'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('destacado') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')
    </div>

    <div class="col-lg-6 form-group row @if( $errors->has('tipo_envio'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="tipo_envio">Tipo de
            envío</label>

        <div class="col-lg-10 center">

            <select name="tipo_envio" class="custom-select custom-select-lg mb-3"
                    id="tipo_envio" title="Tipo de envío">
                <option selected value="{{ $producto->tipo_envio }}">Selecciona</option>
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
        @include('layouts.spinner')
    </div>

</div>

<div class="form-group row">
    <div class="col-lg-6 form-group row @if( $errors->has('negociacion_precio'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="negociacion_precio">Negociación
            del precio</label>

        <div class="col-lg-10 center">

            <select name="negociacion_precio" class="custom-select custom-select-lg mb-3"
                    id="negociacion_precio" title="Negociación del precio.">
                <option selected value="{{ $producto->negociacion_precio }}">Selecciona</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            @if ($errors->has('negociacion_precio'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('negociacion_precio') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')
    </div>

    <div class="col-lg-6 form-group row @if( $errors->has('intercambio_producto'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="intercambio_producto">Intercambio del
            producto</label>

        <div class="col-lg-10 center">

            <select name="intercambio_producto" class="custom-select custom-select-lg mb-3"
                    id="intercambio_producto" title="Intercambio producto">
                <option selected value="{{ $producto->intercambio_producto }}">Selecciona</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>

            @if ($errors->has('intercambio_producto'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('intercambio_producto') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')
    </div>
</div>
<div class="mb-4 text-center">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>



