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
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:users',
            'avatar' => 'max:255',
            'password' => 'required|string|min:6|confirmed',
            'dni' => 'required|string|max:255',
            'num_telefono' => 'max:20',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
            'website' => 'max:255',
            'descripcion' => 'string|max:500'
        ], [
            'nombre_usuario.required' => 'Es necesario completar el campo "nombre de usuario".',
            'nombre_usuario.max' => 'Has sobrepasado los 255 caracteres disponibles para el "nombre de usuario".',
            'nombre_usuario.string' => 'El nombre de usuario debe ser una cadena de caracteres.',
            'name.required' => 'Es necesario completar el campo "nombre".',
            'name.max' => 'Has sobrepasado los 255 caracteres disponibles para el "nombre".',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'apellido.required' => 'Es necesario completar el campo "apellido".',
            'apellido.max' => 'Has sobrepasado los 500 caracteres disponibles para el "apellido".',
            'apellido.string' => 'El apellido debe ser una cadena de caracteres.',
            'email.required' => 'Es necesario completar el campo "email".',
            'email.max' => 'Has sobrepasado los 255 caracteres disponibles para el "email".',
            'email.email' => 'El email debe ser un email válido.',
            'email.unique' => 'El email debe ser un email disponible.',
            'avatar.max' => 'Has sobrepasado los 250 caracteres disponibles para el "avatar".',
            'num_telefono.max' => 'Has sobrepasado los 20 caracteres disponibles para el "número de teléfono".',
            'password.required' => 'El password de usuario es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.max' => 'El nombre debe tener 6 caracteres como mínimo',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'direccion.required' => 'Es necesario completar el campo "descripción".',
            'direccion.max' => 'Has sobrepasado los 255 caracteres disponibles para la "descripción".',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
            'poblacion.required' => 'Es necesario completar el campo "población".',
            'poblacion.max' => 'Has sobrepasado los 255 caracteres disponibles para la "población".',
            'poblacion.string' => 'La población debe ser una cadena de caracteres.',
            'precio.required' => 'Es necesario completar el campo "precio".',
            'precio.numeric' => 'El "precio" debe ser un número',
            'dni.required' => 'Es necesario completar el campo "DNI".',
            'dni.max' => 'Has sobrepasado los 255 caracteres disponibles para el "DNI".',
            'dni.string' => 'El DNI debe ser una cadena de caracteres.',
            'website.max' => 'Has sobrepasado los 255 caracteres disponibles para el "website".',
            'descripcion.max' => 'Has sobrepasado los 500 caracteres disponibles para la "descripción".',
            'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
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
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'password' => bcrypt($data['password']),
            'dni' => $data['dni'],
            'num_telefono' => $data['num_telefono'],
            'direccion' => $data['direccion'],
            'poblacion' => $data['poblacion'],
            'website' => $data['website'],
            'descripcion' => $data['descripcion']
        ]);
    }
}
