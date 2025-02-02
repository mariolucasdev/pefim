<?php

namespace App\Http\Actions\Category;

use Illuminate\Http\JsonResponse;

class ListCategoryAction
{
    /**
     * Display a listing of the categories.
     */
    public static function execute(): JsonResponse
    {
        return response()->json(request()->user()->categories);
    }
}
