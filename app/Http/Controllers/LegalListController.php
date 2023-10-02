<?php

namespace App\Http\Controllers;

use App\Http\Requests\legalList\StorelegalListRequest;
use App\Http\Requests\legalList\UpdatelegalListRequest;
use App\Models\legalCategory;
use App\Models\legalList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LegalListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalLists = legalList::latest()->paginate(10);
        $legalCategories = legalCategory::all();
        return view('admin.legalList.index', compact('legalLists', 'legalCategories'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
   public function store(StorelegalListRequest $request)
{
    DB::transaction(function () use ($request) {
        $legalList = legalList::create($request->validated());

        foreach ($request->validated(['files']) as $file) {
            $legalList->files()->create([
                'file_name' => $file->getClientOriginalName(),
                'file' => $file->store('legalList/' . str::slug($request->input('title'), '_'), 'public'),
                'size' => $file->getSize(),
                'extension' => $file->getClientOriginalExtension()
            ]);
        }
    });

    toast('legalList added successfully', 'success');
    return back();
}


    /**
     * Display the specified resource.
     */
    public function show(legalList $legalList)
    {
        $legalList->load('files');
        return view('admin.legalList.show',compact('legalList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(legalList $legalList)
    {
        $legalCategories= legalCategory::all();
        return view('admin.legalList.edit',compact('legalList','legalCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelegalListRequest $request, legalList $legalList)
    {
        $legalList->files()->delete();
        if($request->hasFile('files')){
            foreach ($request->validated(['files']) as $file) {
                $legalList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('legalList/' . str::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
            $legalList->update($request->validated());
            toast('legalList update successfully', 'success');
            return redirect(route('admin.legalList.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(legalList $legalList)
    {
        
        $legalList->delete();
        toast('DownloadList deleted successfully', 'success');
        return back();
    }
    public function updateStatus(legalList $legalList)
    {
        $legalList->update([
            'status' => !$legalList->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}