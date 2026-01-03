<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPageRequest;
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
        return view('adminPage');
    }

    public function create(AdminPageRequest $request)
    {
        $this->pagesRepo->createNew($request);
        return redirect()->back();
    }
}
