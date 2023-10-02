<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntroductionList\StoreIntroductionListRequest;
use App\Http\Requests\IntroductionList\UpdateIntroductionListRequest;
use App\Models\IntroductionCategory;
use App\Models\IntroductionList;
use Illuminate\Http\Request;

class IntroductionListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $IntroductionLists = IntroductionList::latest()->paginate(10);
        $IntroductionCategories = IntroductionCategory::all();
        return view('admin.IntroductionList.index',compact('IntroductionLists','IntroductionCategories'));
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
    public function store(StoreIntroductionListRequest $request)
    { 
        dd($request->all());
        $IntroductionList = IntroductionList::create($request->validated());
        toast('Introduction List added successfully', 'success');
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
    public function edit(IntroductionList $IntroductionList)
    {
        $IntroductionCategories = IntroductionCategory::all();
        return view('admin.IntroductionList.edit',compact('IntroductionList','IntroductionCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntroductionListRequest $request, IntroductionList $IntroductionList)
    {
        // dd($request->all());
        $IntroductionList->update($request->validated());
        toast('Intro List update successfully', 'success');
        return redirect(route('admin.IntroductionList.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IntroductionList $IntroductionList)
    {
        $IntroductionList->delete();
        toast('Introduction list deleted successfully', 'success');
        return back();
    }
    public function updateStatus(IntroductionList $IntroductionList)
    {
        $IntroductionList->update([
            'status' => !$IntroductionList->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}
