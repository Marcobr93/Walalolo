<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValoracionRequest;
use App\Valoracion;

class ValoracionController extends Controller
{

    /** Función que comprueba si existe una valoración del usuario logeado con otro usuario, si no es null significa que no
     * tiene una valoración de él y por lo tanto crea una nueva, si existe, edita esa valoración por la nueva introducida.
     * @param CreateValoracionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrEdit(CreateValoracionRequest $request)
    {
        $valora_user_id = $request->input('valora_user_id');

        $valorado_user_id = $request->input('valorado_user_id');

        $valoracion = $request->input('valoracion');

        $user_valoracion = Valoracion::with('user')->where('valora_user_id', $valora_user_id)->where('valorado_user_id', $valorado_user_id)->first();

        if ($user_valoracion == null) {
            Valoracion::create([
                'valora_user_id' => $valora_user_id,
                'valorado_user_id' => $valorado_user_id,
                'valoracion' => $valoracion
            ]);
        } else {
            $user_valoracion->valora_user_id = $valora_user_id;
            $user_valoracion->valorado_user_id = $valorado_user_id;
            $user_valoracion->valoracion = $valoracion;
            $user_valoracion->save();
        }

        return redirect()->back();
    }
}
