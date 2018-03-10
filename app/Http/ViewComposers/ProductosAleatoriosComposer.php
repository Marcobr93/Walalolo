<?php

namespace App\Http\ViewComposers;

use App\Producto as Producto;
use Illuminate\Contracts\View\View;

class ProductosAleatoriosComposer
{
    public function compose(View $view)
    {
        $productos = Producto::all()->random(3);

        $view->with('productos', $productos);
    }
}