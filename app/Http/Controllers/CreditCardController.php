<?php

namespace App\Http\Controllers;

use App\Http\Actions\CreditCard\{
    DestroyCreditCardAction,
    ListCreditCardAction,
    ShowCreditCardAction,
    StoreCreditCardAction,
    UpdateCreditCardAction
};
use App\Http\Requests\CreditCard\{
    StoreCreditCardRequest,
    UpdateCreditCardRequest
};
use Illuminate\Http\{JsonResponse};

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return ListCreditCardAction::execute();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditCardRequest $request): JsonResponse
    {
        return StoreCreditCardAction::execute($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return ShowCreditCardAction::execute($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCreditCardRequest $request,
        string $id
    ): JsonResponse {
        return UpdateCreditCardAction::execute($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return DestroyCreditCardAction::execute($id);
    }
}
