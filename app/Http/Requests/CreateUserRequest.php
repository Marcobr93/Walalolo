<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_usuario' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|string|min:6|email|confirmed',
            'dni' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255'
        ];
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
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
            'password.required' => 'El password de usuario es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.max' => 'El nombre debe tener 6 caracteres como máximo',
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
            'dni.string' => 'El DNI debe ser una cadena de caracteres.'
        ];
    }
}
