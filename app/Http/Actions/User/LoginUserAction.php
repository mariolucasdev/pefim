<?php

namespace App\Http\Actions\User;

use App\Http\Requests\User\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    public function __invoke(LoginUserRequest $request): JsonResponse
    {
        $authenticated = Auth::attempt(
            $request->only('email', 'password'),
            true
        );

        if (! $authenticated) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = Auth::user();
        $user = User::find($user->id);

        $user->tokens()->delete();
        $user->token = $user->createToken($user->id)->plainTextToken;

        return response()->json($user, 200);
    }
}
