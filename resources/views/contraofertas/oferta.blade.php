@extends('layouts.app')

@section('content')

    @foreach($contraofertas->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row producto">
            @foreach($chunk as $contraoferta)
                <div class="card col-md-4 mr-4">
                    <div class="card-header bg-transparent border-primary">
                        {{ \App\User::where('id', $contraoferta['comprador_user_id'])->first()->nombre_usuario}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">Producto: {{ \App\Producto::where('id', $contraoferta['producto_id'])->first()->titulo}}</p>
                        <div class="card-img">
                            <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ \App\Producto::where('id', $contraoferta['producto_id'])->first()->foto}}" alt="Foto del producto." />
                    </div>
                        <p class="card-text">Oferta: {{ $contraoferta['oferta'] }} €</p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <h4 class="price ng">
                            Realizado el: {{ $contraoferta['created_at'] }}
                        </h4>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">ACEPTAR</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">RECHAZAR</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    <div class="text-center">{{ $user->contraofertas()->paginate(9)->links('pagination::bootstrap-4') }}</div>
@endsection
