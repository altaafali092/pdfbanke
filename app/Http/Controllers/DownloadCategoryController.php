<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadCategory\StoreDownloadCategoryRequest;
use App\Http\Requests\DownloadCategory\UpdateDownloadCategoryRequest;
use App\Models\DownloadCategory;
use Illuminate\Http\Request;

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloadCategories = DownloadCategory::latest()->paginate(10);
        return view('admin.downloadCategory.index', compact('downloadCategories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDownloadCategoryRequest $request)
    {   
        $downloadCategory = DownloadCategory::create($request->validated());
        toast('Download Category added succssfully', 'success');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DownloadCategory $downloadCategory)
    {
        return view('admin.downloadCategory.edit', compact('downloadCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDownloadCategoryRequest $request, DownloadCategory $downloadCategory)
    {
        $downloadCategory->update($request->validated());
        toast('DownloadCategory update successfully', 'success');
        return redirect(route('admin.downloadCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DownloadCategory $downloadCategory)
    {

        $downloadCategory->delete();
        toast('DownloadCategory deleted successfully', 'success');
        return back();
    }

}