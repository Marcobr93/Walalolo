@extends('layouts.app')

@section('content')
    @foreach($contraofertas->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row producto">
            @foreach($chunk as $contraoferta)
                @if($contraoferta['estado_oferta'] === "Aceptada")
                    @include('contraofertas.contraoferta')
                @endif
            @endforeach
        </div>
    @endforeach
@endsection
