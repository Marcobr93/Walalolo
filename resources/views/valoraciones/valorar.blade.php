<form class="form-horizontal" action="{{ route('valoracion.create', array('valora_user_id' => Auth::user()->id,
'valorado_user_id' => $user['id']))}}" method="post">
    {{ csrf_field() }}
    <div class="modal fade" id="valorar" tabindex="-1" data-backdrop="static" data-show="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ejemploLabel">Valoracion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row{{ $errors->has('valoracion') ? ' has-error' : '' }}">
                            <label for="valoracion" class="col-sm-2 col-form-label">Valoración</label>
                            <div class="col-sm-10">
                                <select name="valoracion" class="custom-select custom-select-lg mb-3" id="valoracion"
                                        title="Valoración">
                                    <option selected>Selecciona</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @if($errors->has('valoracion'))
                                    @foreach($errors->get('valoracion') as $message)
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
                    <button type="submit" class="btn btn-primary">ENVIAR</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>
</form>