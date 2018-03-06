<div class="justify-content-md-center mt-4">

    <div class="form-group row">
        <div class="form-group col-lg-6 row">
            <label class="col-lg-6 center col-form-label bg-primary blanco text-center ng" for="name">Nombre</label>

            <div class="col-lg-12 text-center">
                <h3 class="mt-2">{{$user->name}}</h3>
            </div>

        </div>

        <div class="form-group col-lg-6 row">
            <label class="col-lg-6 center col-form-label bg-primary blanco text-center ng" for="apellido">Apellidos</label>

            <div class="col-lg-12 text-center">
                <h3 class="mt-2">{{$user->apellido}}</h3>
            </div>

        </div>

    </div>

    <div class="form-group row">
        <div class="form-group col-lg-6 row">
            <label class="col-lg-6 center col-form-labe bg-primary blanco text-center ng" for="dni">DNI</label>

            <div class="col-lg-12 text-center">
                <h3 class="mt-2">{{$user->dni}}</h3>
            </div>

        </div>

        <div class="form-group col-lg-6 row">
            <label class="col-lg-6 center col-form-label bg-primary blanco text-center ng" for="num_telefono">Número de teléfono</label>

            <div class="col-lg-12 text-center">
                <h3 class="mt-2">{{$user->num_telefono}}</h3>
            </div>

        </div>
    </div>

    <div class="form-group row">
        <div class="form-group col-lg-6 row">
            <label class="col-lg-6 center col-form-label bg-primary blanco text-center ng" for="direccion">Dirección</label>

            <div class="col-lg-12 text-center">
                <h3 class="mt-2">{{$user->direccion}}</h3>
            </div>

        </div>

        <div class="form-group col-lg-6 row">
            <label class="col-lg-6 center col-form-label bg-primary blanco text-center ng" for="poblacion">Población</label>

            <div class="col-lg-12 text-center">
            <h3 class="mt-2">{{$user->poblacion}}</h3>
            </div>

        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-5 center col-form-label bg-primary blanco text-center ng" for="fecha_nac">Fecha de nacimiento</label>

        <div class="col-lg-12 text-center">
            <h3 class="mt-2">{{$user->fecha_nac}}</h3>
        </div>

    </div>

    <div class="form-group row">
        <label class="col-lg-12 col-form-label bg-primary blanco ng" for="descripcion">Descripción</label>

        <div class="col-lg-11">
        <h3 class="my-2">{{$user->descripcion}}</h3>
        </div>

    </div>

</div>
