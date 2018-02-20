<div class="container">
    <div class="iziModal">
        <div id="modalMD">
            <form class="form-horizontal" action="/user/{{ $user->slug }}/dms" method="post">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h5 class="modal-title center" id="ejemploLabel">Mensaje Directo
                        a {{ $user->name }} {{ $user->apellido }}</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <label class="col-lg-12 col-form-label text-lg-right"
                               for="message"></label>

                        <div class="col-lg-12">
                            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>

