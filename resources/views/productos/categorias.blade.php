<div class="btn-group-horizontal col-lg-12 text-center" role="group">
    <form action="/busqueda">

    <div class="col-sm-12">
        <div class="form-check text-left btn btn-dark col-sm-5">
            <img class="col-sm-3 text-left ancho_max_imagen_navbar" src="{{ asset('images/precio.png') }}">
            <label class="form-check-label col-sm-2" for="checkNegociacionPrecio">
                Precio negociable
            </label>
            <input class="form-check-input col-sm-10" type="checkbox" value="1" id="checkNegociacionPrecio"
                   name="checkNegociacionPrecio">

        </div>

        <div class="form-check text-left btn btn-dark col-sm-5">
            <img class="col-sm-3 text-left ancho_max_imagen_navbar" src="{{ asset('images/intercambio.png') }}">
            <label class="form-check-label col-sm-2" for="checkIntercambio">
                Intercambio
            </label>
            <input class="form-check-input col-sm-10" type="checkbox" value="1" id="checkIntercambio"
                   name="checkIntercambio">
        </div>
    </div>

        <div class="mt-1 col-sm-12">
            <button class="btn btn-dark col-sm-2" name="categoria" type="submit" value="Coches">Coches</button>
            <button class="btn btn-dark col-sm-2" name="categoria" type="submit" value="Motor y Accesorios">Motor y
                Accesorios
            </button>

            <button class="btn btn-dark col-sm-2" name="categoria" type="submit" value="Electrónica">Electrónica
            </button>

            <button class="btn btn-dark col-sm-2" name="categoria" type="submit" value="Deporte y Ocio">Deporte y
                Ocio
            </button>

            <button class="btn btn-dark col-sm-2" name="categoria" type="submit" value="Muebles, Deco y Jardín">
                Muebles, Deco y Jardín
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Consolas y Videojuegos">
                Consolas y Videojuegos
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Libros, Películas y Música">
                Libros, Películas y Música
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Moda y Accesorios">Moda y
                Accesorios
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Niños y Bebés">Niños y Bebés
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Inmobiliaria">Inmobiliaria
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Electrodomésticos">
                Electrodomésticos
            </button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Servicios">Servicios</button>

            <button class="btn btn-dark col-sm-2 mt-1" name="categoria" type="submit" value="Otros">Otros</button>
        </div>
    </form>
</div>