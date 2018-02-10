<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateProductoAjaxFormRequest extends CreateProductoFormRequest
{
    public function rules()
    {

        $rules = array();

        if($this->exists('titulo')){
            $rules['titulo'] = $this->validarTitulo();
        }

        if($this->exists('precio')) {
            $rules['precio'] = $this->validarPrecio();
        }

        if($this->exists('categoria')) {
            $rules['categoria'] = $this->validarCategoria();
        }

        if($this->exists('tipo_envio')) {
            $rules['tipo_envio'] = $this->validarTipoEnvio();
        }

        if($this->exists('negociacion_producto')) {
            $rules['negociacion_producto'] = $this->validarNegociacionPrecio();
        }

        if($this->exists('intercambio_producto')) {
            $rules['intercambio_producto'] = $this->validarIntercambioProducto();
        }

        if($this->exists('destacado')) {
            $rules['destacado'] = $this->validarDestacado();
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
            'titulo' => $errors->get('titulo'),
            'precio' => $errors->get('precio'),
            'categoria' => $errors->get('categoria'),
            'tipo_envio' => $errors->get('tipo_envio'),
            'negociacion_producto' => $errors->get('negociacion_producto'),
            'destacado' => $errors->get('destacado'),
            'descripcion' => $errors->get('descripcion'),

        ]);

        throw new ValidationException($validator, $response);
    }
}
