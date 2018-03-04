<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
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
        $rules = array();

        $rules['nombre_usuario'] = $this->validarNombreUsuario();
        $rules['email'] = $this->validarEmail();

        return $rules;
    }

    public function messages()
    {
        $mensajesNombreUsuario = $this->mensajesNombreUsuario();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesEmailLogin = $this->mensajesEmailLogin();
        $mensajes = array_merge(
            $mensajesNombreUsuario,
            $mensajesEmail,
            $mensajesEmailLogin
        );
        return $mensajes;
    }

    protected function validarNombreUsuario(){
        return 'required|string|max:20|unique:users';
    }

    protected function mensajesNombreUsuario(){
        $mensajes = array();
        $mensajes["nombre_usuario.required"] = 'Introduzca el nombre';
        $mensajes["nombre_usuario.string"] = 'Introduzca el nombre';
        $mensajes["nombre_usuario.max"] = 'Has superado el límite de 20 caracteres.';
        $mensajes["nombre_usuario.unique"] = 'El nombre de usuario no está disponible';
        return $mensajes;
    }

    protected function validarEmail(){
        return 'required|string|email|max:50|unique:users';
    }

    protected function mensajesEmail(){
        $mensajes = array();
        $mensajes['email.email'] = 'Introduzca un email valido';
        $mensajes['email.required'] = 'Es obligatorio introducir el email';
        $mensajes["email.max"] = 'Supera el máximo';
        $mensajes["email.unique"] = 'El email no está disponible';
        return $mensajes;
    }

    protected function validarEmailLogin(){
        return 'email';
    }

    protected function mensajesEmailLogin(){
        $mensajes = array();
        $mensajes['emailLogin.email'] = 'Introduzca un formato de email valido';
        return $mensajes;
    }
}
