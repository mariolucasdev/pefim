<?php

namespace App\Http\Actions\Category;

use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class UpdateCategoryAction
{
    public static function execute(UpdateCategoryRequest $request, string $id): JsonResponse
    {
        $category = Category::findOrFail($id);

        $category->update($request->validated());

        return response()->json($category);
    }
}
