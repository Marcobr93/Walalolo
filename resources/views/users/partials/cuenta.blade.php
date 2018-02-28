{{ method_field('PATCH') }}
<div class="justify-content-md-center mt-4">
    <div class="form-group row @if( $errors->has('nombre_usuario'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="nombre_usuario">Nombre de Usuario</label>

        <div class="col-lg-8 center">

            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario"
                   placeholder="{{$user->nombre_usuario}}">
            @if ($errors->has('nombre_usuario'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('nombre_usuario') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

    <div class="form-group row @if( $errors->has('email'))has-error @endif">
        <label class="col-lg-12 col-form-label text-center ng" for="email">Email</label>

        <div class="col-lg-8 center">

            <input type="text" class="form-control" name="email" id="email"
                   placeholder="{{$user->email}}">
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>
        @include('layouts.spinner')

    </div>

    <div class="form-group row">
        <label class="col-lg-12 col-form-label text-center ng" for="website">Website</label>

        <div class="col-lg-8 center">

            <input type="text" class="form-control" name="website" id="website"
                   placeholder="{{$user->website}}">
        </div>
        @include('layouts.spinner')

    </div>
</div>
<div class="mt-4 text-center">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>