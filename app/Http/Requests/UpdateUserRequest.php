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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $path = $this->path();

        if (strpos($path, 'cuenta')){
            $rules = [
                'nombre_usuario' => 'nullable|string|max:30|unique:users',
                'email'=> 'nullable|string|email|max:100|unique:users',
                'website' => 'nullable|string|max:100'
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
                'descripcion' => 'nullable|max:255'

            ];
        }elseif (strpos($path, 'avatar')){
            $rules = [
                'avatar' => 'nullable',
            ];
        }

        return $rules;
    }
}
