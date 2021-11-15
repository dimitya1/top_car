<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
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

Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::middleware(['set_website_log'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::prefix('authorisation')->name('auth.')->group(function () {
        Route::post('login', [AuthorizationController::class, 'login'])->name('login');
        Route::post('register', [AuthorizationController::class, 'register'])->name('register');
        Route::post('logout', [AuthorizationController::class, 'logout'])->name('logout');
    });

    Route::get('contact-us', [FeedbackController::class, 'index'])->name('contact_us.index');
    Route::post('contact-us', [FeedbackController::class, 'store'])->name('contact_us.store');
    Route::get('about', [AboutUsController::class, 'index'])->name('about');
    Route::get('personal', [UserController::class, 'index'])->name('profile');

    Route::resource('reviews', ReviewController::class);
});

Route::prefix('admin')->middleware(['set_admin_panel_log', CheckIsAdmin::class])->name('admin.')->group(function () {
    Route::get('feedback', [AdminFeedbackController::class, 'index'])->name('feedback.index');
    Route::resource('administrators', AdministratorController::class);
    Route::name('reviews.')->prefix('reviews')->group(function () {
        Route::get('', [ReviewController::class, 'index'])->name('index');
        Route::delete('{review}', [ReviewController::class, 'destroy'])->name('destroy');;
    });
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'adminIndex'])->name('index');
        Route::get('{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('{user}', [UserController::class, 'update'])->name('update');
        Route::post('/{user}/clear-authorisation', [UserController::class, 'clearAuthorisation'])->name('clear-authorisation');;
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');;
    });

    Route::name('activity_log.')->prefix('activity-log')->group(function () {
        Route::get('', [ActivityLogController::class, 'index'])->name('index');
    });
});
