<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckIsAdmin;
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

Route::middleware(['set_website_log'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::prefix('authorisation')->name('auth.')->group(function () {
        Route::post('login', [AuthorizationController::class, 'login'])->name('login');
        Route::post('register', [AuthorizationController::class, 'register'])->name('register');
        Route::post('logout', [AuthorizationController::class, 'logout'])->name('logout');
    });

    Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('about', [AboutUsController::class, 'index'])->name('about');
    Route::get('personal', [UserController::class, 'index'])->name('profile');

    Route::resource('reviews', ReviewController::class);
});

Route::prefix('admin')->middleware(['set_admin_log'])->name('admin.')->middleware([CheckIsAdmin::class])->group(function () {
    Route::resource('administrators', AdministratorController::class);
    Route::name('reviews.')->prefix('reviews')->group(function () {
        Route::get('', [ReviewController::class, 'index'])->name('index');
        Route::delete('{review}', [ReviewController::class, 'destroy'])->name('destroy');;
    });
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'adminIndex'])->name('index');
        Route::post('/{user}/clear-authorisation', [UserController::class, 'clearAuthorisation'])->name('clear-authorisation');;
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');;
    });
});
