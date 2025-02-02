<?php

namespace App\Http\Controllers;

use App\Http\Actions\User\{CreateUserAction, LoginUserAction};
use App\Http\Requests\User\{LoginUserRequest, StoreUserRequest};
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
