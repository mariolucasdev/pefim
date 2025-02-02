<?php

namespace App\Http\Actions\User;

use App\Http\Requests\User\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    public static function execute(LoginUserRequest $request): JsonResponse
    {
        $authenticated = Auth::attempt($request->only('email', 'password'));

        if (!$authenticated) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();
        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ], 200);
    }
}
