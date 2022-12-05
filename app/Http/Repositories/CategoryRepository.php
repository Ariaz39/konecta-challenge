<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryRepository
{
    /**
     * Funcion para retornar el listado de las categorias
     * @return array
     */
    public function listAll(): array
    {
        return Category::where('status', 1)->get()->toArray() ?: [];
    }

    /**
     * Funcion para insertar nueva categoria
     * @param Request $request
     * @return void
     */
    public function storeCategory(Request $request): void
    {
        $category = new Category();
        $category['name'] = $request->name;
        $category['description'] = $request->description;

        $category->save();
    }

    /**
     * Funcion para obtener detalle de categoria
     * @param $id
     * @return object
     */
    public function showCategory($id): object
    {
        return Category::where('category_id', $id)->first();
    }

    /**
     * Funcion para actualizar categoria
     * @param $id
     * @param Request $request
     * @return void
     */
    public function updateCategory($id, Request $request)
    {
        $this->showCategory($id)->update([
            'name' => $request['name'],
            'description' => $request['description']
        ]);
    }

    /**
     * Funcion para eliminar categoria
     * @param $id
     * @return void
     */
    public function deleteCategory($id): void
    {
        $this->showCategory($id)->update([
            'status' => 2
        ]);
    }
}
