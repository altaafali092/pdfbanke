<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\StoreSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'slider' => Slider::get()
        ]);

    }
    public function show(Slider $slider)
    {
        return SliderResource::make($slider);
    }
    /**
     * Store a newly created resource in storage.
     */ 
    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::create($request->all());
        return new SliderResource($slider);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {

        $slider->update($request->all());
        return new SliderResource($slider);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // return $slider;
        $slider->delete();
        return response()->json([
            'message' => 'slider Deleted',
        ]);

    }
}