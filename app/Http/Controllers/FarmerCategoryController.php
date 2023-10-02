<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmerCategory\StoreFarmerCategoryRequest;
use App\Http\Requests\FarmerCategory\UpdateFarmerCategoryRequest;
use App\Models\FarmerCategory;
use Illuminate\Http\Request;

class FarmerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmerCategories = FarmerCategory::latest()->paginate(10);
        return view('admin.farmerCategory.index', compact('farmerCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmerCategoryRequest $request)
    {
        $farmerCategory = FarmerCategory::create($request->validated());
        toast('Farmer Caategory added Successfully', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerCategory $farmerCategory)
    {
        return view('admin.farmerCategory.edit', compact('farmerCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerCategoryRequest $request, FarmerCategory $farmerCategory)
    {
        $farmerCategory->update($request->validated());
        toast(' Farmer Category update successfully', 'success');
        return redirect(route('admin.farmerCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerCategory $farmerCategory)
    {
        $farmerCategory->delete();
        toast('Farmer Category deleted successfully', 'success');
        return back();
    }
}