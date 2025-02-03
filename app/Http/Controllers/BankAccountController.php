<?php

namespace App\Http\Controllers;

use App\Http\Actions\BankAccount\{DestroyBankAccountAction, ListBankAccountAction, ShowBankAccountAction, StoreBankAccountAction, UpdateBankAccountAction};
use App\Http\Requests\BankAccount\{StoreBankAccountRequest, UpdateBankAccountRequest};
use Illuminate\Http\{JsonResponse};

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return ListBankAccountAction::execute();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankAccountRequest $request): JsonResponse
    {
        return StoreBankAccountAction::execute($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return ShowBankAccountAction::execute($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateBankAccountRequest $request,
        string $id
    ): JsonResponse {
        return UpdateBankAccountAction::execute($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return DestroyBankAccountAction::execute($id);
    }
}
