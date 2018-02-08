<form class="form-horizontal" action="{{ route('review.create', array('review_user_id' => Auth::user()->id,
'user_id' => $user['id']))}}" method="post">
    {{ csrf_field() }}
    <div class="modal fade" id="comentar" tabindex="-1" data-backdrop="static" data-show="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ejemploLabel">Comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group row{{ $errors->has('comentario') ? ' has-error' : '' }}">
                                    <label for="comentario"
                                           class="col-lg-2 col-form-label text-lg-right">Comentario</label>

                                    <div class="col-md-10">
                                        <textarea id="comentario" class="form-control" name="comentario" autofocus></textarea>

                                        @if($errors->has('comentario'))
                                            @foreach($errors->get('comentario') as $message)
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ENVIAR</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
</form>