<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function getAllProducts()
    {
        $allProducts = ProductsModel::all();
        return view("products", compact("allProducts"));
    }

    public function AddProducts(SaveProductRequest $request)
    {
        $this->productRepo->createNew($request);
        return redirect()->route("allProducts");
    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function delete($product)
    {
        $singleProduct = $this->productRepo->getProductByID($product);

        if ($singleProduct === null)
        {
            die("Product not found");
        }

        $singleProduct->delete();

        return redirect()->back();
    }

    public function singleProduct(Request $request, ProductsModel $product)
    {

        return view("products/editProduct", compact("product"));

    }

    public function update(Request $request, ProductsModel $product)
    {
        $this->productRepo->updateProduct($request, $product);

        return redirect()->route("allProducts");
    }
}
