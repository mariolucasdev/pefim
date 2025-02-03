<?php

namespace App\Http\Actions\BankAccount;

use App\Models\User;
use Illuminate\Http\Response;

class UpdateBankAccountAction
{
    public static function execute($request, $id)
    {
        /** @var User $user */
        $user = request()->user();

        $bankAccount = $user->bankAccounts()->find($id);

        if (!$bankAccount) {
            return response()->json([
                'message' => 'Bank account not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        $bankAccount->update($request->validated());

        return response()->json($bankAccount);
    }
}
