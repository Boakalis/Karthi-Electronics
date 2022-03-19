<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HelperController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Route::get('store-login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('store-login', [LoginController::class, 'loginAttempt'])->name('login.attempt');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    /**Image Uploader Helper */
    Route::post('/fileUploadEditor', [HelperController::class , 'fileUploadEditor'])
        ->name('fileUploadEditor');
    Route::post('/settings', [AdminController::class , 'settingsUpdate'])
        ->name('settings.update');
    Route::get('/banner-delete/{id}', [AdminController::class , 'bannerDelete'])
        ->name('banner.delete');

});
