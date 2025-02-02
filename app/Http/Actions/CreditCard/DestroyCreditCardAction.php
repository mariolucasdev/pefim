<?php

namespace App\Http\Actions\CreditCard;

use App\Models\User;
use Illuminate\Http\{JsonResponse, Response};

class DestroyCreditCardAction
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

        $creditCard->delete();

        return response()->json([
            'message' => 'Credit card deleted',
        ]);
    }
}
