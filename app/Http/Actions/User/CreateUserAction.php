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
     *
     * @param UserStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreUserRequest $request): JsonResponse
    {
        $id = Uuid::uuid4()->toString();

        $request->merge(['id' => $id]);

        $user = User::create($request->all());
        $token = $user->createToken($user->id);

        $user->token = $token->plainTextToken;

        return response()->json($user, 201);
    }
}
