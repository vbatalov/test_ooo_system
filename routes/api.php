<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\UpdateUserController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Middleware\AcceptJsonResponse;
use Illuminate\Support\Facades\Route;

Route::post("login", [AuthController::class, "login"]);
Route::post("logout", [AuthController::class, "logout"]);
Route::post("register", [AuthController::class, "register"]);

Route::middleware(["auth:sanctum", AcceptJsonResponse::class])->group(function () {
    Route::post("user", UpdateUserController::class);
    Route::get("user", UserController::class);
});

