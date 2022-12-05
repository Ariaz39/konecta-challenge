<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $repositoryProduct;

    public function __construct()
    {
        $this->repositoryProduct = new ProductRepository();
    }

    public function index()
    {
        $products = $this->repositoryProduct->listWithStock();
        return view('sale.index', compact('products'));
    }

    public function sell(Request $request)
    {
        $verify = $this->verifyStock(
            $request->product_id, $request->amount
        );

        if(!$verify) {
            dd('no hay stock disponible');
        } else {
            $product = Product::where('product_id', $request->product_id)->first();
            $product['stock'] = $product['stock'] - $request->amount;
            $product->update();
        }

        return redirect()->route('product.index');
    }

    private function verifyStock($id, $amount)
    {
        $product = Product::where('product_id', $id)->first();

        return $product->stock >= $amount ? true : false;
    }
}
