<?php

namespace App\Http\Controllers;

use App\Http\Requests\officeDetailLists\StoreofficeDetailListRequest;
use App\Http\Requests\officeDetailLists\UpdateofficeDetailListRequest;
use App\Models\OfficeDetail;
use App\Models\OfficeDetailList;
use Illuminate\Http\Request;

class OfficeDetailListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OfficeDetailList $officeDetailList)
    {
        $officeDetailLists = OfficeDetailList::latest()->paginate(10);
        $officeDetails = OfficeDetail::all();    
        return view('admin.officeDetailList.index',compact('officeDetailLists','officeDetails','officeDetailList'));
    }

    public function store(StoreOfficeDetailListRequest $request)
    {
        $officeDetailList = OfficeDetailList::create($request->validated());
        toast('officelist added successfully', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeDetailList $officeDetailList)
    {
        $officeDetailList->load('files');
        return view('admin.officeDetailList.show',compact('officeDetailList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeDetailList $officeDetailList)
    {
        $officeDetails = OfficeDetail::all();
        return view('admin.officeDetailList.edit', compact('officeDetailList', 'officeDetails'));
    }


    public function update(UpdateofficeDetailListRequest $request, OfficeDetailList $officeDetailList)
    {
        $officeDetailList->update($request->validated());
        toast('officelist edited successfully', 'success');
        return redirect(route('admin.officeDetailList.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeDetailList $officeDetailList)
    {
        $officeDetailList->delete();
        toast('OfficeList deleted successfully', 'success');
        return back();
    }
    public function updateStatus(OfficeDetailList $officeDetailList)
    {
        $officeDetailList->update([
            'status' => !$officeDetailList->status
        ]);
        toast('Status updated sucessfully', 'success');
        return back();
    }
}
