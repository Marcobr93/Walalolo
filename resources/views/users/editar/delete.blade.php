{{ method_field('DELETE') }}
<button class="btn btn-danger mt-4 center">
    <a href="#" class="nav-link blanco" data-toggle="modal" data-target="#borrarUsuario">Borrar Usuario</a>
</button>

<div class="modal fade" id="borrarUsuario" tabindex="-1" data-backdrop="static" data-show="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark blanco">
                <h5 class="modal-title" id="ejemploLabel">Borrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="alert alert-danger text-center mt-2">El borrado del usuario es irreversible.</h1>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnSubmit">BORRAR</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>