@if($productos->isEmpty())
    <p>No hay productos para mostrar.</p>
@endif

@foreach($productos->chunk(3) as $chunk)
    <div class="card-group row course-set courses__row producto">
        @foreach($chunk as $producto)
            <div class="card col-md-4 mr-2 bg-light">
                <div class="card-header bg-transparent border-primary">
                    <a href="/producto/{{ $producto['id'] }}">{{ $producto['titulo'] }} </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="btn pull-right" href="/user/{{ $producto->user->slug }}">
                            {{ $producto->user->nombre_usuario }}
                        </a>
                    </h5>
                    <h5 class="card-img">
                        <a href="/producto/{{ $producto['id'] }}">
                            <img class="lozad img-responsive img-fluid img-portfolio img-hover mb-3 "
                                 data-src="{{ $producto['foto'] }}"
                                 alt="Foto del producto {{ $producto['titulo'] }}"/>
                        </a>
                    </h5>
                    <p class="card-text">{{ $producto['descripcion'] }}</p>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <h4 class="price ng">
                        Precio: {{ $producto['precio'] }} €
                    </h4>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

<div class="col-lg-6 offset-lg-3">
    <div class="pagination mx-auto text-center mb-4">
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush

@push('scripts')
<script src="{{ asset('js/datos.js') }}" defer></script>
@endpush