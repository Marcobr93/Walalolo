<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\CreateUserRequest;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use JavaScript;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $user1 = User::where('slug', $user)->first();

        $productos = $user1->productos()->latest()->paginate(6);

        $totalProductos = $user1->productos()->count();

        $usuario = $this->buscarPorNombre($user);

        $media = $usuario->valoracionMedia();

        return view('users.index', [
            'productos' => $productos,
            'user' => $user1,
            'media' => $media,
            'totalProductos' => $totalProductos
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($username, Request $request)
    {
        $user = $this->buscarPorNombre($username);

        $me = $request->user();

        $message = $request->input('message');

        $conversation = Conversation::between($me, $user);

        PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'content' => $message,
        ]);

        return redirect('/user/conversations/' . $conversation->id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $nombre_usuario
     * @return $this
     */
    public function edit($nombre_usuario)
    {
        //
    }

    /**
     * @param CreateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateUserRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /** Función que obtiene un usuario a partir del $slug.
     * @param $slug
     * @return mixed
     */
    public function buscarPorNombre($slug)
    {
        return User::where('slug', $slug)->first();
    }


    /** Muestra los mensajes privados de un usuario.
     * @param $username
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showUserConversation($username, Request $request)
    {
        $user = $this->buscarPorNombre($username);

        $me = $request->user();

        $conversation = Conversation::between($me, $user);

        return redirect('/user/conversations/' . $conversation->id);

    }

    /** Devuelve la vista con los mensajes privados entre los dos usuarios.
     * @param Conversation $conversation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConversation(Conversation $conversation)
    {

        return view('users.conversation', [
            'conversation' => $conversation,
        ]);
    }
}
