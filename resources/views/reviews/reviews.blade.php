<div id="reviews">
    @foreach($user->reviews()->paginate(9)->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row producto">
            @foreach($chunk as $review)
                <div class="card col-md-4">
                    <div class="card-header bg-transparent border-primary">
                        <h4 class="card-title ng">
                            Usuario: {{ \App\User::where('id', $review['review_user_id'])->first()->nombre_usuario }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Comentario: {{ $review->comentario }}</p>
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


</div>
