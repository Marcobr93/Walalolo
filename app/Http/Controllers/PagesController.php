<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Genera la página de inicio del proyecto.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        $productos = Producto::orderBy('created_at', 'desc')->paginate(9);

        return view('home', [
            'productos' => $productos
        ]);
    }

    /**
     * Página de saludo.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saludo(){
        $saludo = "Bienvenidos a Walalolo";
        $usuario = "Marco";

        return view('saludo', [
            'saludo' => $saludo,
            'usuario'=> $usuario
        ]);
    }
}
