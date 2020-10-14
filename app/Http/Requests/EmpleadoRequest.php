<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'carnet_identidad'=>"required",
            'nombre'=>"required|string|min:3|regex:/^[\pL\s\-]+$/u",
            'apellido_paterno'=>"required|string|min:3|regex:/^[\pL\s\-]+$/u",
            'apellido_materno'=>"required|string|min:3|regex:/^[\pL\s\-]+$/u",
            'telefono'=>"nullable|numeric",
            'cargo_id'=>"required|integer",
            'estado_id'=>"required|integer",
        ];
    }
}
