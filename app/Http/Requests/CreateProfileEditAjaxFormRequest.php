<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateProfileEditAjaxFormRequest extends CreateProfileEditFormRequest
{
    public function rules()
    {

        $rules = array();

        if($this->exists('nombre_usuario')){
            $rules['nombre_usuario'] = $this->validarNombreUsuario();
        }

        if($this->exists('email')) {
            $rules['email'] = $this->validarEmail();
        }

        if($this->exists('emailLogin')) {
            $rules['emailLogin'] = $this->validarEmailLogin();
        }

        if($this->exists('current_password')) {
            $rules['current_password'] = $this->validarCurrentPassword();
        }

        if($this->exists('password')) {
            $rules['password'] = $this->validarPassword();
        }

        if($this->exists('name')) {
            $rules['name'] = $this->validarName();
        }

        if($this->exists('apellido')) {
            $rules['apellido'] = $this->validarApellido();
        }

        if($this->exists('dni')) {
            $rules['dni'] = $this->validarDni();
        }

        if($this->exists('num_telefono')) {
            $rules['num_telefono'] = $this->validarNumTelefono();
        }

        if($this->exists('direccion')) {
            $rules['direccion'] = $this->validarDireccion();
        }

        if($this->exists('poblacion')) {
            $rules['poblacion'] = $this->validarPoblacion();
        }

        if($this->exists('fecha_nac')) {
            $rules['fecha_nac'] = $this->validarFechaNac();
        }

        if($this->exists('descripcion')) {
            $rules['descripcion'] = $this->validarDescripcion();
        }

        return $rules;
    }


    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'nombre_usuario' => $errors->get('nombre_usuario'),
            'email' => $errors->get('email'),
            'emailLogin' => $errors->get('emailLogin'),
            'current_password' => $errors->get('current_password'),
            'password' => $errors->get('password'),
            'name' => $errors->get('name'),
            'apellido' => $errors->get('apellido'),
            'dni' => $errors->get('dni'),
            'num_telefono' => $errors->get('num_telefono'),
            'direccion' => $errors->get('direccion'),
            'poblacion' => $errors->get('poblacion'),
            'fecha_nac' => $errors->get('fecha_nac'),
            'descripcion' => $errors->get('descripcion')
        ]);

        throw new ValidationException($validator, $response);
    }
}
