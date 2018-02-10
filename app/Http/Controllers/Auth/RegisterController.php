<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserAjaxFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_usuario' => 'required|string|max:255|unique:users',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /*Validacion por Ajax con FormRquest*/
    protected function validacionAjax(CreateUserAjaxFormRequest $request){
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $indefinido = 'Campo no definido.';

        return User::create([
            'nombre_usuario' => ucwords(strtolower($data['nombre_usuario'])),
            'slug' => str_slug($data['nombre_usuario']),
            'avatar'        => '/images/userXDefecto.jpeg',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'name' => $indefinido,
            'apellido' => $indefinido,
            'dni' => $indefinido,
            'num_telefono' => $indefinido,
            'direccion' => $indefinido,
            'poblacion' => $indefinido,
            'website' => $indefinido,
            'descripcion' => $indefinido
        ]);
    }
}
