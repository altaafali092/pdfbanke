<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryPhoto\StoreGalleryPhotoRequest;
use App\Http\Requests\GalleryPhoto\UpdateGalleryPhotoRequest;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GalleryphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryPhotos = GalleryPhoto::latest()->paginate(10);
        return view('admin.galleryPhoto.index',compact('galleryPhotos'));
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
    public function store(StoreGalleryPhotoRequest $request)
    {  
        DB::transaction(function () use ($request) {
        $galleryPhotos = GalleryPhoto::create($request->validated());
        foreach ($request->validated(['files']) as $file) {
            $galleryPhotos->files()->create([
                'file_name' => $file->getClientOriginalName(),
                'file' => $file->store('photo/' . STR::slug($request->input('title'), '_'), 'public'),
                'size' => $file->getSize(),
                'extension' => $file->getClientOriginalExtension()
            ]);
        }
    });
    toast('Photo added successfully', 'success');
    return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryPhoto $galleryPhoto)
    {
        $galleryPhoto->load('files');
        return view('admin.galleryPhoto.show',compact('galleryPhoto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryPhoto $galleryPhoto)
    {
        return view('admin.galleryPhoto.edit', compact('galleryPhoto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryPhotoRequest $request, GalleryPhoto $galleryPhoto)
    {
        $galleryPhoto->files()->delete();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $galleryPhoto->files()->create([
                    'file_name' => $file->getClientOriginalName(),
                    'file' => $file->store('photo/' . Str::slug($request->input('title'), '_'), 'public'),
                    'size' => $file->getSize(),
                    'extension' => $file->getClientOriginalExtension()
                ]);
            }
        }
        $galleryPhoto->update($request->validated());
        toast('Photo Updated successfully', 'success');
        return redirect(route('admin.galleryPhoto.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryPhoto $galleryPhoto)
    {
        $galleryPhoto->delete();
        toast('Photos deleted successfully', 'success');
        return back();
    }
    public function updateStatus(GalleryPhoto $galleryPhoto)
    {
        $galleryPhoto->update([
            'status' => !$galleryPhoto->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}
