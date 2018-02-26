@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <table id="tablaProductos" class="table table-dark table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>categoria</th>
                <th>Propietario</th>
                <th>Poblacion</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tablaProductos as $producto)
                <tr>
                    <td>
                        <a href="/producto/{{ $producto['id'] }}" TARGET="_BLANK">
                            <img class="ancho_max_imagen_tabla lozad" data-src="{{$producto->foto}}"
                                 alt="Foto del producto {{ $producto['titulo'] }}">
                        </a>
                    </td>
                    <td>
                        <a href="/producto/{{ $producto['id'] }}" TARGET="_BLANK">{{$producto->titulo}}</a>
                    </td>
                    <td>{{$producto->precio}} €</td>
                    <td>{{$producto->categoria}}</td>
                    <td>
                        <a href="/user/{{ $producto->user->slug }}"
                           TARGET="_BLANK">{{$producto->user->nombre_usuario }}</a>
                    </td>
                    <td>{{$producto->user->poblacion }}</td>
                    <td>{{$producto->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
@push('scripts')
    <script src="{{ asset('js/tablaProductos.js') }}" defer></script>
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush