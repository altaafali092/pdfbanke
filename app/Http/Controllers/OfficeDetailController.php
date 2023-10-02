<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeDetail\StoreofficeDetailRequest;
use App\Http\Requests\OfficeDetail\UpdateofficeDetailRequest;
use App\Models\OfficeDetail;
use Illuminate\Http\Request;

class OfficeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officeDetails = OfficeDetail::latest()->paginate(10);
        return view('admin.officeDetail.index',compact('officeDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreofficeDetailRequest $request)
    {
        $officeDetail = OfficeDetail::create($request->validated());
        toast('OfficeDetail Category added succssfully', 'success');
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
    public function edit(OfficeDetail $officeDetail)
    {
        return view('admin.officeDetail.edit',compact('officeDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateofficeDetailRequest $request, OfficeDetail $officeDetail)
    {
        $officeDetail->update($request->validated());
        toast(' Introduction Category update successfully', 'success');
        return redirect(route('admin.officeDetail.index'));
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeDetail $officeDetail)
    {
        $officeDetail->delete();
        toast('OfficeDetail Category deleted successfully', 'success');
        return back();
    }
}
