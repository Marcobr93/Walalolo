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


class ProductoController extends Controller
{

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

        $user = User::where('id', $producto['user_id'])->firstOrFail();

        return view('productos.show', [
            'producto' => $producto,
            'user' => $user
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


    /** Editamos un producto
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
        } elseif (strpos($path, 'otros-datos')) {
            $data = array_filter($request->all());

            $producto->fill($data);
        } elseif (strpos($path, 'foto')) {

            $foto = $request->file('foto');

            $url = $foto->store('image', 'public');

            $producto->foto = $url;
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
            $url = $foto->store('image', 'public');
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
        $tablaProductos = Producto::all();

        return view('productos.tabla', [
            'tablaProductos' => $tablaProductos
        ]);
    }

    public function search(Request $request){
        $query = $request->input('busqueda');

        $productos = Producto::with('user')->where('titulo', 'LIKE', "%{$query}%")->paginate(9);
        return view('productos.busqueda',[
            'productos' => $productos
        ]);
    }
}
