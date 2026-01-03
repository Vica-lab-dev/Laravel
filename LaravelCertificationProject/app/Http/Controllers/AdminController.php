<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPageRequest;
use App\Http\Requests\EditRequest;
use App\Models\pagesModel;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $pagesRepo;

    public function __construct()
    {
        $this->pagesRepo = new AdminRepository();
    }
    public function page()
    {
        $allPages = pagesModel::all();
        return view('adminPage', compact('allPages'));
    }

    public function create(AdminPageRequest $request)
    {
        $this->pagesRepo->createNew($request);
        return redirect()->back();
    }

    public function singlePage(pagesModel $page)
    {
        return view('singlePage', compact('page'));
    }

    public function update(EditRequest $request, pagesModel $page)
    {
        $this->pagesRepo->update($request, $page);

        return redirect()->route('admin.page');
    }

    public function delete(pagesModel $page)
    {
        $page->delete();

        return redirect()->route('admin.page');
    }

}
