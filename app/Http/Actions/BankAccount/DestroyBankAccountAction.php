<?php

namespace App\Http\Actions\BankAccount;

use Illuminate\Http\{JsonResponse, Response};

class DestroyBankAccountAction
{
    /**
     * Destroy the specified bank account from storage.
     */
    public static function execute(string $id): JsonResponse
    {
        $bankAccount = request()->user()
            ->bankAccounts()
            ->find($id);

        if (!$bankAccount) {
            return response()->json([
                'message' => 'Bank account not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $bankAccount->delete();

        return response()->json([
            'message' => 'Bank account deleted successfully',
        ], Response::HTTP_OK);
    }
}
