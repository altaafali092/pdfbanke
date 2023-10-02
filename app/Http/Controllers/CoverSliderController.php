<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoverSlider\StoreCoverSliderRequest;

use App\Models\Coverslider;
use Illuminate\Http\Request;

class CoverSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coverSliders= Coverslider::latest()->paginate(10);
        return view('admin.CoverSlider.index',compact('coverSliders'));
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
    public function store(StoreCoverSliderRequest $request)
    {
        $coverSlider= Coverslider::create($request->validated());
        toast(' Cover Slider added successfully', 'success');
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
    public function edit(Coverslider $coverSlider)
    {
        return view('admin.CoverSlider.edit',compact('coverSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coverslider $coverSlider)
{
    $image = $coverSlider->image;
    $coverSlider->delete();
    if ($image) {
        $this->deleteFile($image);
    }

    toast('deleted Successfully','success');
    return back();
}

}
