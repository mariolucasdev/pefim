<?php

namespace App\Http\Actions\Category;

use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateCategoryAction
{
    public static function execute(UpdateCategoryRequest $request, string $id): JsonResponse
    {
        $category = $request->user()
            ->categories()
            ->find($id);

        if (! $category) {
            return response()->json([
                'message' => 'Category not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $category->update($request->validated());

        return response()->json($category);
    }
}
