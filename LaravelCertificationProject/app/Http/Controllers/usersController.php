<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCommentRequest;
use App\Models\pagesModel;
use App\Models\UsersComment;
use App\Repositories\userRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new userRepository();
    }
    public function page()
    {
        $allPages = pagesModel::all();
        return view('users.page', compact('allPages'));
    }

    public function singlePage(pagesModel $page)
    {

        return view('users.single', compact('page'));
    }

    public function create(UserCommentRequest $request)
    {
        $this->userRepo->createNew($request);

        return redirect()->back();
    }

    public function delete(UsersComment $comment)
    {
        if(Auth::id() !== $comment->user_id)
        {
            die("You don't have permission to delete this comment");
        }

        $comment->delete();
        return redirect()->back();

    }


}
