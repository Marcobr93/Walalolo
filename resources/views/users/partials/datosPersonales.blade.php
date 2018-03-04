{{ method_field('PATCH') }}
<div class="justify-content-md-center mt-4">

    <div class="form-group row">
        <div class="form-group col-lg-6 row @if( $errors->has('name'))has-error @endif">
            <label class="col-lg-12 col-form-label text-center ng" for="name">Nombre</label>

            <div class="col-lg-10 center">

                <input type="text" class="form-control" name="name" id="name"
                       placeholder="{{$user->name}}">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')

        </div>

        <div class="form-group col-lg-6 row @if( $errors->has('apellido'))has-error @endif">
            <label class="col-lg-12 col-form-label text-center ng" for="apellido">Apellidos</label>

            <div class="col-lg-10 center">

                <input type="text" class="form-control" name="apellido" id="apellido"
                       placeholder="{{$user->apellido}}">
                @if ($errors->has('apellido'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('apellido') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')

        </div>

    </div>

    <div class="form-group row">
        <div class="form-group col-lg-6 row @if( $errors->has('dni'))has-error @endif">
            <label class="col-lg-12 col-form-labe text-center ng" for="dni">DNI</label>

            <div class="col-lg-10 center">

                <input type="text" class="form-control" name="dni" id="dni"
                       placeholder="{{$user->dni}}">
                @if ($errors->has('dni'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')

        </div>

        <div class="form-group col-lg-6 row @if( $errors->has('num_telefono'))has-error @endif">
            <label class="col-lg-12 col-form-label text-center ng" for="num_telefono">Número de teléfono</label>

            <div class="col-lg-10 center">

                <input type="text" class="form-control" name="num_telefono" id="num_telefono"
                       placeholder="{{$user->num_telefono}}">
                @if ($errors->has('num_telefono'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('num_telefono') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')

        </div>
    </div>

    <div class="form-group row">
        <div class="form-group col-lg-6 row @if( $errors->has('direccion'))has-error @endif">
            <label class="col-lg-12 col-form-label text-center ng" for="direccion">Dirección</label>

            <div class="col-lg-10 center">

                <input type="text" class="form-control" name="direccion" id="direccion"
                       placeholder="{{$user->direccion}}">
                @if ($errors->has('direccion'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('direccion') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')

        </div>

        <div class="form-group col-lg-6 row @if( $errors->has('poblacion'))has-error @endif">
            <label class="col-lg-12 col-form-label text-center ng" for="poblacion">Población</label>

            <div class="col-lg-10 center">

                <input type="text" class="form-control" name="poblacion" id="poblacion"
                       placeholder="{{$user->poblacion}}">
                @if ($errors->has('poblacion'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('poblacion') }}</strong>
                    </div>
                @endif
            </div>
            @include('layouts.spinner')

        </div>
    </div>

    <div class="form-group row @if( $errors->has('fecha_nac'))has-error @endif">
        <label class="col-lg-12 col-form-label ng" for="fecha_nac">Fecha de nacimiento</label>

        <div class="col-lg-11">

            <input type="date" class="form-control" name="fecha_nac" id="fecha_nac"
                   value="{{$user->fecha_nac}}">
            @if ($errors->has('fecha_nac'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('fecha_nac') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

    <div class="form-group row @if( $errors->has('descripcion'))has-error @endif">
        <label class="col-lg-12 col-form-label ng" for="descripcion">Descripción</label>

        <div class="col-lg-11">

            <textarea class="form-control" name="descripcion" id="descripcion"
                      rows="5">{{$user->descripcion}}</textarea>
            @if ($errors->has('descripcion'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

</div>
<div class="mt-2 mb-4 text-center">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>

@push('scripts')
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="{{ asset('js/datePicker.js') }}" defer></script>
@endpush