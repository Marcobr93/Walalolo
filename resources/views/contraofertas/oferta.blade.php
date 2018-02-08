@extends('layouts.app')

@section('content')

    @foreach($user->contraofertas()->paginate(9)->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row producto">
            @foreach($chunk as $contraoferta)
                <div class="card col-md-4">
                    <div class="card-header bg-transparent border-primary">
                        {{ \App\User::where('id', $contraoferta['comprador_user_id'])->first()->nombre_usuario}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">Producto: {{ $contraoferta['producto_id'] }}</p>

                        <p class="card-text">Oferta: {{ $contraoferta['oferta'] }} €</p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <h4 class="price ng">
                            Realizado el: {{ $contraoferta['created_at'] }}
                        </h4>
                        <button type="submit" class="btn btn-primary">ACEPTAR</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">RECHAZAR</button>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <div class="centro">{{ $user->contraofertas()->paginate(9)->links('pagination::bootstrap-4') }}</div>
@endsection
