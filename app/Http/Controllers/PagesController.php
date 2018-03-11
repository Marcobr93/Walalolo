<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{

    /**
     * Genera la página de inicio del proyecto.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $productos = Producto::orderBy('created_at', 'desc')->with('user')->paginate(9);

        $destacado = 0;

        foreach ($productos as $producto) {
            if ($producto->destacado == 1) {
                $destacado = $producto->id;
                break;
            }
        }

        return view('home', [
            'productos' => $productos,
            'elementoActivo' => $destacado,
        ]);
    }


    /** Paginación asíncrona
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function damePaginaProductos()
    {
        if (request()->ajax()) {

            $productos = Producto::orderBy('created_at', 'desc')->paginate(9);

            $destacado = 0;

            foreach ($productos as $producto) {
                if ($producto->destacado == 1) {
                    $destacado = $producto->id;
                    break;
                }
            }

            return View::make('productos.producto', array('productos' => $productos, 'elementoActivo' => $destacado))->render();
        } else {
            return redirect('/');
        }
    }
}
