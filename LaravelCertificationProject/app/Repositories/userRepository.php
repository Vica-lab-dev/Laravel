<?php

namespace App\Repositories;

use App\Models\UsersComment;
use Illuminate\Support\Facades\Auth;

class userRepository
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UsersComment();
    }

    public function createNew($request)
    {
        $this->userModel->create([
            'user_id' => Auth::user()->id,
            'comment' => $request->get('comment'),
        ]);
    }
}
