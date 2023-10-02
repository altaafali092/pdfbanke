<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Link\StoreLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;
use App\Http\Resources\LinkResource;
use App\Models\Links;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'link'=> Links::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        $link = Links::create($request->all());
        return new LinkResource($link);
    }

    /**
     * Display the specified resource.
     */
    public function show(Links $link)
    {
        return LinkResource::make($link);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Links $link)
    {
        $link->update($request->all());
        return new LinkResource($link);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Links $link)
    {
        $link->Delete();
        return response()->json([
            'message'=>'link deleted',
        ]);
    }
}
