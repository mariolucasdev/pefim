<?php

namespace App\Http\Actions\CreditCard;

use App\Models\User;
use Illuminate\Http\{JsonResponse, Response};

class ShowCreditCardAction
{
    public static function execute(string $id): JsonResponse
    {
        /** @var User $user */
        $user = request()->user();

        $creditCard = $user->creditCards()->find($id);

        if (!$creditCard) {
            return response()->json([
                'message' => 'Credit card not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json($creditCard);
    }
}
