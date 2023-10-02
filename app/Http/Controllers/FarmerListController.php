<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmerList\StoreFarmerListRequest;
use App\Http\Requests\FarmerList\UpdateFarmerListRequest;
use App\Models\FarmerCategory;
use App\Models\FarmerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FarmerListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $farmerLists = FarmerList::latest()->paginate(10);
        $farmerCategories = FarmerCategory::all();
        return view('admin.farmerList.index',compact('farmerLists','farmerCategories'));
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
    public function store(StoreFarmerListRequest $request)
    {
        DB::transaction(function () use ($request) {
            $farmerList = FarmerList::create($request->validated());
            foreach ($request->validated(['files']) as $file) {
                $farmerList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('farmers/' . STR::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
        });
        
        toast('Farmer List added successfully', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerList $farmerList)
    {
        $farmerList->load('files');
        return view('admin.farmerList.show',compact('farmerList'));
    }

    /**
     * public function show(FarmerList $farmerList)
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerList $farmerList)
    {
        $farmerCategories = FarmerCategory::all();
        return view('admin.farmerList.edit', compact('farmerList', 'farmerCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerListRequest $request, FarmerList $farmerList)
    {
        $farmerList->files()->delete();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $farmerList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('farmers/' . Str::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
        }
        $farmerList->update($request->validated());
        toast('Farmer List added successfully', 'success');
        return redirect(route('admin.farmerList.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerList $farmerList)
    {
        $farmerList->delete();
        toast('OfficeList deleted successfully', 'success');
        return back();
    }
    public function updateStatus(FarmerList $farmerList)
    {
        $farmerList->update([
            'status' => !$farmerList->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}
