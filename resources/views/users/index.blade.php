@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Productos de {{ $user['name'] }}</h1>
    </div>
        @include('productos.producto')
    <div class="text-center">{{ $productos->links('pagination::bootstrap-4') }}</div>
@endsection