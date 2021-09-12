<?php

use App\Http\Controllers\AuthorizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\App\Services\ReviewService $service) {
    return view('pages.home');
});

Route::prefix('authorisation')->name('auth.')->group(function () {
    Route::post('login', [AuthorizationController::class, 'login'])->name('login');
    Route::post('register', [AuthorizationController::class, 'register'])->name('register');
    Route::post('logout', [AuthorizationController::class, 'logout'])->name('logout');
});
