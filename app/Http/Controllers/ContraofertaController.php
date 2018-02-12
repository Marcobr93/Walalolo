<?php

namespace App\Http\Controllers;

use App\Contraoferta;
use App\Http\Requests\CreateContraofertaRequest;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContraofertaController extends Controller
{
    public function store(CreateContraofertaRequest $request)
    {

        Contraoferta::create([
            'comprador_user_id' => $request->input('comprador_user_id'),
            'vendedor_user_id' => $request->input('vendedor_user_id'),
            'producto_id' => $request->input('producto_id'),
            'oferta' => $request->input('oferta'),
        ]);

        return back();
        return redirect()->back();
    }

    public function oferta($nombre_usuario)
    {

        $userLogeado = User::where('nombre_usuario', $nombre_usuario)->first();

        $ofertas = $userLogeado->contraofertas->pluck('vendedor_user_id')->toArray();

        $productosUsuario = Producto::where('user_id', $ofertas)->latest()->paginate(9);

        $contraofertas = $userLogeado->contraofertas()->paginate(9);

        return view('contraofertas.oferta', [
            'user' => $userLogeado,
            'productosUsuario' => $productosUsuario,
            'contraofertas' => $contraofertas
        ]);
    }

}
