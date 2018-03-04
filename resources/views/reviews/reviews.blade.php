@foreach($user->reviews()->paginate(9)->chunk(1) as $chunk)
    <div id="reviews" class="card-group row course-set courses__row my-4">
        @foreach($chunk as $review)
            <div class="card col-md-12 bg-light">
                <div class="card-header bg-transparent border-primary">
                    <h4 class="card-title ng">
                        <a href="/user/{{ $review->usuario->slug }}">
                            <img class="mr-2 rounded-circle mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_conversation"
                                 data-src="{{ $review->usuario->avatar }}"
                                 onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                                 alt="Foto del usuario {{ $review->usuario->nombre_usuario }}"/>
                        </a>
                        {{ $review->usuario->nombre_usuario }}
                    </h4>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $review->comentario }}</p>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <h5 class="price ng">
                        {{ $review->created_at }}
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
<div class="centro">{{ $user->reviews()->paginate(9)->links('pagination::bootstrap-4') }}</div>
