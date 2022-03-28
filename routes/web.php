<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HelperController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Area;
use App\Http\Livewire\Banner;
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
    Route::get('/banners', Banner::class)->name('banner');
    Route::get('/categories', Category::class)->name('category');
    Route::get('/sub-categories', SubCategory::class)->name('subcategory');

    Route::get('/products', [ProductController::class,'index'])
    ->name('product.index');
    Route::get('/new-products', [ProductController::class,'newProducts'])
    ->name('product.new');
    Route::get('/rejected-products', [ProductController::class,'rejectedProducts'])
    ->name('product.reject');
    Route::get('/create-product', [ProductController::class,'create'])
    ->name('product.create');
    Route::get('/edit-product/{slug}', [ProductController::class,'edit'])
    ->name('product.edit');
    Route::get('/review-product/{slug}', [ProductController::class,'review'])
    ->name('product.review');
    Route::get('/show-product/{slug}', [ProductController::class,'show'])
    ->name('product.show');
    Route::post('/store-product', [ProductController::class,'store'])
    ->name('product.store');
    Route::post('/update-product/{slug}', [ProductController::class,'update'])
    ->name('product.update');
    Route::post('/product-review-update/{slug}', [ProductController::class,'reviewUpdate'])
    ->name('review.update');

    Route::post('/delete-variant/{id}', [ProductController::class,'deleteVariant'])
    ->name('variant.delete');

    Route::post('/change-status', [ProductController::class,'changeStatus'])
    ->name('product.status');
    Route::post('/delete-product', [ProductController::class,'deleteProduct'])
    ->name('product.delete');


});
