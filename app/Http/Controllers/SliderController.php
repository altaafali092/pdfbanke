<?php

namespace App\Http\Controllers;

use App\Http\Requests\Slider\StoreSLiderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }


    public function store(StoreSliderRequest $request)
    {

        $slider = Slider::create($request->validated());
        toast('Slider added successfully', 'success');
        return back();
    }


    public function show(Slider $slider)
    {
        //
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if ($request->hasFile('image') && $slider->image) {
            $this->deleteFile($slider->image);
        }
        $slider->update($request->validated());
        toast('Slider updated successfully', 'success');
        return redirect(route('admin.slider.index'));
    }

    public function destroy(Slider $slider)
    {
        $this->deleteFile($slider->image);
        $slider->delete();
        toast('Slider deleted successfully', 'success');
        return back();
    }
}