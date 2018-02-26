<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Review;
use App\User;

class ReviewController extends Controller
{
    /** Función que guarda las reviews realizadas por los usuarios sobre otros usuarios.
     * @param CreateReviewRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateReviewRequest $request)
    {

        Review::create([
            'user_id' => $request->input('user_id'),
            'review_user_id' => $request->input('review_user_id'),
            'comentario' => $request->input('comentario')
        ]);

        return redirect()->back();
    }

    /** Muestra las reviews del usuario en cuestión.
     * @param $nombre_usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function review($nombre_usuario)
    {
        $userLogeado = User::where('nombre_usuario', $nombre_usuario)->first();

        return view('reviews.reviews', [
            'user' => $userLogeado
        ]);
    }
}
