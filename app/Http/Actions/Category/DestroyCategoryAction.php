<?php

namespace App\Http\Actions\Category;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DestroyCategoryAction
{
    /**
     * Destroy the specified category from storage.
     */
    public static function execute(string $id): JsonResponse
    {
        $category = request()->user()
            ->categories()
            ->find($id);

        if (! $category) {
            return response()->json([
                'message' => 'Category not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ], Response::HTTP_OK);
    }
}
