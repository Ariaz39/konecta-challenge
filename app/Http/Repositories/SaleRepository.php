<?php

namespace App\Http\Repositories;

use App\Models\Sales;

class SaleRepository
{

    public function listWithStock()
    {
        return Sales::with('product')
            ->orderBy('sale_id', 'desc')
            ->limit('10')
            ->get() ?: [];
    }

    public function insertSale($product_id, $amount)
    {
        $sale = new Sales();
        $sale['product_id'] = $product_id;
        $sale['amount'] = $amount;
        $sale->save();
    }

}
