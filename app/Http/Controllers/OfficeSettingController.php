<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeSetting\StoreOfficeSettingRequest;
use App\Models\EmployeeDetail;
use App\Models\OfficeSetting;
use \Illuminate\Support\Facades\Cache;

class OfficeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officeSetting = officeSetting();
        $empDetails = EmployeeDetail::all();
        return view('admin.officeSetting.index', compact('officeSetting', 'empDetails'));
    }


    public function store(StoreOfficeSettingRequest $request)
    {
        $officeSetting = OfficeSetting::latest()->first();

        if ($officeSetting) {
            if ($request->hasFile('logo1') && $logo1 = $officeSetting->getRawOriginal('logo1')) {
                $this->deleteFile($logo1);
            }
            if ($request->hasFile('logo2') && $logo2 = $officeSetting->getRawOriginal('logo2')) {
                $this->deleteFile($logo2);
            }
            if ($request->hasFile('adphoto') && $adPhoto = $officeSetting->getRawOriginal('adphoto')) {
                $this->deleteFile($adPhoto);
            }
            if ($request->hasFile('cover') && $cover = $officeSetting->getRawOriginal('cover')) {
                $this->deleteFile($cover);
            }

            // Update the existing OfficeSetting with the validated data
            $officeSetting->update($request->validated());
        } else {
            // Create a new OfficeSetting with the validated data
            OfficeSetting::create($request->validated());
        }

        // Forget the cache after updating or creating the OfficeSetting
        Cache::forget('office_setting');

        toast('Office Setting added successfully', 'success');
        return back();
    }

}