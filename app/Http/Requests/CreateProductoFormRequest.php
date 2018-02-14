<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoFormRequest extends FormRequest
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

        $rules['titulo'] = $this->validarTitulo();
        $rules['precio'] = $this->validarPrecio();
        $rules['categoria'] = $this->validarCategoria();
        $rules['tipo_envio'] = $this->validarTipoEnvio();
        $rules['negociacion_precio'] = $this->validarNegociacionPrecio();
        $rules['intercambio_producto'] = $this->validarIntercambioProducto();
        $rules['destacado'] = $this->validarDestacado();
        $rules['descripcion'] = $this->validarDescripcion();

        return $rules;
    }

    public function messages()
    {
        $mensajesTitulo = $this->mensajesTitulo();
        $mensajesPrecio = $this->mensajesPrecio();
        $mensajesCategoria = $this->mensajesCategoria();
        $mensajesTipoEnvio = $this->mensajesTipoEnvio();
        $mensajesNegociacionPrecio = $this->mensajesNegociacionPrecio();
        $mensajesIntercambioProducto = $this->mensajesIntercambioProducto();
        $mensajesDestacado = $this->mensajesDestacado();
        $mensajesDescripcion = $this->mensajesDescripcion();
        $mensajes = array_merge(
            $mensajesTitulo,
            $mensajesPrecio,
            $mensajesCategoria,
            $mensajesTipoEnvio,
            $mensajesNegociacionPrecio,
            $mensajesIntercambioProducto,
            $mensajesDestacado,
            $mensajesDescripcion
        );
        return $mensajes;
    }

    protected function validarTitulo(){
        return 'required|string|max:50';
    }

    protected function mensajesTitulo(){
        $mensajes = array();
        $mensajes["titulo.required"] = 'Introduzca el título del producto.';
        $mensajes["titulo.string"] = 'El campo título debe ser una cadena de caracteres.';
        $mensajes["titulo.max"] = 'Has superado el límite de 50 caracteres.';
        return $mensajes;
    }

    protected function validarPrecio(){
        return 'required|numeric|max:999999999';
    }

    protected function mensajesPrecio(){
        $mensajes = array();
        $mensajes['precio.required'] = 'Es obligatorio introducir el precio de producto';
        $mensajes["precio.numeric"] = 'El precio debe ser un número';
        $mensajes["precio.max"] = 'Has superado el límite de cantidad para el precio.';
        return $mensajes;
    }

    protected function validarCategoria(){
        return 'required|string|max:255';
    }

    protected function mensajesCategoria(){
        $mensajes = array();
        $mensajes["categoria.required"] = 'Introduzca la categoría del producto.';
        $mensajes["categoria.string"] = 'El campo categoría debe ser una cadena de caracteres.';
        $mensajes["categoria.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

    protected function validarTipoEnvio(){
        return 'required|string|max:255';
    }

    protected function mensajesTipoEnvio(){
        $mensajes = array();
        $mensajes["tipo_envio.required"] = 'Introduzca el tipo de envío del producto.';
        $mensajes["tipo_envio.string"] = 'El campo tipo de envío debe ser una cadena de caracteres.';
        $mensajes["tipo_envio.max"] = 'Has superado el límite de 255 caracteres.';
        return $mensajes;
    }

    protected function validarNegociacionPrecio(){
        return 'required|numeric';
    }

    protected function mensajesNegociacionPrecio(){
        $mensajes = array();
        $mensajes["negociacion_precio.required"] = 'Introduzca si desea o no negociar el precio del producto.';
        $mensajes["negociacion_precio.numeric"] = 'El campo negociación del precio debe ser de tipo boolean.';
        return $mensajes;
    }

    protected function validarIntercambioProducto(){
        return 'required|numeric';
    }

    protected function mensajesIntercambioProducto(){
        $mensajes = array();
        $mensajes["intercambio_producto.required"] = 'Introduzca si desea o no un intercambio de productos.';
        $mensajes["intercambio_producto.numeric"] = 'El campo negociación del precio debe ser de tipo boolean.';
        return $mensajes;
    }

    protected function validarDestacado(){
        return 'required|numeric';
    }

    protected function mensajesDestacado(){
        $mensajes = array();
        $mensajes["destacado.required"] = 'Introduzca si desea que su producto salga en "destacados".';
        $mensajes["destacado.numeric"] = 'El campo destacado debe ser de tipo boolean.';
        return $mensajes;
    }

    protected function validarDescripcion(){
        return 'max:500';
    }

    protected function mensajesDescripcion(){
        $mensajes = array();
        $mensajes["descripcion.max"] = 'Has superado el límite de 500 caracteres.';
        return $mensajes;
    }
}
