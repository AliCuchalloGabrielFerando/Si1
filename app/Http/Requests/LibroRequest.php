<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'titulo'        => 'required|string|min:3',
            'precio'        => 'required|numeric',
            'edicion'       => 'required|integer',
            'edicion_año'       => 'required|integer',
            'isbn_10'       => 'integer|nullable',
            'isbn_13'       => 'integer|nullable',
            'categoria_nombre'  => 'required',
            'stock'         => 'required|numeric',
            'editorial_nombre'  => 'required'
        ];
    }
}
