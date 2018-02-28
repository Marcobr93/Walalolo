@extends('layouts.app')

@section('content')
        <div class="row justify-content-md-center mb-4">
            <div class="col-lg-12">
                <div class="card bg-color4">
                    <div class="card-header bg-transparent text-center">
                        <div class="text-center">
                            <div class="text-center">
                                @auth()
                                    @if(\App\User::soyYo($user))
                                        <button class="btn btn-dark">
                                            <a class="nav-link"
                                               href="/producto/{{ $producto['id'] }}/editar">Editar
                                                producto</a>
                                        </button>
                                    @endif
                                @endauth

                            </div>
                            <div class="text-center btnespacio">
                                <img class="img-responsive img-fluid img-portfolio img-hover lozad ancho_max_imagen"
                                     data-src="{{ $producto['foto'] }}"
                                     alt="Foto del producto {{ $producto['titulo'] }}"/>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label class="col-lg-2 col-form-label bg-dark blanco center input-group-text ng">Precio</label>

                                <div class="col-lg-12">
                                    <h3 class="card-text">{{ $producto['precio'] }} €</h3>
                                </div>
                            </div>

                            <hr class="bg-primary">


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
                        <div class="col-lg-12 text-center">

                            <div class="row">

                                <div class="col-lg-6 form-group">
                                    <label class="col-lg-3 col-form-label bg-dark blanco center input-group-text ng">Usuario</label>

                                    <div class="col-lg-6 center">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Perfil del usuario"
                                           class="btn card-text text-center" href="/user/{{ $producto->user->slug }}">
                                            {{ $producto->user->nombre_usuario }}
                                        </a>
                                    </div>
                                </div>


                                <div class="col-lg-6 form-group">
                                    <label class="col-lg-3 col-form-label bg-dark blanco center input-group-text ng">Categoría</label>

                                    <div class="col-lg-8 center mt-2">
                                        <h3 class="card-text">{{ $producto['categoria'] }}</h3>
                                    </div>
                                </div>

                            </div>

                            <hr class="bg-primary">

                            <div class="row rounded">

                                <div class="col-lg-6 form-group">
                                    <label class="col-lg-3 col-form-label bg-dark blanco center input-group-text ng">Dirección</label>

                                    <div class="col-lg-12 center mt-2">
                                        <h3 class="card-text">{{ $user['direccion'] }}</h3>
                                    </div>

                                </div>

                                <div class="col-lg-6 form-group">
                                    <label class="col-lg-3 col-form-label bg-dark blanco center input-group-text ng">Población</label>

                                    <div class="col-lg-6 center mt-2">
                                        <h3 class="card-text">{{ $user['poblacion'] }}</h3>
                                    </div>
                                </div>

                            </div>

                            <hr class="bg-primary">

                            <div class="row rounded">

                                <div class="col-lg-3 form-group">
                                    <label class="col-lg-6 col-form-label bg-dark blanco center input-group-text ng">Tipo de envío</label>
                                    <div class="col-lg-12 center mt-2">
                                        <img src="{{ asset('images/caja.png') }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <h3 class="card-text">{{ $producto['tipo_envio'] }}</h3>
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label class="col-lg-10 center bg-dark blanco col-form-label input-group-text ng">Intercambio del
                                        producto</label>
                                    <div class="col-lg-12 center mt-2">
                                        <img src="{{ asset('images/intercambio.png') }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <h3 class="card-text">
                                            @if($producto['intercambio_producto'] === 1)

                                                <h3>
                                                    Sí
                                                </h3>
                                            @else
                                                <h3>
                                                    No
                                                </h3>
                                            @endif
                                        </h3>
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label class="col-lg-6 col-form-label bg-dark blanco center input-group-text ng">Destacado</label>
                                    <div class="col-lg-12 center mt-2">
                                        <img src="{{ asset('images/destacado.png') }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <h3 class="card-text">
                                            @if($producto['destacado'] === 1)
                                                <h3>
                                                    Sí
                                                </h3>
                                            @else
                                                <h3>
                                                    No
                                                </h3>
                                            @endif
                                        </h3>
                                    </div>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label class="col-form-label center bg-dark blanco input-group-text ng">Negociación del precio</label>
                                    <div class="col-lg-12 center mt-2">
                                        <img src="{{ asset('images/precio.png') }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <h3 class="card-text">
                                            @if($producto['negociacion_precio'] === 1)
                                                <h3>
                                                    Sí
                                                </h3>
                                            @else
                                                <h3>
                                                    No
                                                </h3>
                                            @endif
                                        </h3>
                                    </div>
                                    @auth()
                                        @if(!\App\User::soyYo($user))
                                            @if($producto['negociacion_precio'] == 1)
                                                @include('contraofertas.create')
                                            @endif
                                        @endif
                                    @endauth
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-primary">
                        <label class="col-lg-3 col-form-label center bg-dark blanco input-group-text ng mb-2">Descripción</label>
                        <h3 class="card-text">{{ $producto['descripcion'] }}</h3>
                    </div>
                </div>
            </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}"></script>
@endpush

{{--@push('scripts')--}}
{{--@if($user->id !== Auth::user()->id)--}}
{{--<script src="{{ asset('js/iziModal.js') }}"></script>--}}
{{--<script src="{{ asset('js/modal.js') }}"></script>--}}
{{--@endif--}}
{{--@endpush--}}