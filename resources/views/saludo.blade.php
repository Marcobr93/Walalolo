@extends('layouts.app')

@section('title')
    Saludo a navegantes
@endsection

@section('head')
    @isset($usuario)
        <div class="title m-b-md">
            Hola {{ $usuario }}
        </div>
    @else
        <div class="title m-b-md">
            ADA-ITS
        </div>
    @endif
@endsection

@section('content')
    <div class="links">
        <a href="https://laravel.com/docs">Ola k ase</a>
    </div>
@endsection