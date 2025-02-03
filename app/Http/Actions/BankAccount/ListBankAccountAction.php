<?php

namespace App\Http\Actions\BankAccount;

use Illuminate\Http\JsonResponse;

final class ListBankAccountAction
{
    public static function execute(): JsonResponse
    {
        return response()->json(
            request()->user()->bankAccounts
        );
    }
}
