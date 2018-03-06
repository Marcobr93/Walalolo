@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12 text-center">
            <table class="mt-4 table table-striped table-bordered">
                <thead class="bg-dark">
                <tr>
                    <th scope="col"
                        @if(Request::is('producto/'.$producto->id.'/editar/informacion-general')) class="bg-color5" @endif>
                        <a href="{{route('producto.info', $producto->id)}}">Información General</a></th>
                    <th scope="col" @if(Request::is('producto/'.$producto->id.'/editar/foto')) class="bg-color5" @endif>
                        <a href="{{route('producto.foto', $producto->id)}}">Foto</a></th>
                    <th scope="col"
                        @if(Request::is('producto/'.$producto->id.'/editar/otros-datos')) class="bg-color5" @endif><a
                                href="{{route('producto.otros', $producto->id)}}">Otros datos</a></th>
                    <th scope="col"
                        @if(Request::is('producto/'.$producto->id.'/editar/borrar-producto')) class="bg-color5" @endif><a
                                href="{{route('producto.borrar', $producto->id)}}">Borrar Producto</a></th>
                </tr>
                </thead>
            </table>
        </div>

        <div class="col-lg-12 form-group row center">
            @if( session('exito') )
                <div class="alert alert-success text-center" role="alert">
                    <h5>Actualización correcta</h5>
                </div>
            @elseif( session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    <h5>{{ session('error') }}</h5>
                </div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data" class="ml-4">
                {{ csrf_field() }}

                @if(Request::is('producto/'.$producto->id.'/editar/informacion-general'))
                    @include('productos.partials.informacionGeneral')

                @elseif(Request::is('producto/'.$producto->id.'/editar/foto'))
                    @include('productos.partials.foto')

                @elseif(Request::is('producto/'.$producto->id.'/editar/otros-datos'))
                    @include('productos.partials.otrosDatos')

                @elseif(Request::is('producto/'.$producto->id.'/editar/borrar-producto'))
                    @include('productos.partials.delete')

                @endif

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/validacionProducto.js') }}"></script>
    <script src="{{ asset('js/lozad.js') }}"></script>
@endpush