<?php

namespace App\Http\Controllers;

use App\Http\Requests\newsCategory\StoreNewsCategoryRequest;
use App\Http\Requests\newsCategory\UpdateNewsCategoryRequest;
use App\Models\newsCategory;
use Illuminate\Http\Request;

class newsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsCategories = newsCategory::latest()->paginate(10);
        return view('admin.newsCategory.index',compact('newsCategories'));
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsCategoryRequest $request)
    {
        // dd($request->all());
        $newsCategory = newsCategory::create($request->validated());
        toast('newsCategory added successfully','success');
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
    public function edit(newsCategory $newsCategory)
    {
        // $newsCategory=newsCategory::latest()->get();
        return view('admin.newsCategory.edit',compact('newsCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsCategoryRequest $request, newsCategory $newsCategory)
    {
       
        $newsCategory->update($request->validated());
        toast('newsCategory Updated successfully','success');
        return redirect(route('admin.newsCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(newsCategory $newsCategory)
    {
        $newsCategory->delete();
        toast('News Category deleted successfully', 'success');
        return back();
    }
}
