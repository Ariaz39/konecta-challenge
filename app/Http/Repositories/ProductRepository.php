<?php

namespace App\Http\Repositories;

use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;

class ProductRepository
{
    /**
     * Funcion para retornar el listado de las productos
     * @return array
     */
    public function listAll(): array
    {
        return Product::where('status', 1)
            ->orderBy('product_id', 'desc')
            ->with('category')
            ->get()
            ->toArray() ?: [];
    }

    /**
     * Funcion para insertar nuevo producto
     * @param Request $request
     * @return void
     */
    public function storeProduct(Request $request): void
    {
        $product = new Product();
        $product['name'] = $request->name;
        $product['reference'] = $request->reference;
        $product['price'] = $request->price;
        $product['weight'] = $request->weight;
        $product['category_id'] = $request->category_id;
        $product['stock'] = $request->stock;

        $product->save();
    }

    /**
     * Funcion para obtener detalle del producto
     * @param $id
     * @return object
     */
    public function showProduct($id): object
    {
        return Product::where('product_id', $id)
            ->first();
    }

    /**
     * Funcion para actualizar un producto
     * @param $id
     * @param Request $request
     * @return void
     */
    public function updateProduct($id, Request $request): void
    {
        $this->showProduct($id)->update([
            'name' => $request['name'],
            'reference' => $request['reference'],
            'price' => $request['price'],
            'weight' => $request['weight'],
            'category_id' => $request['category_id'],
            'stock' => $request['stock'],
        ]);
    }

    /**
     * Funcion para eliminar un producto
     * @param $id
     * @return void
     */
    public function deleteProduct($id): void
    {
        $this->showProduct($id)->update([
            'status' => 2
        ]);
    }

    /**
     * Funcion que inhabilita los productos de las categorias eliminadas
     * @param $id
     * @return void
     */
    public function hideProducts($id): void
    {
        Product::where('category_id', $id)->update([
            'status' => 2
        ]);
    }

    public function listWithStock()
    {
        return Product::where('status', 1)
            ->where('stock', '>', 0)
            ->get()
            ->toArray() ?: [];
    }

    public function getProductWithHigherStock()
    {
        return Product::orderBy('stock', 'desc')->first() ?: 0;
    }

    public function getProductWithHigherSales()
    {
        return Sales::selectRaw('product_id, sum(amount) as number_of_orders')
            ->groupBy('product_id')
            ->orderBy('number_of_orders', 'desc')
            ->with('product')
            ->first() ?: [];
    }
}
