<?php

namespace App\Http\Controllers;

use App\Enums\Users\UserRole;
use App\Enums\Users\UserStatus;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role = UserRole::CUSTOMER;
        $user->status = UserStatus::ACTIVE;
        $user->save();

        $token = $user->createToken("auth_token");

        return response()->json([
            "user" => $user,
            "token" => $token->plainTextToken,
        ], status: 201);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where("email", $data["email"])->first();
        if(!$user || !Hash::check($data["password"], $user->password)) {
            return response()->json([
                "message" => "The provided credentials are incorrect."
            ], status: 401);
        }

        $token = $user->createToken("auth_token");
        return response()->json([
            "user" => $user,
            "token" => $token->plainTextToken,
        ]);
    }
}
