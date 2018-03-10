<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoRequest extends FormRequest
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
            'titulo' => 'required|string|max:50',
            'descripcion' => 'max:500',
            'precio' => 'required|numeric|max:999999999',
            'categoria' => 'required|string|max:255',
            'tipo_envio' => 'required|string|max:255',
            'negociacion_precio' => 'required|boolean',
            'intercambio_producto' => 'required|boolean',
            'destacado' => 'required|boolean',
            'foto' => 'image'
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
            'titulo.required' => 'Es necesario completar el campo "título".',
            'titulo.max' => 'Has sobrepasado los 50 caracteres disponibles para el "título".',
            'titulo.string' => 'El título debe ser una cadena de caracteres.',
            'descripcion.max' => 'Has sobrepasado los 500 caracteres disponibles para la "Descripción".',
            'precio.required' => 'Es necesario completar el campo "precio".',
            'precio.numeric' => 'El "precio" debe ser un número',
            'precio.max' => 'Has superado el límite de cantidad para el precio.',
            'categoria.required' => 'Es necesario completar el campo "categoría".',
            'categoria.max' => 'Has sobrepasado los 255 caracteres disponibles para la "categoría".',
            'categoria.string' => 'La categoría debe ser una cadena de caracteres.',
            'tipo_envio.required' => 'Es necesario completar el campo "tipo de envío".',
            'tipo_envio.max' => 'Has sobrepasado los 255 caracteres disponibles para el "tipo de envío".',
            'tipo_envio.string' => 'El tipo de envío debe ser una cadena de caracteres.',
            'negociacion_precio.required' => 'Es necesario completar el campo "negociación del precio".',
            'negociacion_precio.boolean' => 'La negociación debe ser de Sí o No.',
            'intercambio_producto.required' => 'Es necesario completar el campo "intercambio de productos".',
            'intercambio_producto.boolean' => 'El intercambio de producto debe ser de Sí o No.',
            'destacado.required' => 'Es necesario completar el campo "destacado".',
            'destacado.boolean' => 'El destacado debe ser de Sí o No.',
            'foto.image' => 'La foto debe ser una imagen.',
        ];
    }
}
