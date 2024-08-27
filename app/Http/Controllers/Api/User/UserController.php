<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = UserResource::make(User::find(auth()->user()->id));
        return response()->json($data);
    }
}
