<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\SaleRepository;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $repositoryProduct;
    private $repositorySale;

    public function __construct()
    {
        $this->repositoryProduct = new ProductRepository();
        $this->repositorySale = new SaleRepository();
    }

    public function index()
    {
        $products = $this->repositoryProduct->listWithStock();
        $sales = $this->repositorySale->listWithStock();
        return view('sale.index', compact('products', 'sales'));
    }

    public function sell(Request $request)
    {
        $product_id = $request->product_id;
        $amount = $request->amount;

        $verify = $this->verifyStock(
            $product_id, $amount
        );

        $product = $this->repositoryProduct->showProduct($product_id);

        if (!$verify) {
            $msg = "Solo se encuentran $product->stock unidades disponibles para venta";
            return redirect()->route('sale.index')
                ->with('error_message', $msg);
        } else {

            $product['stock'] = $product['stock'] - $amount;
            $product->update();
        }

        $this->insertSale($product_id, $amount);

        return redirect()->route('sale.index')
            ->with('success_message', "Producto descontado con exito.");
    }

    private function verifyStock($product_id, $amount)
    {
        $product = $this->repositoryProduct->showProduct($product_id);

        return $product->stock >= $amount ? true : false;
    }

    public function insertSale($product_id, $amount): void
    {
        $this->repositorySale->insertSale($product_id, $amount);
    }
}
