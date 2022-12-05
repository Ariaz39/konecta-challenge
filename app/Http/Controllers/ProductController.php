<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    private $repositoryCategory;
    private $repositoryProduct;

    public function __construct()
    {
        $this->repositoryCategory = new CategoryRepository();
        $this->repositoryProduct = new ProductRepository();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = $this->repositoryProduct->listAll();
        $higherStock = $this->repositoryProduct->getProductWithHigherStock();
        $higherSales = $this->repositoryProduct->getProductWithHigherSales();

        return view('product.index', compact('products', 'higherStock', 'higherSales'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = $this->repositoryCategory->listAll();
        return view('product.create', compact('categories'));
    }

    /**
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $this->repositoryProduct->storeProduct($request);

        return redirect()->route('product.index');
    }

    /**
     * @param $id
     * @return object
     */
    public function show($id)
    {
        return $this->repositoryProduct->showProduct($id);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = $this->repositoryProduct->showProduct($id);
        $categories = $this->repositoryCategory->listAll();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * @param UpdateProductRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->repositoryProduct->updateProduct($id, $request);

        return redirect()->route('product.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->repositoryProduct->deleteProduct($id);

        return redirect()->route('product.index');
    }
}
