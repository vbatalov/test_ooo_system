<?php

use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(GuestMiddleware::class)->group(function () {
    Route::get('/login', function () {
        return view("layout");
    })->name("login");

    Route::get('/register', function () {
        return view("layout");
    })->name("register");
});


Route::get("/{patchMatch}", function () {
    return view("layout");
})->where('patchMatch', '.*')->middleware("auth:sanctum");
