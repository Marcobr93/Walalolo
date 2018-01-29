@extends('layouts.app')

@section('content')
        @include('productos.producto')
    <div class="text-center">{{ $productos->links('pagination::bootstrap-4') }}</div>
@endsection