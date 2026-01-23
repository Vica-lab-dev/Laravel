<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\informationRequest;
use App\Models\categoryModel;
use App\Models\informationModel;
use Illuminate\Http\Request;

class IntelligencesController extends Controller
{
    public function createInfo(informationRequest $request)
    {
        informationModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'country' => $request->country,
        ]);

        return view('categoriesForm');
    }

    public function categoryCreate(CategoryRequest $request)
    {
        categoryModel::create([
            'category' => $request->category,
            'percent' => $request->percent,
        ]);
    }
}
