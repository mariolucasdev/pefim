<?php

namespace App\Http\Controllers;

use App\Http\Actions\Category\{
    DestroyCategoryAction,
    ListCategoryAction,
    ShowCategoryAction,
    StoreCategoryAction,
    UpdateCategoryAction
};
use App\Http\Requests\Category\{
    StoreCategoryRequest,
    UpdateCategoryRequest
};
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(): JsonResponse
    {
        return ListCategoryAction::execute();
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return StoreCategoryAction::execute($request);
    }

    /**
     * Display the specified category.
     */
    public function show(string $id): JsonResponse
    {
        return ShowCategoryAction::execute($id);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        return UpdateCategoryAction::execute($request, $id);
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return DestroyCategoryAction::execute($id);
    }
}
