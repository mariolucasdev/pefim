<?php

namespace App\Http\Actions\CreditCard;

use App\Models\User;
use Illuminate\Http\Response;

class UpdateCreditCardAction
{
    public static function execute($request, $id)
    {
        /** @var User $user */
        $user = $request->user();

        $creditCard = $user
            ->creditCards()
            ->find($id);

        if (!$creditCard) {
            return response()->json([
                'message' => 'Credit card not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $creditCard->update(
            $request->validated()
        );

        return response()->json($creditCard);
    }
}
