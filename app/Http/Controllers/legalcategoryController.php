<?php

namespace App\Http\Controllers;

use App\Http\Requests\legalCategory\StorelegalCategoryRequest;
use App\Http\Requests\legalCategory\UpdatelegalCategoryRequest;
use App\Models\legalCategory;
use Illuminate\Http\Request;

class legalcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalCategories = legalCategory::latest()->paginate(10);
        return view('admin.legalCategory.index',compact('legalCategories'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelegalCategoryRequest $request)
    {
        // dd($request->all());
        $legalCategory= legalCategory::create($request->validated());
        toast('legalCategory added successfully','success');
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
    public function edit(legalCategory $legalCategory)
    {
        return view('admin.legalCategory.edit',compact('legalCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelegalCategoryRequest $request,  legalCategory $legalCategory)
    {
        $legalCategory->update($request->validated());
        toast('legalCategory updated Successfully','success');
        return redirect(route('admin.legalCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(legalCategory $legalCategory)
    {
        $legalCategory->delete();
        toast('LegalCategory Deleted Successfully','success');
        return back();
    }
}
