<?php

namespace App\Http\Controllers;

use App\Models\FriendModel;
use App\Models\FriendsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FriendsController extends Controller
{

    public function getAllUsers()
    {
        $allUsers = User::all();
        return view('allUsers', compact('allUsers'));
    }

    public function singleUser(User $user)
    {
        return view('singleUser', compact('user'));
    }

    public function research(Request $request, User $user)
    {
        $name = $request->get('name');
        $foundUser = User::where('name', 'like', "%{$name}%")
            ->first();
        return view('SearchedUser', compact('foundUser'));

    }

    public function addFriend(User $user)
    {
        return view('addFriend', compact('user'));

    }

    public function addedFriend(Request $request, User $user)
    {
        $request->validate([
            'authName' => 'required',
            'authEmail' => 'required',
            'authID' => 'required',
            'friends_id' => 'required'
        ]);

        FriendModel::create([
            'name' => $request->get('authName'),
            'email' => $request->get('authEmail'),
            'id' => $request->get('authID'),
            'friends_id' => $request->get('friends_id'),
        ]);

        echo ("Friend Added Successfully");
    }
}
