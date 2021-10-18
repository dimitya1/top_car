<?php

use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\CarModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('token')->name('token.')->group(function () {
        Route::post('request', [AuthorizationController::class, 'requestToken'])->name('request');
    });
    Route::get('reviews', [ReviewController::class, 'index'])->middleware('auth:sanctum')->name('reviews.index');
    Route::get('models', [CarModelController::class, 'index'])->middleware('auth:sanctum')->name('models.index');
});
