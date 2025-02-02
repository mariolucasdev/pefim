<?php

namespace App\Http\Actions\User;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;

final class CreateUserAction
{
    /**
     * Handle the incoming request.
     */
    public static function execute(StoreUserRequest $request): JsonResponse
    {
        $id = Uuid::uuid4()->toString();

        $request->merge(['id' => $id]);

        $user  = User::create($request->all());
        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], 201);
    }
}
