<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\newsCategory\StoreNewsCategoryRequest;
use App\Http\Requests\newsCategory\UpdateNewsCategoryRequest;
use App\Http\Resources\NewsCategoryResource;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'newsCategory' => NewsCategory::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsCategoryRequest $request)
    {
        $newsCategory = NewsCategory::create($request->all());
        return new NewsCategoryResource($newsCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsCategory $newsCategory)
    {
        return NewsCategoryResource::make($newsCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsCategoryRequest $request, NewsCategory $newsCategory)
    {
        $newsCategory->update($request->all());
        return new NewsCategoryResource($newsCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsCategory $newsCategory)
    {
        // return $newsCategory;
        $newsCategory->delete();
        return response()->json([
            'message' => 'newsCategory deleted',
            'status' => 'success'
        ]);
    }
}