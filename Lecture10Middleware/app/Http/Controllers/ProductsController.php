<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
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
        return redirect()->route("product.all");
    }

    public function index()
    {
        $allProducts = ProductsModel::all();
        return view("allProducts", compact("allProducts"));
    }

    public function delete(ProductsModel $product)
    {

        $product->delete();

        return redirect()->back();
    }

    public function singleProduct(ProductsModel $product)
    {

        return view("products/editProduct", compact("product"));

    }

    public function update(EditProductRequest $request, ProductsModel $product)
    {
        $this->productRepo->updateProduct($request, $product);

        return redirect()->route("product.all");
    }
}
