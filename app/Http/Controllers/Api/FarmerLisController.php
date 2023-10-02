<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmerList\StoreFarmerListRequest;
use App\Http\Requests\FarmerList\UpdateFarmerListRequest;
use App\Http\Resources\FarmerListResource;
use App\Models\FarmerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FarmerLisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'farmerList' => FarmerList::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmerListRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $validatedData = $request->validated();
            $farmerList = FarmerList::create($validatedData);
            foreach ($request->file('files') as $file) {
                $farmerList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('farmers/' . STR::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
            return new FarmerListResource($farmerList);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerList $farmerList)
    {
        return FarmerListResource::make($farmerList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFarmerListRequest $request, FarmerList $farmerList)
    {
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
        return new FarmerListResource($farmerList);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerList $farmerList)
    {
        $farmerList->delete();
        return response()->json([
            'message'=> 'Deleted  successfully'
        ]);
    }
}