<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
use App\User;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;

class UsersController extends Controller
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPrivateMessage($slug, Request $request)
    {
        $user = $this->buscarPorSlug($slug);

        $me = $request->user();

        $message = $request->input('message');
        if ($message !== null) {
            $conversation = Conversation::between($me, $user);

            PrivateMessage::create([
                'conversation_id' => $conversation->id,
                'user_id' => $me->id,
                'content' => $message,
            ]);

            return redirect('/user/conversations/' . $conversation->id);
        } else {
            return redirect('/user/' . $user->slug);
        }
    }


    /** Display the specified resource.
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user)
    {
        $usuario = User::where('slug', $user)->firstOrFail();

        $productos = $usuario->productos()->latest()->with('user')->paginate(6);

        $totalProductos = $usuario->productos()->count();

        $media = $usuario->valoracionMedia();

        $data = GeoIP::getLocation($usuario->ip);

        if ($this->user !== null) {
            $conversation = Conversation::conversationId($this->user, $usuario);
        } else {
            $conversation = null;
        }

        return view('users.index', [
            'productos' => $productos,
            'user' => $usuario,
            'media' => $media,
            'totalProductos' => $totalProductos,
            'conversation' => $conversation,
            'data' => $data
        ]);
    }


    /** Elimina definitivamente al usuario en concreto.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        $this->user->delete();

        return redirect('/');
    }


    /** Devuelve la vista con los mensajes privados entre los dos usuarios.
     * @param Conversation $conversation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConversation(Conversation $conversation)
    {
        if (Conversation::userInConversation($this->user, $conversation)) {
            return view('users.conversation', [
                'conversation' => $conversation
            ]);
        } else {
            return redirect('/');
        }
    }


    /** Función que nos muestra todas las conversaciones que tiene le usuario logeado.
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllUserConversation($slug)
    {
        $user = $this->buscarPorSlug($slug);

        $conversations = $user->conversations()->paginate(12);

        return view('users.allConversations', [
            'user' => $user,
            'conversations' => $conversations
        ]);
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
