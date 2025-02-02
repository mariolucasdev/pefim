<?php

namespace App\Http\Controllers;

use App\Http\Actions\User\{
    CreateUserAction,
    LoginUserAction
};
use App\Http\Requests\User\{
    LoginUserRequest,
    StoreUserRequest
};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        return (new CreateUserAction())($request);
    }

    /**
     * Authenticate a user.
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        return (new LoginUserAction())($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
