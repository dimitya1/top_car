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

//todo check access to docs page
Route::prefix('v1')->middleware(['set_api_log', 'can:access for developers API'])->group(function () {
    Route::prefix('token')->name('token.')->group(function () {
        Route::post('request', [AuthorizationController::class, 'requestToken'])->name('request');
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::get('models', [CarModelController::class, 'index'])->name('models.index');
    });
});
