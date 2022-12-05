<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|alpha|min:4|unique:kone_categories,name',
            'description' => 'nullable|string'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'description' => 'Descripcion'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'name.alpha' => 'El :attribute debe ser una cadena de texto.',
            'name.min' => 'El :attribute debe contener minimo 4 caracteres.',
            'name.unique' => 'El :attribute ya existe en el sistema.',
            'description.string' => 'El :attribute debe ser una cadena de texto.',
        ];
    }
}
