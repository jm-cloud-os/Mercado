<?php

namespace App\Http\Requests\Productos;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clave' => 'required',
            'nombre_es' => 'required',
            'nombre_en' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'alto' => 'required',
            'peso' => 'required',
            //'disponibilidad' => 'required',
            //'punto_reorden' => 'required',
            'costo' => 'required',
            'precio_individual' => 'required',
            'precio_paquete' => 'required',
        ];
    }
}
