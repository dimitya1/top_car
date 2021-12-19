<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckIsAdmin;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\FeedbackController;
use App\Http\Controllers\Front\AuthorizationController;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\ActivityLogController as AdminActivityLogController;
use App\Http\Controllers\Admin\AdministratorController as AdminAdministratorController;

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
    Route::resource('administrators', AdminAdministratorController::class);
    Route::name('reviews.')->prefix('reviews')->group(function () {
        Route::get('', [AdminReviewController::class, 'index'])->name('index');
        Route::delete('{review}', [AdminReviewController::class, 'destroy'])->name('destroy');
    });
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [AdminUserController::class, 'index'])->name('index');
        Route::get('{user}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('{user}', [AdminUserController::class, 'update'])->name('update');
        Route::post('/{user}/clear-authorisation', [AdminUserController::class, 'clearAuthorisation'])
            ->name('clear-authorisation');
        Route::delete('/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
    });
    
    Route::name('activity_log.')->prefix('activity-log')->group(function () {
        Route::get('', [AdminActivityLogController::class, 'index'])->name('index');
    });
});
