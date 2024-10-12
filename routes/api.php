<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\SubscriptionController;

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
Route::get('/areas', [AreaController::class, 'index']);

Route::get('/packages',[PackageController::class,'index']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::post('/subscribe',[SubscriptionController::class,'subscribe'] )->middleware('auth:sanctum');

Route::post('/order',[OrderController::class,'create'])->middleware('auth:sanctum');
Route::post('order/pick/{orderId}',[OrderController::class,'pickOrder'])->middleware('auth:sanctum');
Route::get('order/wating',[OrderController::class,'getWaitingOrder'])->middleware('auth:sanctum');

