<?php

namespace App\Repositories;

use App\Models\pagesModel;

class AdminRepository
{
    private $pageModel;

    public function __construct()
    {
        $this->pageModel = new pagesModel();
    }

    public function createNew($request)
    {
        $this->pageModel->create([
           'name' => $request->get('page'),
           'description' => $request->get('description'),
           'url' => $request->get('url'),
        ]);
    }
}
