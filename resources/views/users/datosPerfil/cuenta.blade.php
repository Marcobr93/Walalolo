<div class="justify-content-md-center mt-4">

    <div class="form-group row">
        <label class="col-lg-4 center col-form-label bg-primary blanco text-center ng mt-3" for="nombre_usuario">Nombre
            de Usuario</label>

        <div class="col-lg-12 text-center mt-2">
            <h3>{{ $user->nombre_usuario }}</h3>
        </div>

    </div>

    <div class="form-group row">
        <label class="col-lg-4 center col-form-label bg-primary blanco text-center ng mt-3"
               for="nombre_usuario">Email</label>

        <div class="col-lg-12 text-center mt-2">
            <h3>{{ $user->email }}</h3>
        </div>

    </div>

    <div class="form-group row">
        <label class="col-lg-4 center col-form-label bg-primary blanco text-center ng mt-3"
               for="nombre_usuario">Website</label>

        <div class="col-lg-12 text-center mt-2">
            <h3>{{$user->website}}</h3>
        </div>

    </div>

    <div class="col-lg-12 mb-2">
        <div class="text-center">
            <img class="rounded img-responsive img-fluid img-portfolio img-hover mb-3 lozad ancho_max_imagen2 lozad"
                 src="{{ $user->avatar }}"
                 onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                 alt="Avatar del usuario."/>
        </div>
    </div>
</div>
