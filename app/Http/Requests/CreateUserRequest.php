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
            'nombre_usuario' => 'required|string|max:30|unique:users',
            'name' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|max:255|email|unique:users',
            'avatar' => 'string|max:255',
            'num_telefono' => 'string|max:30',
            'password' => 'required|string|min:6|confirmed',
            'dni' => 'required|string|max:30',
            'direccion' => 'required|string|max:255',
            'poblacion' => 'required|string|max:255',
            'website'   => 'string|max:255',
            'descripcion' => 'max:500'
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
            'nombre_usuario.max' => 'Has sobrepasado los 30 caracteres disponibles para el "nombre de usuario".',
            'nombre_usuario.string' => 'El nombre de usuario debe ser una cadena de caracteres.',
            'nombre_usuario.unique' => 'El nombre de usuario no está disponible.',
            'name.required' => 'Es necesario completar el campo "nombre".',
            'name.max' => 'Has sobrepasado los 50 caracteres disponibles para el "nombre".',
            'name.string' => 'El nombre debe ser una cadena de caracteres.',
            'apellido.required' => 'Es necesario completar el campo "apellido".',
            'apellido.max' => 'Has sobrepasado los 50 caracteres disponibles para el "apellido".',
            'apellido.string' => 'El apellido debe ser una cadena de caracteres.',
            'email.required' => 'Es necesario completar el campo "email".',
            'email.max' => 'Has sobrepasado los 255 caracteres disponibles para el "email".',
            'email.email' => 'El email debe ser un email válido.',
            'email.unique' => 'El email no está disponible.',
            'avatar.string' => 'El avatar debe ser una cadena de caracteres',
            'avatar.max' => 'El avatar debe tener 6 caracteres como mínimo',
            'num_telefono.string' => 'El número de teléfono debe ser una cadena de caracteres',
            'num_telefono.max' => 'El número de teléfono debe tener 30 caracteres como máximo',
            'password.required' => 'El password de usuario es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.min' => 'El nombre debe tener 6 caracteres como mínimo',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'direccion.required' => 'Es necesario completar el campo "descripción".',
            'direccion.max' => 'Has sobrepasado los 255 caracteres disponibles para la "descripción".',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
            'poblacion.required' => 'Es necesario completar el campo "población".',
            'poblacion.max' => 'Has sobrepasado los 255 caracteres disponibles para la "población".',
            'poblacion.string' => 'La población debe ser una cadena de caracteres.',
            'dni.required' => 'Es necesario completar el campo "DNI".',
            'dni.max' => 'Has sobrepasado los 30 caracteres disponibles para el "DNI".',
            'dni.string' => 'El DNI debe ser una cadena de caracteres.',
            'website.string' => 'El website debe ser una cadena de caracteres',
            'website.max' => 'El website debe tener 6 caracteres como mínimo',
            'descripcion.max' => 'La descripción debe tener 500 caracteres como máximo',
        ];
    }
}
