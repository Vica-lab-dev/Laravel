<?php

namespace App\Http\Controllers;

use App\Models\pagesModel;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function page()
    {
        $allPages = pagesModel::all();
        return view('users.page', compact('allPages'));
    }

    public function singlePage(pagesModel $page)
    {
        return view('users.single', compact('page'));
    }
}
