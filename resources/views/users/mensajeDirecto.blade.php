<form action="/user/{{ $user->slug }}/dms" method="post">
    {{ csrf_field() }}
    <div class="modal fade" id="mensajeDirecto" tabindex="-1" data-backdrop="static" data-show="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ejemploLabel">Mensaje Directo a {{ $user->name }} {{ $user->apellido }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <label class="col-lg-12 col-form-label text-lg-right"
                               for="message"></label>

                        <div class="col-lg-9">
                    <textarea name="message" id="message" cols="70" rows="5"></textarea>
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