<button data-toggle="tooltip" data-placement="bottom" title="Realizas una contraoferta al producto"
        class="btn btn-dark mt-1">
    <a href="#" class="nav-link" data-toggle="modal" data-target="#contraoferta">Contraoferta</a>
</button>

<form class="form-horizontal" action="{{ route('contraoferta.create', $producto)}}" method="post">
    {{ csrf_field() }}
    <div class="modal fade" id="contraoferta" tabindex="-1" data-backdrop="static" data-show="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark blanco">
                    <h5 class="modal-title" id="ejemploLabel">Contraoferta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row{{ $errors->has('oferta') ? ' has-error' : '' }}">
                            <label for="oferta" class="col-sm-2 col-form-label">Oferta</label>
                            <div class="col-sm-10">
                                <input type="number" name="oferta" id="oferta" step="any" min="0" class="form-control"
                                       placeholder="Cantidad" autofocus>
                                @if($errors->has('oferta'))
                                    @foreach($errors->get('oferta') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnSubmit">ENVIAR</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
</form>
