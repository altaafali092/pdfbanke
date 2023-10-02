<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\FileController;
use App\Http\Controllers\CoverSliderController;
use App\Http\Controllers\DownloadCategoryController;
use App\Http\Controllers\DownloadListController;

use App\Http\Controllers\EmployeeDetailController;
use App\Http\Controllers\FarmerCategoryController;
use App\Http\Controllers\FarmerListController;
use App\Http\Controllers\GalleryphotoController;
use App\Http\Controllers\GalleryVideoController;
use App\Http\Controllers\legalcategoryController;
use App\Http\Controllers\LegalListController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\newsCategoryController;
use App\Http\Controllers\newsListController;
use App\Http\Controllers\OfficeDetailController;
use App\Http\Controllers\OfficeDetailListController;
use App\Http\Controllers\OfficeSettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;




// Route::prefix('file')->as('file.')->controller(FileController::class)->group(function(){
//     Route::delete('{file}/delete','destroy')->name('destroy');
// });

Route::prefix('file')->as('file.')->controller(FileController::class)->group(function(){
    Route::delete('{file}/delete','destroy')->name('destroy');

});

// slider ke liye
Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('slider', SliderController::class);

// links ke liye

Route::resource('links', LinkController::class);
Route::resource('contact',ContactController::class,);


// download ke liye

Route::prefix('downloads')->group(function () {
    Route::resource('downloadCategory', DownloadCategoryController::class);
    Route::resource('downloadList', DownloadListController::class);
    Route::put('downloadList/{downloadList}/updateStatus', [DownloadListController::class, 'updateStatus'])->name('downloadList.updateStatus');
});

Route::prefix('news')->group(function(){
Route::resource('newsCategory', newsCategoryController::class);
Route::resource('newsList', newsListController::class);
Route::put('newsList/{newsList}/updateStatus', [newsListController::class, 'updateStatus'])->name('newsList.updateStatus');
});



// legalDOcument
Route::prefix('legaldocuments')->group(function () {
    Route::resource('legalCategory', legalcategoryController::class);
    Route::resource('legalList', LegalListController::class);
    Route::put('legalList/{legalList}/updateStatus', [LegalListController::class, 'updateStatus'])->name('legalList.updateStatus');
});

// officedetail
Route::resource('officeDetail', OfficeDetailController::class);
Route::resource('officeDetailList', OfficeDetailListController::class);
Route::put('officeDetailList/{officeDetailList}/updateStatus', [OfficeDetailListController::class, 'updateStatus'])->name('officeDetailList.updateStatus');

// Farmer
Route::resource('farmerCategory',FarmerCategoryController::class);
Route::resource('farmerList',FarmerListController::class);
Route::put('farmerList/{farmerList}/updateStatus', [FarmerListController::class, 'updateStatus'])->name('farmerList.updateStatus');


//employeeDetail
Route::resource('empDetail',EmployeeDetailController::class);

Route::resource('galleryPhoto',GalleryphotoController::class);
Route::put('galleryPhoto/{galleryPhoto}/updateStatus', [GalleryphotoController::class, 'updateStatus'])->name('galleryPhoto.updateStatus');

Route::resource('galleryVideo',GalleryVideoController::class);
Route::put('galleryVideo/{galleryVideo}/updateStatus', [OfficeDetailListController::class, 'updateStatus'])->name('galleryVideo.updateStatus');

Route::resource('officeSetting',OfficeSettingController::class);

Route::resource('CoverSlider',CoverSliderController::class);