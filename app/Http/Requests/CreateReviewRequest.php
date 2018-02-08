<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
            'comentario' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'comentario.required' => 'Es necesario completar el campo "comentario".',
            'comentario.numeric' => 'La "comentario" debe ser un número',
            'comentario.max' => 'Has sobrepasado los 255 caracteres disponibles para el "comentario".',
            'comentario.string' => 'El comentario debe ser una cadena de caracteres.'
        ];
    }
}
