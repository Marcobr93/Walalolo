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
        ],[
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nombre_usuario.string' => 'El nombre debe ser una cadena de caracteres',
            'nombre_usuario.max' => 'El nombre debe tener 255 caracteres como máximo',
            'nombre_usuario.unique' => 'El nombre de usuario ya existe.',
            'email.required' => 'El email de usuario es obligatorio.',
            'email.string' => 'El email debe ser una cadena de caracteres',
            'email.max' => 'El email debe tener 255 caracteres como máximo',
            'email.unique' => 'El email ya existe.',
            'password.required' => 'El password de usuario es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.max' => 'El nombre debe tener 6 caracteres como máximo',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]);
    }


    /** Validacion por Ajax con FormRquest
     * @param CreateUserAjaxFormRequest $request
     * @return array
     */
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
            'fecha_nac' => '1970/01/01',
            'num_telefono' => $indefinido,
            'direccion' => $indefinido,
            'poblacion' => $indefinido,
            'website' => $indefinido,
            'descripcion' => $indefinido,
            'ip' =>  request()->ip(),
        ]);
    }
}
