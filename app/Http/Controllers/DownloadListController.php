<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadList\StoreDownloadListRequest;
use App\Http\Requests\DownloadList\updateDownloadListRequest;
use App\Models\DownloadCategory;
use App\Models\DownloadList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DownloadListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloadLists = DownloadList::latest()->paginate(10);
        $downloadCategories = DownloadCategory::all();
        return view('admin.DownloadList.index', compact('downloadLists', 'downloadCategories'));
    }

    public function store(StoreDownloadListRequest $request)
    {
        DB::transaction(function () use ($request) {
            $downloadList = DownloadList::create($request->validated());
            foreach ($request->validated(['files']) as $file) {
                $downloadList->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('downlads/' . STR::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
        });
        toast('Download added successfully', 'success');
        return back();
    }



    public function show(DownloadList $downloadList)
    {
        $downloadList->load('files');
        return view('admin.DownloadList.show',compact('downloadList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DownloadList $downloadList)
    {
        $downloadCategories = DownloadCategory::all();
        return view('admin.DownloadList.edit', compact('downloadList', 'downloadCategories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDownloadListRequest $request, DownloadList $downloadList)
    { {
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $downloadList->files()->create([
                        'file_name' => $file->getClientOriginalName(),
                        'file' => $file->store('downlads/' . Str::slug($request->input('title'), '_'), 'public'),
                        'size' => $file->getSize(),
                        'extension' => $file->getClientOriginalExtension()
                    ]);
                }
            }
            $downloadList->update($request->validated());
            toast('DownloadList update successfully', 'success');
            return redirect(route('admin.downloadList.index'));
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DownloadList $downloadList)
    {

        $downloadList->delete();
        toast('DownloadList deleted successfully', 'success');
        return back();
    }

    public function updateStatus(DownloadList $downloadList)
    {
        $downloadList->update([
            'status' => !$downloadList->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}