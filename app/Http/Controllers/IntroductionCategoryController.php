<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntroductionCategory\StoreIntroductionCategoryRequest;
use App\Http\Requests\IntroductionCategory\UpdateIntroductionCategoryRequest;
use App\Models\IntroductionCategory;
use Illuminate\Http\Request;

class IntroductionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $IntroductionCategories = IntroductionCategory::latest()->paginate(10);
        return view('admin.IntroductionCategory.index',compact('IntroductionCategories'));
    }

  
    public function store(StoreIntroductionCategoryRequest $request)
    {
        $IntroductionCategory = IntroductionCategory::create($request->validated());
        toast('Introduction Category added succssfully', 'success');
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
    public function edit(IntroductionCategory $IntroductionCategory)
    {
        return view('admin.IntroductionCategory.edit',compact('IntroductionCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntroductionCategoryRequest $request, IntroductionCategory $IntroductionCategory)
    {
        $IntroductionCategory->update($request->validated());
        toast(' Introduction Category update successfully', 'success');
        return redirect(route('admin.IntroductionCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IntroductionCategory $IntroductionCategory)
    {
        $IntroductionCategory->delete();
        toast('Introduction Category deleted successfully', 'success');
        return back();
    }
}
