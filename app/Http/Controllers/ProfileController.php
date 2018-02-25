<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateProfileEditAjaxFormRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.edit');

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

    /*Validacion por Ajax con FormRquest*/
    protected function validacionAjax(CreateProfileEditAjaxFormRequest $request){
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }

    /**
     * @param $nombre_usuario
     * @return $this
     */
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request)
    {
        $path = $request->path();
        $user = Auth::user();


        if(strpos($path, 'cuenta')){
            $data = array_filter($request->all());

            $user = User::findOrFail(Auth::user()->id);

            $user->fill($data);
        }elseif(strpos($path, 'password')){

            if( ! Hash::check($request->get('current_password'), $user->password ) ){
                return redirect()->back()->with('error', 'La contraseña actual no es correcta');
            }

            if( strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
            }

            $user->password = bcrypt($request->get('password'));
        }elseif(strpos($path, 'datos-personales')){

            $data = array_filter($request->all());

            $user = User::findOrFail(Auth::user()->id);

            $user->fill($data);
        }elseif(strpos($path, 'avatar')){

            $avatar = $request->file('avatar');

            $url = $avatar->store('image', 'public');

            $user = User::findOrFail(Auth::user()->id);

            $user->avatar = $url;
        }

        $user->save();

        return redirect()
            ->route('perfil.cuenta')
            ->with('exito', 'Datos actualizados');
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

    public function prueba(){
        return view('prueba');
    }
}
