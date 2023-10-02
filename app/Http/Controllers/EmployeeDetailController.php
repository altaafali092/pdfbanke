<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeDetail\StoreEmployeeDetailRequest;
use App\Http\Requests\EmployeeDetail\UpdateEmployeeDetailRequest;
use App\Models\EmployeeDetail;
use Illuminate\Http\Request;

class EmployeeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empDetails = EmployeeDetail::latest()->paginate(10);
        return view('admin.empDetail.index',compact('empDetails'));
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
    public function store(StoreEmployeeDetailRequest $request)
    {
        $empDetail = EmployeeDetail::create($request->validated());
        toast('Employee Detail added successfully', 'success');
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
    public function edit(EmployeeDetail $empDetail)
    {
        return view('admin.empDetail.edit', compact('empDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeDetailRequest $request, EmployeeDetail $empDetail)
    {
        if ($request->hasFile('image') && $empDetail->image) {
            $this->deleteFile($empDetail->image);
        }
        $empDetail->update($request->validated());
        toast('empDetail updated successfully', 'success');
        return redirect(route('admin.empDetail.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeDetail $empDetail)
    {
        $empDetail->delete();
        toast('Employeee  deleted successfully', 'success');
        return back();
    }
}
