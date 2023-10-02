<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(FrontendController::class)->group(function (){
    Route::get('/','index')->name('index');

    Route::get('/links','links')->name('link');
    Route::get('downloadCategory/{downloadCategory:slug}','downloadCategory')->name('downloadCategory');
    Route::get('downloadList/{downloadList:slug}','downloadDetail')->name('downloadDetail');
    Route::get('newsCategory/{newsCategory:slug}','newsCategory')->name('newsCategory');
    Route::get('newsListDetails/{newsList:slug}','newsListDetails')->name('newsListDetails');
    Route::post('contact',[ContactController::class,'store'])->name('contact');
    Route::get('contact','contact')->name('contact');
    Route::get('officeDetail/{officeDetail:slug}','officeDetail')->name('officeDetail');
    Route::get('officeDetailList/{officeDetailList:slug}','officeDetailList')->name('officeDetaillist');
    Route::get('farmerListDetails/{farmerList:slug}', 'farmerListDetails')->name('farmerListDetails');
    Route::get('farmerLists','farmerLists')->name('farmerLists');
    Route::get('legalListDetails/{legalList:slug}', 'legalListDetails')->name('legalListDetails');
    Route::get('legalLists','legalLists')->name('legalLists');
    Route::get('employeeDetails', 'employeeDetail')->name('employeeDetails');
    Route::get('Videos','video')->name('Videos');
    Route::get('galleryPhotos','galleryPhoto')->name('galleryPhotos');
    Route::get('photoList/{photo:slug}', 'photoList')->name('photoList');

});


Route::view('contact','frontend.contact');

// gallery
Route::view('photoList','frontend.photoList');


Route::view('employeeDetail','frontend.employeeDetail');

// login
Route::get('login',[AuthController::class,'loginpage'])->name('loginpage');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::view('forget','frontend.forget');



