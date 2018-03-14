<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\CreateValoracionRequest;
use App\User;
use App\Valoracion;
use Illuminate\View\View;
use Torann\GeoIP\Facades\GeoIP;

class ValoracionController extends Controller
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


    /** Función que comprueba si existe una valoración del usuario logeado con otro usuario, si no es null significa que no
     * tiene una valoración de él y por lo tanto crea una nueva, si existe, edita esa valoración por la nueva introducida.
     * @param CreateValoracionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrEdit(CreateValoracionRequest $request, $user)
    {
        $valora_user_id = $this->user->id;

        $valorado_user_id = $user;

        $valoracion = $request->input('valoracion');

        $user_valoracion = Valoracion::with('user')->where('valora_user_id', $valora_user_id)
            ->where('valorado_user_id', $valorado_user_id)->first();

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

    public function valorar(CreateValoracionRequest $request, $user)
    {
        if (request()->ajax()) {
            $data = json_decode(file_get_contents("php://input"), true);
            $valoracion = $data['valoracion'];

            $usuario = User::where('id', $user)->firstOrFail();

            $productos = $usuario->productos()->latest()->with('user')->paginate(6);

            $totalProductos = $usuario->productos()->count();

            $media = $usuario->valoracionMedia();

            $data = GeoIP::getLocation($usuario->ip);

            if ($this->user !== null) {
                $conversation = Conversation::conversationId($this->user, $usuario);
            } else {
                $conversation = null;
            }

            $valora_user_id = $this->user->id;

            $valorado_user_id = $user;

            $user_valoracion = Valoracion::with('user')->where('valora_user_id', $valora_user_id)
                ->where('valorado_user_id', $valorado_user_id)->first();

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

            return View::make('users.index', [
                'productos' => $productos,
                'user' => $usuario,
                'media' => $media,
                'totalProductos' => $totalProductos,
                'conversation' => $conversation,
                'data' => $data
            ])->render();
        } else {
            return redirect('/');
        }
    }
}
