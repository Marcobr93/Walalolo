@if($productos->isEmpty())
    <p>No hay productos para mostrar.</p>
@endif

@foreach($productos->chunk(3) as $chunk)
    <div class="row course-set courses__row producto">
        @foreach($chunk as $producto)
<div class="col-md-4">
    <div class="bg-light rounded">
        <h3>
            {{ $producto->user->name }}
        </h3>
    </div>

    <div class="bg-light rounded">
        <h4>
            Título: {{ $producto['titulo'] }}
        </h4>
    </div>

    <div class="bg-light rounded">
        <img class="img-responsive img-fluid img-portfolio img-hover mb-3" src="{{ $producto['foto'] }}" alt="Foto del producto." />
    </div>

    <div class="bg-light rounded">
        <h4 class="price ng">
            Precio: {{ $producto['precio'] }} €
        </h4>
    </div>
    <div class="bg-light rounded">
        <p class="ng">
            Descripción: {{ $producto['descripcion'] }}
        </p>
    </div>
</div>
        @endforeach
    </div>
@endforeach