<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Http\Requests\CreateProductoRequest;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Método que muestra la información de un mensaje. Utiliza Route Binding
     * para coneguir el Chusqer facilitado por el parámetro.
     *
     * @param Producto $productos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Producto $producto)
    {
        return view('productos.show', [
            'producto' => $producto
        ]);
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
            'user_id'   => $user->id,
            'titulo'      => $request->input('titulo'),
            'foto'        => $request->input('foto'),
            'descripcion' => $request->input('descripcion'),
            'direccion'   => $request->input('direccion'),
            'poblacion'   => $request->input('poblacion'),
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
