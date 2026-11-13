<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        Gate::authorize(ability: 'viewAny', arguments: Category::class);

        $categories = Category::all();

        return response()->json($categories);
    }

    public function show(Category $category)
    {
        Gate::authorize(ability: 'view', arguments: $category);

        return response()->json($category);
    }

    public function store(StoreCategoryRequest $request)
    {
        Gate::authorize(ability: 'create', arguments: Category::class);

        $data = $request->validated();

        $category = Category::create($data);

        return response()->json([
            "message" => "Category created",
            "category" => $category,
        ], status: 201);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Gate::authorize(ability: 'update', arguments: $category);

        $data = $request->validated();

        $category->update($data);

        return response()->json([
            "message" => "Category updated",
            "category" => $category,
        ]);
    }

    public function destroy(Category $category)
    {
        Gate::authorize(ability: 'delete', arguments: $category);

        $category->delete();

        return response()->json([
            "message" => "Category deleted",
        ]);
    }

    public function restore(String $id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        Gate::authorize(ability: 'restore', arguments: $category);

        $category->restore();

        return response()->json([
            "message" => "Category restored",
            "category" => $category,
        ]);
    }
}
