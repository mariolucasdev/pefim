<?php

namespace App\Http\Actions\Category;

use Illuminate\Http\{JsonResponse, Response};

class ShowCategoryAction
{
    /**
     * Display the specified category.
     */
    public static function execute(string $id): JsonResponse
    {
        $category = request()->user()
            ->categories()
            ->findOrFail($id);

        return response()->json(
            $category,
            Response::HTTP_OK
        );
    }
}
