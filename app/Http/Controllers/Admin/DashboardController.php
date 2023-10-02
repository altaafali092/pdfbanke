<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use App\Models\DownloadList;
use App\Models\EmployeeDetail;
use App\Models\FarmerCategory;
use App\Models\FarmerList;
use App\Models\legalCategory;
use App\Models\legalList;
use App\Models\Links;
use App\Models\newsCategory;
use App\Models\NewsList;
use App\Models\OfficeDetailList;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $sliders_count = Slider::count();
        $farmerLists_count = FarmerList::count();
        $farmerCategories_count= FarmerCategory::count();
        $empDetails_count = EmployeeDetail::count();
        $newsLists_count = NewsList::count();
        $newsCategories_count = newsCategory::count();
        $downloadLists_count = DownloadList::count();
        $downloadCategories_count = DownloadCategory::count();
        $officeDetailLists_count = OfficeDetailList::count();
        $legalLists_count = legalList::count();
        $legalCategories_count = legalCategory::count();
        $links_count= Links::count();

        return view('admin.layouts.index', compact('sliders_count', 'farmerLists_count','farmerCategories_count' ,'empDetails_count', 'newsLists_count', 'newsCategories_count', 'downloadLists_count', 'downloadCategories_count', 'officeDetailLists_count', 'legalLists_count','legalCategories_count','links_count'));
    }
}