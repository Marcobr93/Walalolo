<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $user = DB::table('users')->where('nombre_usuario',$user)->first();

        return view('users.profile', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $user= DB::table('users')->where('nombre_usuario', $nombre_usuario)->first();
        return view('users.edit')->with('user', $user);
    }

    /**
     * @param CreateUserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreateUserRequest $request, $id)
    {
        $user = User::find($id);

        dd($user);
        //$user = User::where('slug', $user)->first();


        $user->nombre_usuario = $_POST['nombre_usuario']?$_POST['nombre_usuario']:null;
        $user->name = $_POST['name']?$_POST['name']:null;
        $user->apellido = $_POST['apellido']?$_POST['apellido']:null;
        $user->avatar = $_POST['avatar']?$_POST['avatar']:null;
        $user->email = $request->input('email');
        $user->dni = $_POST['dni']?$_POST['dni']:null;
        $user->num_telefono = $request->input('num_telefono');
        $user->direccion = $_POST['direccion']?$_POST['direccion']:null;
        $user->poblacion = $_POST['poblacion']?$_POST['poblacion']:null;
        $user->website = $_POST['website']?$_POST['website']:null;
        $user->descripcion = $_POST['descripcion']?$_POST['descripcion']:null;

        $user->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
