<?php

namespace App\Http\Controllers;

use App\Http\Actions\Category\{
    ListCategoryAction,
    ShowCategoryAction,
    StoreCategoryAction
};
use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Http\{Request, JsonResponse};

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
