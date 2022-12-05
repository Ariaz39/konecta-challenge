<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    protected $repositoryCategory;

    public function __construct()
    {
        $this->repositoryCategory = new CategoryRepository();
        $this->repositoryProduct = new ProductRepository();
    }

    /**
     * Funcion que lista las categorias
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->repositoryCategory->listAll();
        return view('category.index', compact('categories'));
    }

    /**
     * Funcion que retorna la vista de creacion
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Funcion que inserta una categoria
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->repositoryCategory->storeCategory($request);

        return redirect()->route('category.index');
    }

    /**
     * Funcion que obtiene la info de una categoria
     * @param $id
     * @return object
     */
    public function show($id)
    {
        return $this->repositoryCategory->showCategory($id);
    }

    /**
     * Funcion que retorna la vista de edicion
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $category = $this->show($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Funcion que actualiza una categoria
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->repositoryCategory->updateCategory($id, $request);

        return redirect()->route('category.index');
    }

    /**
     * Funcion que inhabilita una categoria
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->repositoryCategory->deleteCategory($id);
        $this->repositoryProduct->hideProducts($id);

        return redirect()->route('category.index');
    }
}
