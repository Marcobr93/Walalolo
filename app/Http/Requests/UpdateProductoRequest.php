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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $path = $this->path();

        if (strpos($path, 'informacion-general')){
            $rules = [
                'titulo' => 'nullable|string|max:255',
                'precio'=> 'nullable|numeric|max:999999999',
                'descripcion' => 'nullable|max:255'
            ];
        }elseif (strpos($path, 'otros-datos')){
            $rules = [
                'categoria' => 'nullable|string|max:255',
                'destacado' => 'nullable|string|max:5',
                'tipo_envio' => 'nullable|string|max:20',
                'negociacion_precio' => 'nullable|string|max:5',
                'intercambio_producto' => 'nullable|string|max:5',
            ];
        }elseif (strpos($path, 'foto')){
            $rules = [
                'foto' => 'required|image',
            ];
        }

        return $rules;
    }
}
