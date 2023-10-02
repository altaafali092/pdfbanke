<?php
use App\Models\DownloadCategory;
use App\Models\Links;
use App\Models\newsCategory;
use App\Models\OfficeDetail;
use App\Models\OfficeSetting;

if (!function_exists('officeSetting')) {
    function officeSetting()
    {
        return Cache::rememberForever('officeSetting', function () {
            return OfficeSetting::with('officeCheifId', 'informationOfficerId')->latest()->first();
        });
    }
}

if (!function_exists('downloadCategory')) {

    function downloadCategorys()
    {
        return DownloadCategory::all();
    }
}
if (!function_exists('newscategory')) {
    function newscategorys()
    {
        return newsCategory::all();
    }
}
if (!function_exists('officeDetail')) {
    function officeDetails()
    {
        return OfficeDetail::all();
    }
}
if(!function_exists('links')){
    function links()
    {
        return Links::limit(5)->get();
    }
}