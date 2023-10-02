<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryVideo\StoreGalleryVideoRequest;
use App\Http\Requests\GalleryVideo\UpdateGalleryVideoRequest;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;

class GalleryVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryVideos= GalleryVideo::latest()->paginate(10);
        return view('admin.galleryVideo.index',compact('galleryVideos'));
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
    public function store(StoreGalleryVideoRequest $request)
    {
        $galleryVideo = GalleryVideo::create($request->validated());
        toast('video Link  added Successfully', 'success');
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
    public function edit(GalleryVideo $galleryVideo)
    {
        return view('admin.galleryVideo.edit',compact('galleryVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryVideoRequest $request, GalleryVideo $galleryVideo)
    {
        $galleryVideo->update($request->validated());
        toast('Updated Sucessfully','success');
        return redirect(route('admin.galleryVideo.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryVideo $galleryVideo)
    {
        $galleryVideo->delete();
        toast('Photos deleted successfully', 'success');
        return back();
    }
    public function updateStatus(GalleryVideo $galleryVideo)
    {
        $galleryVideo->update([
            'status' => !$galleryVideo->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}
