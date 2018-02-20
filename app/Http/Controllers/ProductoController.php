<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoAjaxFormRequest;
use App\Producto;
use App\Http\Requests\CreateProductoRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**Método que muestra la información de un producto. Utiliza Route Binding
     * para coneguir el Producto facilitado por el parámetro.
     * @param Producto $producto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Producto $producto)
    {
        $user = User::where('id', $producto['user_id'])->first();

        return view('productos.show', [
            'producto' => $producto,
            'user' => $user
        ]);
    }


    /*Validacion por Ajax con FormRquest*/
    protected function validacionAjax(CreateProductoAjaxFormRequest $request){
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }


    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $producto = DB::table('productos')->where('id', $id)->first();

        return view('productos.edit')->with('producto', $producto);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, CreateProductoRequest $request)
    {
        $producto = Producto::find($id);

        if ($foto = $request->file('foto')){
            $url = $foto->store('image', 'public');
        }else {
            $url = '/images/default_product.jpeg';
        }

        $producto->titulo = $_POST['titulo'];
        $producto->foto = $url;
        $producto->precio = $_POST['precio'];
        $producto->categoria = $_POST['categoria'];
        $producto->tipo_envio = $_POST['tipo_envio'];
        $producto->negociacion_precio = $_POST['negociacion_precio'];
        $producto->intercambio_producto = $_POST['intercambio_producto'];
        $producto->destacado = $_POST['destacado'];
        $producto->descripcion = $_POST['descripcion'];

        $producto->save();

        return redirect('/');
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
    public function store(CreateProductoRequest $request){

        $user = $request->user();

        if ($foto = $request->file('foto')){
            $url = $foto->store('image', 'public');
        }else {
            $url = '/images/default_product.jpeg';
        }

        Producto::create([
            'user_id'     => $user->id,
            'titulo'      => $request->input('titulo'),
            'foto'        => $url,
            'descripcion' => $request->input('descripcion'),
            'precio'      => $request->input('precio'),
            'categoria'   => $request->input('categoria'),
            'tipo_envio'  => $request->input('tipo_envio'),
            'negociacion_precio' => $request->input('negociacion_precio'),
            'intercambio_producto' => $request->input('intercambio_producto'),
            'destacado'   => $request->input('destacado')
        ]);

        return redirect('/');
    }
}
