@extends('layouts.app')

@section('content')
    <div>
        <p>Usuario: <strong>{{ $producto['nombre_usuario'] }}</strong></p>
        <p>titulo: <strong>{{ $producto['titulo'] }}</strong></p>
    </div>
@endsection