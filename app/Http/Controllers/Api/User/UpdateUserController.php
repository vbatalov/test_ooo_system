<?php

namespace App\Http\Controllers\Api\User;

use App\Actions\User\UpdatePhotoUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePhotoUserRequest;

class UpdateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdatePhotoUserRequest $request, UpdatePhotoUserAction $action)
    {
        return response()->json($action->handle());
    }
}
