{{ method_field('PATCH') }}
<div class="justify-content-md-center mt-4">
    <div class="form-group row text-center center">
        <label class="col-lg-12 custom-file ng" for="avatar">Avatar</label>

        <div class="col-lg-12">
            <div class="text-center">
                <img class="rounded img-responsive img-fluid img-portfolio img-hover mb-3 lozad ancho_max_imagen2 lozad"
                     data-src="{{ $user->avatar }}"
                     alt="Avatar del usuario."/>
            </div>
        </div>

        <div class="col-lg-12">

            <input type="file" class="custom-file" name="avatar" id="avatar"
                   placeholder="{{$user->avatar}}">

        </div>
    </div>
</div>
<div class="mt-2 mb-4 text-center">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>