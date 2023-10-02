<?php

namespace App\Http\Controllers;

use App\Http\Requests\Link\StoreLinkRequest;
use App\Http\Requests\Link\UpdateLinkRequest;
use App\Models\Links;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    public function index()
    {
        $links = Links::latest()->paginate(10);
        return view('admin.links.index', compact('links'));
    }


    public function store(StoreLinkRequest $request)
    {
        $link = Links::create($request->validated());
        toast('Link added succssfully', 'success');
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
    public function edit(Links $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Links $link)
    {
        $link->update($request->validated());
        toast('link update successfully', 'success');
        return redirect(route('admin.links.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Links $link)
    {

        $link->delete();
        toast('link deleted successfully', 'success');
        return back();
    }

}