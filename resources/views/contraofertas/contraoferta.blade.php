<div class="card col-md-4 mr-4 bg-light">
    <div class="card-header bg-transparent border-primary">
        <a href="/user/{{ $contraoferta->comprador->slug }}">
            <img class="mr-2 rounded-circle mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_conversation"
                 data-src="{{ $contraoferta->comprador->avatar }}"
                 onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                 alt="Foto del usuario {{ $contraoferta->comprador->nombre_usuario }}"/>
        </a>
        <a data-toggle="tooltip" data-placement="bottom" title="Perfil del usuario"
           class="btn pull-right" href="/user/{{ $contraoferta->comprador->slug }}">
            {{ $contraoferta->comprador->nombre_usuario }}
        </a>
    </div>
    <div class="card-body">
        <p class="card-text">
            Producto: {{ $contraoferta->producto->titulo}}</p>
        <div class="card-img">
            <a href="/producto/{{ $contraoferta->producto->id }}">
                <img class="lozad img-responsive img-fluid img-portfolio img-hover mb-3 "
                     src="{{ $contraoferta->producto->foto }}"
                     onerror="src='{{ asset('images/default_product.jpeg') }}'"
                     alt="Foto del producto {{ $contraoferta->producto->titulo }}"/>
            </a>
        </div>
        <p class="card-text ng">Oferta: {{ $contraoferta->oferta }} €</p>
    </div>
    <div class="card-footer bg-transparent border-primary">
        <h4 class="price ng">
            Realizado el: {{ $contraoferta->created_at }}
        </h4>
        @if($contraoferta->estado_oferta === "En proceso")
            <div class="text-center">
                <form role="form" id="formularioEditar"
                      action="{{route('contraoferta.update',array($contraoferta->id))}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <button type="submit" class="btn btn-primary" name="estado_oferta" value="Aceptada">
                        ACEPTAR
                    </button>
                    <button type="submit" class="btn btn-danger" name="estado_oferta" value="Rechazada">
                        RECHAZAR
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

