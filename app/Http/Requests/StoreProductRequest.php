<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|alpha|min:4|unique:kone_products,name',
            'reference' => 'required',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'category_id' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre del producto',
            'reference' => 'Referencia',
            'price' => 'Precio',
            'weight' => 'Peso',
            'category_id' => 'ID de la categoria',
            'stock' => 'Stock en bodega',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'name.alpha' => 'El :attribute debe ser una cadena de texto.',
            'name.min' => 'El :attribute debe contener minimo 4 caracteres.',
            'name.unique' => 'El :attribute ya existe en el sistema.',
            'reference.required' => 'La :attribute es obligatoria.',
            'price.required' => 'El :attribute es obligatorio.',
            'price.integer' => 'El :attribute debe ser un numero entero.',
            'weight.required' => 'El :attribute es obligatorio.',
            'weight.integer' => 'El :attribute debe ser un numero entero.',
            'category.required' => 'El :attribute es obligatorio.',
            'category.integer' => 'El :attribute debe ser un numero entero.',
            'stock.required' => 'El :attribute es obligatorio.',
            'stock.integer' => 'El :attribute debe ser un numero entero.',
        ];
    }
}
