<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
        ], [
            'nombre_usuario.required' => 'Es necesario completar el campo "nombre de usuario".',
            'nombre_usuario.max' => 'Has sobrepasado los 255 caracteres disponibles para el "nombre de usuario".',
            'nombre_usuario.string' => 'El nombre de usuario debe ser una cadena de caracteres.',
            'email.required' => 'Es necesario completar el campo "email".',
            'email.max' => 'Has sobrepasado los 255 caracteres disponibles para el "email".',
            'email.email' => 'El email debe ser un email válido.',
            'email.unique' => 'El email debe ser un email disponible.',
            'password.required' => 'El password de usuario es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.max' => 'El nombre debe tener 6 caracteres como mínimo',
            'password.confirmed' => 'Las contraseñas no coinciden',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'slug' => str_slug($data['nombre_usuario']),
            'avatar'        => '/images/userXDefecto.jpeg',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
