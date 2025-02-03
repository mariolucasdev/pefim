<?php

namespace App\Http\Actions\BankAccount;

use Illuminate\Http\{JsonResponse, Response};

class ShowBankAccountAction
{
    public static function execute(string $id): JsonResponse
    {
        $bankAccount = request()->user()
            ->bankAccounts()
            ->find($id);

        if (!$bankAccount) {
            return response()->json([
                'message' => 'Bank account not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json($bankAccount);
    }
}
