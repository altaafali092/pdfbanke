<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmerCategory\StoreFarmerCategoryRequest;
use App\Http\Requests\FarmerCategory\UpdateFarmerCategoryRequest;
use App\Http\Resources\FarmerCategoryResource;
use App\Models\FarmerCategory;
use Illuminate\Http\Request;

class FarmerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'farmerCategory'=> FarmerCategory::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmerCategoryRequest $request)
    {
        $farmerCatergory = FarmerCategory::create($request->all());
        return new FarmerCategoryResource($farmerCatergory);
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerCategory $farmerCategory)
    {
        return FarmerCategoryResource::make($farmerCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerCategoryRequest $request, FarmerCategory $farmerCategory)
    {
        $farmerCategory->update($request->all());
        return new FarmerCategoryResource($farmerCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerCategory $farmerCategory)
    {
        $farmerCategory->delete();
        return response()->json([
            'message'=> 'deleted Sucessfully',
        ]);
    }
}
