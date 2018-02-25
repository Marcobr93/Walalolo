<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileEditFormRequest extends FormRequest
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
        $rules['current_password'] = $this->validarCurrentPassword();
        $rules['password'] = $this->validarPassword();
        $rules['name'] = $this->validarName();
        $rules['apellido'] = $this->validarApellido();
        $rules['dni'] = $this->validarDni();
        $rules['num_telefono'] = $this->validarNumTelefono();
        $rules['direccion'] = $this->validarDireccion();
        $rules['poblacion'] = $this->validarPoblacion();
        $rules['fecha_nac'] = $this->validarFechaNac();
        $rules['descripcion'] = $this->validarDescripcion();

        return $rules;
    }

    public function messages()
    {
        $mensajesNombreUsuario = $this->mensajesNombreUsuario();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesEmailLogin = $this->mensajesEmailLogin();
        $mensajesCurrentPassword = $this->mensajesCurrentPassword();
        $mensajesPassword = $this->mensajesPassword();
        $mensajesName = $this->mensajesName();
        $mensajesApellido = $this->mensajesApellido();
        $mensajesDni = $this->mensajesDni();
        $mensajesNumTelefono = $this->mensajesNumTelefono();
        $mensajesDireccion = $this->mensajesDireccion();
        $mensajesPoblacion = $this->mensajesPoblacion();
        $mensajesFechaNac = $this->mensajesFechaNac();
        $mensajesDescripcion = $this->mensajesDescripcion();

        $mensajes = array_merge(
            $mensajesNombreUsuario,
            $mensajesEmail,
            $mensajesEmailLogin,
            $mensajesCurrentPassword,
            $mensajesPassword,
            $mensajesName,
            $mensajesApellido,
            $mensajesDni,
            $mensajesNumTelefono,
            $mensajesDireccion,
            $mensajesPoblacion,
            $mensajesFechaNac,
            $mensajesDescripcion
        );
        return $mensajes;
    }

    protected function validarNombreUsuario(){
        return 'string|max:20|unique:users|nullable';
    }

    protected function mensajesNombreUsuario(){
        $mensajes = array();
        $mensajes["nombre_usuario.string"] = 'Introduzca el nombre';
        $mensajes["nombre_usuario.max"] = 'Has superado el límite de 20 caracteres.';
        $mensajes["nombre_usuario.unique"] = 'El nombre de usuario no está disponible';
        return $mensajes;
    }

    protected function validarEmail(){
        return 'string|email|max:50|unique:users|nullable';
    }

    protected function mensajesEmail(){
        $mensajes = array();
        $mensajes['email.email'] = 'Introduzca un email valido';
        $mensajes["email.max"] = 'Supera el máximo de 50 caracteres.';
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

    protected function validarCurrentPassword(){
        return 'required|string|min:6';
    }

    protected function mensajesCurrentPassword(){
        $mensajes = array();
        $mensajes["current_password.required"] = 'Es necesario introducir la contraseña actual.';
        $mensajes["current_password.string"] = 'Introduzca la contraseña actual.';
        $mensajes["current_password.min"] = 'La contraseña actual debe tener como mínimo 6 caracteres.';
        return $mensajes;
    }

    protected function validarPassword(){
        return 'required|string|min:6';
    }

    protected function mensajesPassword(){
        $mensajes = array();
        $mensajes["password.required"] = 'Es necesario introducir una contraseña.';
        $mensajes["password.string"] = 'Introduzca la contraseña.';
        $mensajes["password.min"] = 'La contraseña debe tener como mínimo 6 caracteres.';
        return $mensajes;
    }

    protected function validarName(){
        return 'nullable|string|max:50';
    }

    protected function mensajesName(){
        $mensajes = array();
        $mensajes["name.string"] = 'Introduzca el nombre';
        $mensajes["name.max"] = 'Has superado el límite de 50 caracteres.';
        return $mensajes;
    }

    protected function validarApellido(){
        return 'nullable|string|max:50';
    }

    protected function mensajesApellido(){
        $mensajes = array();
        $mensajes["apellido.string"] = 'Introduzca los apellidos.';
        $mensajes["apellido.max"] = 'Has superado el límite de 50 caracteres.';
        return $mensajes;
    }

    protected function validarDni(){
        return 'nullable|string|max:30';
    }

    protected function mensajesDni(){
        $mensajes = array();
        $mensajes["dni.string"] = 'Introduzca el DNI.';
        $mensajes["dni.max"] = 'Has superado el límite de 30 caracteres.';
        return $mensajes;
    }

    protected function validarNumTelefono(){
        return 'nullable|string|max:50';
    }

    protected function mensajesNumTelefono(){
        $mensajes = array();
        $mensajes["num_telefono.string"] = 'Introduzca el número de teléfono.';
        $mensajes["num_telefono.max"] = 'Has superado el límite de 50 caracteres.';
        return $mensajes;
    }

    protected function validarDireccion(){
        return 'nullable|string|max:255';
    }

    protected function mensajesDireccion(){
        $mensajes = array();
        $mensajes["direccion.string"] = 'Introduzca la dirección.';
        $mensajes["direccion.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

    protected function validarPoblacion(){
        return 'nullable|string|max:255';
    }

    protected function mensajesPoblacion(){
        $mensajes = array();
        $mensajes["poblacion.string"] = 'Introduzca la población.';
        $mensajes["poblacion.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

    protected function validarFechaNac(){
        return 'nullable|date';
    }

    protected function mensajesFechaNac(){
        $mensajes = array();
        $mensajes["fecha_nac.date"] = 'La fecha tiene que tener formato fecha.';
        return $mensajes;
    }

    protected function validarDescripcion(){
        return 'nullable|max:255';
    }

    protected function mensajesDescripcion(){
        $mensajes = array();
        $mensajes["descripcion.string"] = 'Introduzca la descripción.';
        $mensajes["descripcion.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }
}
