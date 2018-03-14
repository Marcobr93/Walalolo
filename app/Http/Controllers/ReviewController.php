<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Review;
use App\User;

class ReviewController extends Controller
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


    /** Función que guarda las reviews realizadas por los usuarios sobre otros usuarios.
     * @param CreateReviewRequest $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateReviewRequest $request, $user)
    {
        Review::create([
            'user_id' => $user,
            'review_user_id' => $this->user->id,
            'comentario' => $request->input('comentario')
        ]);

        return redirect()->back();
    }

    public function comentar(CreateReviewRequest $request)
    {
        if (request()->ajax()) {
            $data = json_decode(file_get_contents("php://input"), true);

            Review::create([
                'user_id' => $request->input('user_id'),
                'review_user_id' => $request->input('review_user_id'),
                'comentario' => $request->input('comentario')
            ])->render();

            return redirect()->back();

        } else {
            return redirect('/');
        }
    }


    /** Muestra las reviews del usuario en cuestión.
     * @param $nombre_usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function review($nombre_usuario)
    {
        $user = $this->buscarPorNombreUsuario($nombre_usuario);

        return view('reviews.reviews', [
            'user' => $user
        ]);
    }


    /** Función que busca y devuelve el usuario según el $nombre_usuario recibido.
     * @param $nombre_usuario
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function buscarPorNombreUsuario($nombre_usuario)
    {
        return User::with('user')->where('nombre_usuario', $nombre_usuario)->firstOrFail();
    }
}
