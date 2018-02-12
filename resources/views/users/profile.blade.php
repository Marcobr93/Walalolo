@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-md-center mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-transparent border-primary text-center">
                        <div class="text-center">
                            <div class="text-center btnespacio">
                                <button class="btn btn-dark">
                                    <a class="nav-link"
                                       href="{{route('user.edit',array('user' => Auth::user()->slug))}}">Editar
                                        perfil</a>
                                </button>
                            </div>
                            <div class="text-center btnespacio">
                                <img class="img-responsive img-fluid img-portfolio img-hover mb-3"
                                     src="{{ Auth::user()->avatar }}"
                                     alt="Avatar del usuario."/>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-lg-12">

                            <div class="row border border-primary">

                                <div class="col-lg-12 form-group row">
                                    <label class="col-lg-6 col-form-label text-lg-right ng">Usuario:</label>

                                    <div class="col-lg-6">
                                        <h4 class="card-text">{{ Auth::user()->nombre_usuario }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row border border-primary">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">Nombre:</label>

                                    <div class="col-lg-8">
                                        <h4 class="card-text">{{ Auth::user()->name }}</h4>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">Apellidos:</label>

                                    <div class="col-lg-8">
                                        <h3 class="card-text">{{ Auth::user()->apellido }}</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="row border border-primary">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-3 col-form-label text-lg-right ng">Email:</label>

                                    <div class="col-lg-9">
                                        <h3 class="card-text">{{ Auth::user()->email }}</h3>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">Website:</label>

                                    <div class="col-lg-8">
                                        <h3 class="card-text">{{ Auth::user()->website}}</h3>
                                    </div>
                                </div>

                            </div>

                            <div class="row border border-primary">

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">Población:</label>

                                    <div class="col-lg-8">
                                        <h3 class="card-text">{{Auth::user()->poblacion }}</h3>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">Dirección:</label>

                                    <div class="col-lg-8">
                                        <h3 class="card-text">{{ Auth::user()->direccion }}</h3>
                                    </div>
                                </div>

                            </div>

                            <div class="row border border-primary">


                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">Número teléfono:</label>

                                    <div class="col-lg-8">
                                        <h3 class="card-text">{{ Auth::user()->num_telefono }}</h3>
                                    </div>
                                </div>

                                <div class="col-lg-6 form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-right ng">DNI:</label>

                                    <div class="col-lg-8">
                                        <h3 class="card-text">{{ Auth::user()->dni }}</h3>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-primary">
                        <h3 class="card-text">
                            Descripción: {{ Auth::user()->descripcion}}
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection