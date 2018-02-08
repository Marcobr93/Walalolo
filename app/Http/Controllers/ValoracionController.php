<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValoracionRequest;
use App\User;
use App\Valoracion;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{

    public function store(CreateValoracionRequest $request){

        Valoracion::create([
            'valora_user_id'  => $request->input('valora_user_id'),
            'valorado_user_id'  => $request->input('valorado_user_id'),
            'valoracion'  => $request->input('valoracion')
        ]);

        return redirect('/');
    }

    public function valoracion($nombre_usuario)
    {
        $userLogeado = User::where('nombre_usuario', $nombre_usuario)->first();

        return view('valoraciones.valoracion', [
            'user' => $userLogeado
        ]);
    }

}
