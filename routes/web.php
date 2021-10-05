<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('about', [AboutUsController::class, 'index'])->name('about');
Route::get('personal', [UserController::class, 'index'])->name('profile');

Route::prefix('authorisation')->name('auth.')->group(function () {
    Route::post('login', [AuthorizationController::class, 'login'])->name('login');
    Route::post('register', [AuthorizationController::class, 'register'])->name('register');
    Route::post('logout', [AuthorizationController::class, 'logout'])->name('logout');
});
