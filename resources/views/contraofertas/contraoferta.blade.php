<div class="card col-md-4 mr-4 bg-light">
    <div class="card-header bg-transparent border-primary">
        {{ $contraoferta->comprador['nombre_usuario'] }}
    </div>
    <div class="card-body">
        <p class="card-text">
            Producto: {{ $contraoferta->producto['titulo']}}</p>
        <div class="card-img">
            <img class="img-responsive img-fluid img-portfolio img-hover mb-3 lozad"
                 data-src="{{ $contraoferta->producto['foto']}}"
                 alt="Foto del producto {{ $contraoferta->producto['titulo'] }}"/>
        </div>
        <p class="card-text">Oferta: {{ $contraoferta['oferta'] }} €</p>
    </div>
    <div class="card-footer bg-transparent border-primary">
        <h4 class="price ng">
            Realizado el: {{ $contraoferta['created_at'] }}
        </h4>
        @if($contraoferta['estado_oferta'] === "En proceso")
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

