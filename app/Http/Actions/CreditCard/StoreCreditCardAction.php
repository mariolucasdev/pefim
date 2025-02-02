<?php

namespace App\Http\Actions\CreditCard;

use App\Http\Requests\CreditCard\StoreCreditCardRequest;
use App\Models\User;
use Illuminate\Http\{JsonResponse, Response};

class StoreCreditCardAction
{
    public static function execute(StoreCreditCardRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        $creditCard = $user
            ->creditCards()
            ->create($request->validated());

        return response()->json(
            $creditCard,
            Response::HTTP_CREATED
        );
    }
}
