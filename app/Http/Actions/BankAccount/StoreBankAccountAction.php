<?php

namespace App\Http\Actions\BankAccount;

use App\Models\User;

final class StoreBankAccountAction
{
    public static function execute($request)
    {
        /** @var User $user */
        $user = $request->user();

        $bankAccount = $user
            ->bankAccounts()
            ->create($request->validated());

        return response()->json($bankAccount, 201);
    }
}
