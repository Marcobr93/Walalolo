<div class="container">
    <div class="iziModal">
        <div id="modalComentar">
            <form class="form-horizontal" action="{{ route('review.create', $user)}}" method="post">
                {{ csrf_field() }}

                <div class="modal-header bg-dark blanco">
                    <h5 class="modal-title center">Comentario</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row{{ $errors->has('comentario') ? ' has-error' : '' }}">
                            <label for="comentario"
                                   class="col-lg-2 col-form-label text-lg-right"></label>

                            <div class="col-lg-12">
                                        <textarea id="comentario" class="form-control" rows="7" name="comentario"
                                                  autofocus></textarea>

                                @if($errors->has('comentario'))
                                    @foreach($errors->get('comentario') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary btnSubmit">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>