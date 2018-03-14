<div class="container">
    <div class="iziModal">
        <div id="modalValorar">
            <form class="form-horizontal" action="{{ route('valoracion.create', $user)}}" method="post">
                {{ csrf_field() }}

                <div class="modal-header bg-dark blanco">
                    <h5 class="modal-title center">
                        Valorar al usuario
                    </h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row{{ $errors->has('valoracion') ? ' has-error' : '' }}">
                            <label for="valoracion" class="col-sm-2 col-form-label"></label>
                            <div class="col-lg-12">
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
                        <div class="modal-footer">
                            <button type="submit" id="valorar" class="btn btn-primary btnSubmit">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>