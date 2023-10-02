<?php

use App\Http\Controllers\Api\DownloadCategoryController;
use App\Http\Controllers\Api\DownloadListController;
use App\Http\Controllers\Api\FarmerCategoryController;
use App\Http\Controllers\Api\FarmerLisController;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\NewsCategoryController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',function(){
    return  UserResource::collection(User::all());
});
// Route::get('/user', function () {
//     return new UserCollection(User::all());
// });
Route::apiResource('slider',SliderController::class);
Route::apiResource('link',LinkController::class);
Route::apiResource('newsCategory',NewsCategoryController::class);
Route::apiResource('downloadCategory',DownloadCategoryController::class);
Route::apiResource('downloadList',DownloadListController::class);
Route::apiResource('farmerCategory',FarmerCategoryController::class);
Route::apiResource('farmerList',FarmerLisController::class);