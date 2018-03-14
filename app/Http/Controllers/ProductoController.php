<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoAjaxFormRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Producto;
use App\Http\Requests\CreateProductoRequest;
use App\User;
use App\Visita;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }


    /** Método que muestra la información de un producto. Utiliza Route Binding
     * para coneguir el Producto facilitado por el parámetro.
     * @param Producto $producto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Producto $producto, Request $request)
    {
        if ($producto) {
            Visita::create([
                'producto_id' => $producto->id,
                'user_id' => $request->user() ? $request->user()->id : null,
                'ip' => $request->ip(),
            ]);
        }
        $data = GeoIP::getLocation($producto->user->ip);

        $user = User::where('id', $producto['user_id'])->firstOrFail();

        return view('productos.show', [
            'producto' => $producto,
            'user' => $user,
            'data' => $data
        ]);
    }


    /** Validación por Ajax con FormRquest.
     * @param CreateProductoAjaxFormRequest $request
     * @return array
     */
    protected function validacionAjax(CreateProductoAjaxFormRequest $request)
    {
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }


    /** Muestra la vista de edición de un producto.
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $producto = DB::table('productos')->where('id', $id)->first();

        return view('productos.edit', ['producto' => $producto]);
    }


    /** Función para editar un producto, dependiendo de la ruta que reciba, editará ciertos campos
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateProductoRequest $request)
    {
        $path = $request->path();
        $producto = Producto::findOrFail($id);

        if (strpos($path, 'informacion-general')) {
            $data = array_filter($request->all());

            $producto->fill($data);
        }

        if (strpos($path, 'otros-datos')) {
            $data = $request->all();

            $producto->fill($data);
        }

        if (strpos($path, 'foto')) {
            if ($foto = $request->file('foto')) {
                $routeParts = explode('/', $producto->foto);
                Storage::disk('public')->delete('productos/' . end($routeParts));

                $url = $foto->store('productos', 'public');
            } else {
                $url = $producto->foto;
            }
            $producto->fill([
                'foto' => $url,
            ]);
        }

        $producto->save();

        return redirect()
            ->back()
            ->with('exito', 'Datos actualizados');
    }


    /**
     * Método para mostrar el formulario de alta de una nuevo mensaje Chusqer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('productos.create');
    }


    /**
     * Guarda en la base de datos la información facilitada para un nuevo producto.
     * Utiliza la definición personalizada de un Request para validar los datos.
     *
     * @param CreateProductoRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductoRequest $request)
    {

        $user = $request->user();

        if ($foto = $request->file('foto')) {
            $url = $foto->store('productos', 'public');
        } else {
            $url = '/images/default_product.jpeg';
        }

        Producto::create([
            'user_id' => $user->id,
            'titulo' => $request->input('titulo'),
            'foto' => $url,
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'categoria' => $request->input('categoria'),
            'tipo_envio' => $request->input('tipo_envio'),
            'negociacion_precio' => $request->input('negociacion_precio'),
            'intercambio_producto' => $request->input('intercambio_producto'),
            'destacado' => $request->input('destacado')
        ]);

        return redirect('/');
    }


    /** Muestra la vista de la tabla realizada con datatable.js, con todos los productos de la base de datos.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tabla()
    {
        $tablaProductos = Producto::with('user')->get();

        return view('productos.tabla', [
            'tablaProductos' => $tablaProductos
        ]);
    }


    /** Función que busca productos dependiendo del input que reciba en la $request.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        if ($request->input('busqueda')) {
            $busqueda = $request->input('busqueda');

            $productos = Producto::with('user')->where('titulo', 'LIKE', "%{$busqueda}%")->paginate(9);

            return view('productos.busqueda', [
                'productos' => $productos
            ]);

        } elseif ($request->input('categoria')) {

            $categoria = $request->input('categoria');

            if ($request->input('checkNegociacionPrecio') !== null && $request->input('checkIntercambio') !== null) {

                $productos = Producto::with('user')->where('categoria', 'LIKE', "%{$categoria}%")->where('negociacion_precio', "1")->where('intercambio_producto', "1")->paginate(9);

            } else if ($request->input('checkNegociacionPrecio') !== null && $request->input('checkIntercambio') == null) {

                $productos = Producto::with('user')->where('categoria', 'LIKE', "%{$categoria}%")->where('negociacion_precio', "1")->paginate(9);

            } else if ($request->input('checkNegociacionPrecio') == null && $request->input('checkIntercambio') !== null) {

                $productos = Producto::with('user')->where('categoria', 'LIKE', "%{$categoria}%")->where('intercambio_producto', "1")->paginate(9);

            } else {

                $productos = Producto::with('user')->where('categoria', 'LIKE', "%{$categoria}%")->paginate(9);
            }

            return view('productos.busqueda', [
                'productos' => $productos
            ]);
        }

        return view('/');
    }


    /** Borramos un producto con soft delete, las contraofertas que ha recibido ese producto si las eliminamos
     *  definitivamente.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

        $producto = Producto::where('id', $id)->first();

        $contraofertas = $this->user->contraofertas()->where('producto_id', $producto->id);

        $producto->delete();

        $contraofertas->delete();

        return redirect('/user/' . $this->user->slug);
    }


    public function borrar($id)
    {
        if (request()->ajax()) {
            $producto = Producto::where('id', $id)->first();
            dd($producto);

            $contraofertas = $this->user->contraofertas()->where('producto_id', $producto->id);

            $producto->delete();

            $contraofertas->delete();

        }

        return redirect()->back();
    }
}
