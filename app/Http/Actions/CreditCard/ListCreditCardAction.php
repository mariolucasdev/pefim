<?php

namespace App\Http\Actions\CreditCard;

use App\Models\User;
use Illuminate\Http\{JsonResponse};

class ListCreditCardAction
{
    public static function execute(): JsonResponse
    {
        /** @var User $user */
        $user = request()->user();

        $creditCards = $user->creditCards()->get();

        return response()->json($creditCards);
    }
}
