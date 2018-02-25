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
            @foreach($tablaProductos as $item)
                <tr>
                    <td>
                        <a href="/producto/{{ $item['id'] }}" TARGET="_BLANK">
                            <img class="ancho_max_imagen_tabla" src="{{$item->foto}}">
                        </a>
                    </td>
                    <td>
                        <a href="/producto/{{ $item['id'] }}" TARGET="_BLANK">{{$item->titulo}}</a>
                    </td>
                    <td>{{$item->precio}} €</td>
                    <td>{{$item->categoria}}</td>
                    <td>
                        <a href="/user/{{ $item->user->slug }}" TARGET="_BLANK">{{$item->user->nombre_usuario }}</a>
                    </td>
                    <td>{{$item->user->poblacion }}</td>
                    <td>{{$item->categoria}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
@push('scripts')
    <script src="{{ asset('js/tablaProductos.js') }}" defer></script>
@endpush