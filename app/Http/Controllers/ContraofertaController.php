<?php

namespace App\Http\Controllers;

use App\Contraoferta;
use App\Http\Requests\CreateContraofertaRequest;
use App\Producto;
use App\User;


class ContraofertaController extends Controller
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

    /** Función que guarda en la base de datos una contraoferta realizada sobre un producto.
     * @param CreateContraofertaRequest $request
     * @param $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateContraofertaRequest $request, $producto)
    {
        $producto = Producto::where('id', $producto)->first();

        Contraoferta::create([
            'comprador_user_id' => $this->user->id,
            'vendedor_user_id' =>  $producto->user_id,
            'producto_id' => $producto->id,
            'oferta' => $request->input('oferta'),
            'estado_oferta' => "En proceso",
        ]);

        return redirect()->back();
    }


    /** Mostramos todas las ofertas que el usuario logeado recibe.
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function oferta($slug)
    {
        $userLogeado = $this->buscarPorSlug($slug);

        $contraofertas = $userLogeado->contraofertas()->with('comprador')->orderBy('created_at', 'desc')->paginate(9);

        return view('contraofertas.oferta', [
            'user' => $userLogeado,
            'contraofertas' => $contraofertas
        ]);
    }


    /** Muestra todas las ofertas que el usuario ha aceptado.
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ofertaAceptada($slug)
    {
        $userLogeado = $this->buscarPorSlug($slug);

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


    /** Función que obtiene un usuario a partir del $slug recibido.
     * @param $slug
     * @return mixed
     */
    public function buscarPorSlug($slug)
    {
        return User::where('slug', $slug)->firstOrFail();
    }

}
