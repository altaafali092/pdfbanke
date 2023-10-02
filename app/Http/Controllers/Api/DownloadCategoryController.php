<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DownloadCategory\StoreDownloadCategoryRequest;
use App\Http\Requests\DownloadCategory\UpdateDownloadCategoryRequest;
use App\Http\Resources\DownloadCategoryResource;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'downloadCategory'=> DownloadCategory::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDownloadCategoryRequest $request)
    {
        $downloadCategory= DownloadCategory::create($request->all());
        return new DownloadCategoryResource($downloadCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(DownloadCategory $downloadCategory)
    {
        return DownloadCategoryResource::make($downloadCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDownloadCategoryRequest $request, DownloadCategory $downloadCategory)
    {
        $downloadCategory->update($request->all());
        return new DownloadCategoryResource($downloadCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DownloadCategory $downloadCategory)
    {
        $downloadCategory->delete();
        return response()->json([
            'message'=> 'deleted Sucessfully',
            'status'=>'success'
        ]);
    
    }
}
