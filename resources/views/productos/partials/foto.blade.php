{{ method_field('PATCH') }}
<div class="justify-content-md-center mt-4">
    <div class="form-group row text-center center">
        <label class="col-lg-12 custom-file ng" for="foto">Foto</label>

        <div class="col-lg-12">
            <div class="text-center">
                <img class="img-responsive img-fluid img-portfolio img-hover mb-3 lozad ancho_max_imagen_2 lozad"
                     data-src="{{ $producto->foto }}"
                     alt="Foto del producto."/>
            </div>
        </div>

        <div class="col-lg-12">

            <input type="file" class="custom-file" name="foto" id="foto"
                   placeholder="{{$producto->foto}}">

        </div>
    </div>
</div>
<div class="mt-4 ml-3 text-center">
    <button type="submit" class="btn btn-dark">Actualizar</button>
</div>