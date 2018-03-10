<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

    /** Reglas de validación para la edición del perfil de usuario
     * @return array
     */
    public function rules()
    {
        $path = $this->path();

        if (strpos($path, 'cuenta')){
            $rules = [
                'nombre_usuario' => 'nullable|string|max:30|unique:users',
                'email'=> 'nullable|string|email|max:100|unique:users',
                'website' => 'nullable|string|max:255'
            ];
        }elseif (strpos($path, 'password')){
            $rules = [
                'current_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ];
        }elseif (strpos($path, 'datos-personales')){
            $rules = [
                'name' => 'nullable|string|max:50',
                'apellido' => 'nullable|string|max:50',
                'dni' => 'nullable|string|max:30',
                'num_telefono' => 'nullable|string|max:50',
                'direccion' => 'nullable|string|max:255',
                'poblacion' => 'nullable|string|max:255',
                'fecha_nac' => 'nullable|date',
                'descripcion' => 'nullable|max:500'

            ];
        }elseif (strpos($path, 'avatar')){
            $rules = [
                'avatar' => 'required|image',
            ];
        }

        return $rules;
    }

    /** Mensajes con los errores de las reglas de validación definidas previamente.
     * @return array
     */
    public function messages()
    {
        $path = $this->path();

        if (strpos($path, 'cuenta')){
            $messages = [
                'nombre_usuario.max' => 'Has sobrepasado los 30 caracteres disponibles para el "nombre de usuario".',
                'nombre_usuario.string' => 'El nombre de usuario debe ser una cadena de caracteres.',
                'nombre_usuario.unique' => 'El nombre de usuario no está disponible.',
                'email.max' => 'Has sobrepasado los 255 caracteres disponibles para el "email".',
                'email.email' => 'El email debe ser un email válido.',
                'email.unique' => 'El email no está disponible.',
                'email.string' => 'El email debe ser una cadena de caracteres.',
                'website.string' => 'El website debe ser una cadena de caracteres',
                'website.max' => 'El website debe tener 6 caracteres como mínimo',
            ];
        }elseif (strpos($path, 'password')){
            $messages = [
                'current_password.string' => 'El password debe ser una cadena de caracteres',
                'current_password.min' => 'El nombre debe tener 6 caracteres como mínimo',
                'password.string' => 'El password debe ser una cadena de caracteres',
                'password.min' => 'El nombre debe tener 6 caracteres como mínimo',
                'password.confirmed' => 'Las contraseñas no coinciden',
            ];
        }elseif (strpos($path, 'datos-personales')){
            $messages = [
                'name.max' => 'Has sobrepasado los 50 caracteres disponibles para el "nombre".',
                'name.string' => 'El nombre debe ser una cadena de caracteres.',
                'apellido.max' => 'Has sobrepasado los 50 caracteres disponibles para el "apellido".',
                'apellido.string' => 'El apellido debe ser una cadena de caracteres.',
                'dni.max' => 'Has sobrepasado los 30 caracteres disponibles para el "DNI".',
                'dni.string' => 'El DNI debe ser una cadena de caracteres.',
                'num_telefono.string' => 'El número de teléfono debe ser una cadena de caracteres',
                'num_telefono.max' => 'El número de teléfono debe tener 30 caracteres como máximo',
                'direccion.max' => 'Has sobrepasado los 255 caracteres disponibles para la "descripción".',
                'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
                'poblacion.max' => 'Has sobrepasado los 255 caracteres disponibles para la "población".',
                'poblacion.string' => 'La población debe ser una cadena de caracteres.',
                'fecha_nac.date' => 'La fecha de nacimiento debe ser una fecha.',
                'descripcion.max' => 'La descripción debe tener 500 caracteres como máximo',
            ];
        }elseif (strpos($path, 'avatar')){
            $messages = [
                'avatar.required' => 'Es necesario un avatar.',
                'avatar.image' => 'El avatar debe ser una imagen.',
            ];
        }

        return $messages;
    }
}
