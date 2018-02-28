    @foreach($user->reviews()->paginate(9)->chunk(1) as $chunk)
        <div id="reviews" class="card-group row course-set courses__row mt-4 mb-4">
            @foreach($chunk as $review)
                <div class="card col-md-12 bg-light">
                    <div class="card-header bg-transparent border-primary">
                        <h4 class="card-title ng">
                            Usuario: {{ $review->usuario->nombre_usuario }}
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
