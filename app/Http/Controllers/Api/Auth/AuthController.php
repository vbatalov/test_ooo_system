<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            "email" => $request->validated("email"),
            "password" => Hash::make($request->validated("password"))
        ]);

        Auth::login($user);

        return response()->json(UserResource::make($user));
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(["message" => __("auth.failed")], 403);
        }

        Auth::authenticate();

        return response("", 204);
    }
}
