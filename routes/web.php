<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HelperController;
use App\Http\Livewire\Area;
use App\Http\Livewire\Category;
use App\Http\Livewire\District;
use App\Http\Livewire\Profile;
use App\Http\Livewire\State;
use App\Http\Livewire\SubCategory;
use App\Http\Livewire\Vendor;

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
    Route::get('/profile', [AdminController::class,'profile'])
        ->name('profile');
    Route::post('/profile', [AdminController::class,'profileUpdate'])
        ->name('profile.update');
    Route::get('/dealer-profile/{id}', [AdminController::class,'dealerProfile'])
        ->name('dealer.profile');
    Route::post('/dealer-profile/{id}', [AdminController::class,'dealerProfileUpdate'])
        ->name('dealer.profile.update');
    Route::post('/logout', [AdminController::class,'logOut'])
        ->name('logout');

    Route::get('/states', State::class)->name('state');
    Route::get('/districts', District::class)->name('district');
    Route::get('/areas', Area::class)->name('area');
    Route::get('/dealers', Vendor::class)->name('vendor');
    Route::get('/categories', Category::class)->name('category');
    Route::get('/sub-categories', SubCategory::class)->name('subcategory');


});
