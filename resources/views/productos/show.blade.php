@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-md-center mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-transparent border-primary text-center">
                        <div class="text-center">
                            <div class="text-center btnespacio">
                                @auth()
                                    @if(!\App\User::soyYo($user))
                                        @if($producto['negociacion_precio'] === 1)
                                            @include('contraofertas.contraoferta')
                                        @endif
                                    @else
                                        <button class="btn btn-dark">
                                            <a class="nav-link"
                                               href="/producto/{{ $producto['id'] }}/editar">Editar
                                                producto</a>
                                        </button>
                                    @endif
                                @endauth

                            </div>
                            <div class="text-center btnespacio">
                                <img class="img-responsive img-fluid img-portfolio img-hover mb-3"
                                     src="{{ $producto['foto'] }}"
                                     alt="Foto del producto."/>
                            </div>
                            <div class="col-lg-12 form-group row">
                                <label class="col-lg-1 col-form-label text-lg-right ng"></label>

                                <div class="col-lg-11">
                                    <h3 class="card-text">
                                        {{ $producto['titulo'] }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12">

                            <div class="row border border-primary rounded">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Usuario:</label>

                                    <div class="col-lg-6">
                                        <a class="btn pull-right card-text" href="/user/{{ $producto->user->slug }}">
                                            {{ $producto->user->nombre_usuario }}
                                        </a>
                                    </div>
                                </div>


                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Precio:</label>

                                    <div class="col-lg-6">
                                        <h3 class="card-text">{{ $producto['precio'] }} €</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row border border-primary rounded">


                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Tipo de envío:</label>

                                    <div class="col-lg-6">
                                        <h3 class="card-text">{{ $producto['tipo_envio'] }}</h3>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Destacado:</label>

                                    <div class="col-lg-6">
                                        <h3 class="card-text">
                                            @if($producto['destacado'] === 1)
                                                <h3>
                                                    Sí.
                                                </h3>
                                            @else
                                                <h3>
                                                    No.
                                                </h3>
                                            @endif
                                        </h3>
                                    </div>
                                </div>

                            </div>

                            <div class="row border border-primary rounded">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Población:</label>

                                    <div class="col-lg-6">
                                        <h3 class="card-text">{{ $user['poblacion'] }}</h3>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Intercambio del
                                        producto:</label>

                                    <div class="col-lg-6">
                                        <h3 class="card-text">
                                            @if($producto['intercambio_producto'] === 1)

                                                <h3>
                                                    Sí.
                                                </h3>
                                            @else
                                                <h3>
                                                    No.
                                                </h3>
                                            @endif
                                        </h3>
                                    </div>
                                </div>

                            </div>

                            <div class="row border border-primary rounded">

                                <div class="col-lg-12 form-group row">
                                    <label class="col-lg-3 col-form-label text-lg-right ng">Dirección:</label>

                                    <div class="col-lg-9">
                                        <h3 class="card-text">{{ $user['direccion'] }}</h3>
                                    </div>

                                </div>

                            </div>

                            <div class="row border border-primary rounded">

                                <div class="col-lg-12 form-group row">
                                    <label class="col-lg-3 col-form-label text-lg-right ng">Categoría:</label>

                                    <div class="col-lg-9">
                                        <h3 class="card-text">{{ $producto['categoria'] }}</h3>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer bg-transparent border-primary rounded">
                        <h3 class="card-text">Descripción: {{ $producto['descripcion'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection