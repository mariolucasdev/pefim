<?php

namespace App\Http\Controllers;

use App\Http\Actions\User\CreateUserAction;
use App\Http\Actions\User\LoginUserAction;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        return CreateUserAction::execute($request);
    }

    /**
     * Authenticate a user.
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        return LoginUserAction::execute($request);
    }
}
