<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(CreateReviewRequest $request){

        Review::create([
            'user_id'  => $request->input('user_id'),
            'review_user_id'  => $request->input('review_user_id'),
            'comentario'  => $request->input('comentario')
        ]);

        return back();
        return redirect()->back();
    }

    public function review($nombre_usuario)
    {
        $userLogeado = User::where('nombre_usuario', $nombre_usuario)->first();

        return view('reviews.reviews', [
            'user' => $userLogeado
        ]);
    }
}
