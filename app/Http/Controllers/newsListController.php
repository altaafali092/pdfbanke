<?php

namespace App\Http\Controllers;

use App\Http\Requests\newsList\StoreNewsListRequest;
use App\Http\Requests\newsList\UpdateNewsListRequest;
use App\Models\newsCategory;
use App\Models\NewsList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class newsListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsLists = NewsList::latest()->paginate(10);
        $newsCategories = newsCategory::all();
        return view('admin.newsList.index',compact('newsLists','newsCategories'));
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
    public function store(StoreNewsListRequest $request)
    {
        DB::transaction(function () use ($request) {
            $newsList = NewsList::create($request->validated());
            foreach ($request->validated(['files']) as $file) {
                $newsList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('newsList/' . str::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
        });
        toast('News List added successfully', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsList $newsList)
    {
        $newsList->load('files');
        return view('admin.newsList.show',compact('newsList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsList $newsList)
    {
        $newsCategories = newsCategory::all();
        return view('admin.newsList.edit',compact('newsList','newsCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsListRequest $request ,NewsList $newsList)
    {
        $newsList->files()->delete();

        if($request->hasFile('files')){
        foreach ($request->validated(['files']) as $file) {
                $newsList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('newsList/' . str::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
        }
        $newsList->update($request->validated());
        toast(' News List updated successfully', 'success');
        return redirect( route('admin.newsList.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsList $newsList)
    {
        $newsList->delete();
        toast('NewsList deleted successfully', 'success');
        return back();
    }
    public function updateStatus(NewsList $newsList)
    {
        $newsList->update([
         'status' => !$newsList->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}
