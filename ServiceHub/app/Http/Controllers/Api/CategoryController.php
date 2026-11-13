<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
