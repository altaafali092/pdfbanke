<?php

namespace App\Http\Controllers;

use App\Models\DownloadCategory;
use App\Models\DownloadList;
use App\Models\EmployeeDetail;
use App\Models\FarmerList;
use App\Models\GalleryPhoto;
use App\Models\GalleryVideo;
use App\Models\legalCategory;
use App\Models\legalList;
use App\Models\Links;
use App\Models\newsCategory;
use App\Models\NewsList;
use App\Models\OfficeDetail;
use App\Models\OfficeDetailList;
use App\Models\OfficeSetting;
use App\Models\Slider;


class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $farmerListes = FarmerList::take(5)->get();
        $farmerLists = FarmerList::take(3)->get();
        $legalCategories = legalCategory::with('legalLists')->get();
        $newsCategories = newsCategory::with('newsLists')->get();
        $newsLists = NewsList::take(3)->get();
        $officeDetailList=OfficeDetailList::orderBy('position')->get();
      
        return view('frontend.index', compact('sliders', 'legalCategories', 'farmerLists', 'farmerListes', 'newsLists', 'newsCategories','officeDetailList'));
    }
    public function links()
    {
        $links = Links::all();
        return view('frontend.links', compact('links'));
    }
    public function downloadCategory(DownloadCategory $downloadCategory)
    {
        $downloadCategory->load('downloadLists');
        return view('frontend.downloadlist', compact('downloadCategory'));
    }

    public function downloadDetail(DownloadList $downloadList)
    {
        $downloadList->load('files');
        return view('frontend.download-detail', compact('downloadList'));
    }
    public function newsCategory(newsCategory $newsCategory)
    {
        $newsCategory->load('newsLists');
        return view('frontend.news', compact('newsCategory'));
    }

    public function officeDetail(OfficeDetail $officeDetail)
    {
        $officeDetail->load('officeDetailList');
        return view('frontend.our-intro', compact('officeDetail'));
    }
    public function officeDetailList(OfficeDetailList $officeDetailList)
    {
        $officeDetailList->load('files');
        return view('frontend.our-intro', compact('officeDetailList'));
    }
    public function farmerListDetails(FarmerList $farmerList)
    {
        $farmerList->load('files');
        return view('frontend.farmerdetail', compact('farmerList'));
    }
    public function farmerLists()
    {
        $farmerLists = FarmerList::all();
        return view('frontend.farmerlist', compact('farmerLists'));
    }
    public function newsListDetails(NewsList $newsList)
    {
        $newsList->load('files');
        return view('frontend.newsDetail', compact('newsList'));
    }
    public function legalListDetails(legalList $legalList)
    {
        $legalList->load('files');
        return view('frontend.legaldoc', compact('legalList'));
    }
    public function legalLists()
    {
        $legalLists = legalList::all();
        return view('frontend.legalList', compact('legalLists'));
    }
    public function employeeDetail()
    {
        $employeeDetails = EmployeeDetail::all();
        return view('frontend.employeeDetail', compact('employeeDetails'));
    }
    public function video()
    {
        $Videos = GalleryVideo::all();
        return view('frontend.videogallery', compact('Videos'));
    }

    public function galleryPhoto()
    {
        $photos = GalleryPhoto::all();
        return view('frontend.photogallery', compact('photos'));
    }

    public function photoList(GalleryPhoto $photo)
    {
        $photo->load('files');
        // return $photo;
        return view('frontend.photoList', compact('photo'));
    }
    public function officesetting(OfficeSetting $officeSettings)
    {
        $officeSettings = OfficeSetting::all();
        return view('frontend.layouts.header',compact('officeSettings'));
    }
}