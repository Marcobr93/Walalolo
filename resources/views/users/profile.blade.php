@extends('layouts.app')

@section('content')
    <div class="row course-set courses__row producto">
            <div class="col-md-12">

                <div class="bg-light rounded">
                    <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $user['avatar'] }}" alt="Avatar del usuario." />
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Nombre de Usuario: {{ $user['nombre_usuario'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Nombre: {{ $user['name'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Apellido: {{ $user['apellido'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Email: {{ $user['email'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        DNI: {{ $user['dni'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Número de teléfono: {{ $user['num_telefono'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Dirección: {{ $user['direccion'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Población: {{ $user['poblacion'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Website: {{ $user['website'] }}
                    </h3>
                </div>

                <div class="bg-light rounded">
                    <h3>
                        Descripción: {{ $user['descripcion'] }}
                    </h3>
                </div>

            </div>
    </div>
@endsection