<?php

namespace App\Http\Actions\Category;

use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Http\{JsonResponse, Response};

class StoreCategoryAction
{
    /**
     * Store a newly created category in storage.
     */
    public static function execute(StoreCategoryRequest $request): JsonResponse
    {
        $category = $request->user()
            ->categories()
            ->create($request->validated());

        return response()->json(
            $category,
            Response::HTTP_CREATED
        );
    }
}
