<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoAjaxFormRequest;
use App\Producto;
use App\Http\Requests\CreateProductoRequest;
use App\User;
use Illuminate\Http\Request;

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
     * Método para mostrar el formulario de alta de una nuevo mensaje Chusqer.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guarda en la base de datos la información facilitada para un nuevo mensaje.
     * Utiliza la definición personalizada de un Request para validar los datos.
     *
     * @param CreateProductoRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductoRequest $request){

        $user = $request->user();

        Producto::create([
            'user_id'     => $user->id,
            'titulo'      => $request->input('titulo'),
            'foto'        => '/images/default_product.jpeg',
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
