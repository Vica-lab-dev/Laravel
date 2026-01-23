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
        $information = informationModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'country' => $request->country,
        ]);

        return redirect()->route('information.show', $information->id);

    }

    public function categoryCreate(CategoryRequest $request)
    {
        $catInfo = categoryModel::create([
            'information_id' => $request->information_id,
            'category' => $request->category,
            'percent' => $request->percent,
        ]);

        return redirect()->route('related.show', $catInfo->id);

    }

    public function show(informationModel $information)
    {
        return view('information', compact('information'));
    }

    public function allInformation()
    {
        $information = informationModel::all();
        return view('categoriesForm', compact('information'));
    }

    public function showRelated()
    {
        $information = informationModel::all();

        return view('related', compact('information'));
    }
}
