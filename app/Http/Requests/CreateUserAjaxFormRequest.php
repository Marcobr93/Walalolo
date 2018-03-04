<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateUserAjaxFormRequest extends CreateUserFormRequest
{
    public function rules()
    {

        $rules = array();

        if ($this->exists('nombre_usuario')) {
            $rules['nombre_usuario'] = $this->validarNombreUsuario();
        }

        if ($this->exists('email')) {
            $rules['email'] = $this->validarEmail();
        }

        if ($this->exists('emailLogin')) {
            $rules['emailLogin'] = $this->validarEmailLogin();
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
        ]);

        throw new ValidationException($validator, $response);
    }
}
