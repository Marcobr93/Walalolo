<?php

namespace App\Http\Controllers;

use App\Contraoferta;
use App\Http\Requests\CreateContraofertaRequest;
use App\User;


class ContraofertaController extends Controller
{
    /** Función que guarda en la base de datos una contraoferta realizada sobre un producto.
     * @param CreateContraofertaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateContraofertaRequest $request)
    {

        Contraoferta::create([
            'comprador_user_id' => $request->input('comprador_user_id'),
            'vendedor_user_id' => $request->input('vendedor_user_id'),
            'producto_id' => $request->input('producto_id'),
            'oferta' => $request->input('oferta'),
            'estado_oferta' => "En proceso",
        ]);

        return redirect()->back();
    }


    /** Mostramos todas las ofertas que el usuario logeado recibe.
     * @param $nombre_usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function oferta($nombre_usuario)
    {
        $userLogeado = $this->userLogeado($nombre_usuario);

        $contraofertas = $userLogeado->contraofertas()->with('comprador')->paginate(9);

        return view('contraofertas.oferta', [
            'user' => $userLogeado,
            'contraofertas' => $contraofertas
        ]);
    }


    /** Muestra todas las ofertas que el usuario ha aceptado.
     * @param $nombre_usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ofertaAceptada($nombre_usuario)
    {
        $userLogeado = $this->userLogeado($nombre_usuario);

        $contraofertasAceptadas = $userLogeado->contraofertasAceptadas()->with('comprador')->paginate(9);


        return view('contraofertas.aceptadas', [
            'user' => $userLogeado,
            'contraofertas' => $contraofertasAceptadas
        ]);
    }


    /** Edita el estado de la oferta de una contraoferta, aceptándola o rechazándola.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {
        $contraoferta = Contraoferta::find($id);

        $contraoferta->estado_oferta = $_POST['estado_oferta'];

        $contraoferta->save();

        return redirect()->back();
    }

    /** Función que devuelve el usuario logeado.
     * @return mixed
     */
    public function userLogeado($nombre_usuario)
    {
        return User::where('nombre_usuario', $nombre_usuario)->firstOrFail();
    }

}
