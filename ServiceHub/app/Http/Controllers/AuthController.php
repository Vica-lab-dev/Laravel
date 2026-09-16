<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken("auth_token");

        return response()->json([
            "user" => $user,
            "token" => $token->plainTextToken,
        ], status: 201);
    }
}
