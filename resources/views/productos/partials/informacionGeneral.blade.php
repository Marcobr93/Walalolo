{{ method_field('PATCH') }}
<div class="justify-content-md-center mt-4">
    <div class="form-group row @if( $errors->has('titulo'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="titulo">Título</label>

        <div class="col-lg-8 center">

            <input type="text" class="form-control" name="titulo" id="titulo"
                   placeholder="{{$producto->titulo}}">
            @if ($errors->has('titulo'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('titulo') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

    <div class="form-group row @if( $errors->has('precio'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="precio">Precio</label>

        <div class="col-lg-8 center">

            <input type="number" step="any" min="0" class="form-control" name="precio" id="precio"
                   placeholder="{{$producto->precio}}">
            @if ($errors->has('precio'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('precio') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

    <div class="form-group row @if( $errors->has('descripcion'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="descripcion">Descripción</label>

        <div class="col-lg-8 center">

            <textarea class="form-control" name="descripcion" id="descripcion"
                      rows="5">{{$producto->descripcion}}</textarea>
            @if ($errors->has('descripcion'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

</div>
<div class="mb-4 text-center">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>