@extends('layouts.app')

@section('content')
    <div class="card-group row course-set courses__row producto">
        <div class="col-md-12">

            <div class="card-header bg-transparent border-primary">
                <h2 class="card-title ng">
                    {{ $user['nombre_usuario'] }}
                </h2>
            </div>

            <div class="card-body">
                <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $user['avatar'] }}"
                     alt="Avatar del usuario."/>

                <h3 class="card-text">Nombre: {{ $user['name'] }}</h3>

                <h3 class="card-text">Apellido: {{ $user['apellido'] }}</h3>

                <h3 class="card-text">Email: {{ $user['email'] }}</h3>

                <h3 class="card-text">DNI: {{ $user['dni'] }}</h3>

                <h3 class="card-text">Número de teléfono: {{ $user['num_telefono'] }}</h3>

                <h3 class="card-text">Dirección: {{ $user['direccion'] }}</h3>

                <h3 class="card-text">Población: {{ $user['poblacion'] }}</h3>

                <h3 class="card-text">Website: {{ $user['website'] }}</h3>
            </div>

            <div class="card-footer bg-transparent border-primary">
                <h3 class="card-text">
                    Descripción: {{ $user['descripcion'] }}
                </h3>
            </div>
        </div>
    </div>
@endsection