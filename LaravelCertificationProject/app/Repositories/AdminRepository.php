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

    public function update($request, $page)
    {
        $page->name = $request->get('newName');
        $page->description = $request->get('newDescription');
        $page->url = $request->get('newURL');

        $page->save();
    }
}
