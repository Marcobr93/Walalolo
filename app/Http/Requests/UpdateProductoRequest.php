<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
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

    /** Reglas de validación para la edición de los datos de un producto.
     * @return array
     */
    public function rules()
    {
        $path = $this->path();

        if (strpos($path, 'informacion-general')){
            $rules = [
                'titulo' => 'nullable|string|max:50',
                'precio'=> 'nullable|numeric|max:999999999',
                'descripcion' => 'nullable|max:500'
            ];
        }elseif (strpos($path, 'otros-datos')){
            $rules = [
                'categoria' => 'nullable|string|max:255',
                'destacado' => 'nullable|boolean|max:255',
                'tipo_envio' => 'nullable|string',
                'negociacion_precio' => 'nullable|boolean',
                'intercambio_producto' => 'nullable|boolean',
            ];
        }elseif (strpos($path, 'foto')){
            $rules = [
                'foto' => 'required|image',
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

        if (strpos($path, 'informacion-general')){
            $messages = [
                'titulo.string' => 'El título debe ser una cadena de caracteres.',
                'titulo.max' => 'Has sobrepasado los 50 caracteres disponibles para el "título".',
                'precio.numeric' => 'El "precio" debe ser un número',
                'precio.max' => 'Has superado el límite de cantidad para el precio.',
                'descripcion.max' => 'Has sobrepasado los 500 caracteres disponibles para la "Descripción".',

            ];
        }elseif (strpos($path, 'otros-datos')){
            $messages = [
                'categoria.max' => 'Has sobrepasado los 255 caracteres disponibles para la "categoría".',
                'categoria.string' => 'La categoría debe ser una cadena de caracteres.',
                'destacado.boolean' => 'El destacado debe ser de Sí o No.',
                'tipo_envio.string' => 'El tipo de envío debe ser una cadena de caracteres.',
                'tipo_envio.max' => 'Has sobrepasado los 255 caracteres disponibles para el "tipo de envío".',
                'negociacion_precio.boolean' => 'La negociación debe ser de Sí o No.',
                'intercambio_producto.boolean' => 'El intercambio de producto debe ser de Sí o No.',
            ];
        }elseif (strpos($path, 'foto')){
            $messages = [
                'foto.required' => 'Es necesario una foto.',
                'foto.image' => 'La foto debe ser una imagen.',
            ];
        }

        return $messages;
    }
}
