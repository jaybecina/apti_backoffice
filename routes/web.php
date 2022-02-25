<?php

use Illuminate\Support\Facades\Route;

// Backend Routes

// Dashboard
use App\Http\Controllers\Admin\DashboardController;

// Product
use App\Http\Controllers\Admin\Product\IndexController as ProductIndexController;
use App\Http\Controllers\Admin\Product\ShowController as ProductShowController;
use App\Http\Controllers\Admin\Product\SearchController as ProductSearchController;
use App\Http\Controllers\Admin\Product\CreateController as ProductCreateController;
use App\Http\Controllers\Admin\Product\StoreController as ProductStoreController;
use App\Http\Controllers\Admin\Product\UpdateController as ProductUpdateController;
use App\Http\Controllers\Admin\Product\DeleteController as ProductDeleteController;
use App\Http\Controllers\Admin\Product\MultipleDeleteController as ProductMultipleDeleteController;
// Product Type
use App\Http\Controllers\Admin\Product\Type\IndexController as ProductTypeIndexController;
use App\Http\Controllers\Admin\Product\Type\ShowController as ProductTypeShowController;
use App\Http\Controllers\Admin\Product\Type\CreateController as ProductTypeCreateController;
use App\Http\Controllers\Admin\Product\Type\StoreController as ProductTypeStoreController;
use App\Http\Controllers\Admin\Product\Type\UpdateController as ProductTypeUpdateController;
use App\Http\Controllers\Admin\Product\Type\DeleteController as ProductTypeDeleteController;
use App\Http\Controllers\Admin\Product\Type\MultipleDeleteController as ProductTypeMultipleDeleteController;
// About
use App\Http\Controllers\Admin\About\IndexController as AboutIndexController;
use App\Http\Controllers\Admin\About\UpdateController as AboutUpdateController;
// News
use App\Http\Controllers\Admin\News\IndexController as NewsIndexController;
use App\Http\Controllers\Admin\News\CreateController as NewsCreateController;
use App\Http\Controllers\Admin\News\StoreController as NewsStoreController;
use App\Http\Controllers\Admin\News\ShowController as NewsShowController;
use App\Http\Controllers\Admin\News\UpdateController as NewsUpdateController;
use App\Http\Controllers\Admin\News\DeleteController as NewsDeleteController;
use App\Http\Controllers\Admin\News\MultipleDeleteController as NewsMultipleDeleteController;
// News Category
use App\Http\Controllers\Admin\News\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\News\Category\StoreController as CategoryStoreController;
use App\Http\Controllers\Admin\News\Category\DeleteController as CategoryDeleteController;
use App\Http\Controllers\Admin\News\Category\UpdateController as CategoryUpdateController;
use App\Http\Controllers\Admin\News\Category\MultipleDeleteController as CategoryMultipleDeleteController;
// Service Center
use App\Http\Controllers\Admin\ServiceCenter\IndexController as ServiceCenterIndexController;
use App\Http\Controllers\Admin\ServiceCenter\CreateController as ServiceCenterCreateController;
use App\Http\Controllers\Admin\ServiceCenter\StoreController as ServiceCenterStoreController;
use App\Http\Controllers\Admin\ServiceCenter\ShowController as ServiceCenterShowController;
use App\Http\Controllers\Admin\ServiceCenter\SearchController as ServiceCenterSearchController;
use App\Http\Controllers\Admin\ServiceCenter\UpdateController as ServiceCenterUpdateController;
use App\Http\Controllers\Admin\ServiceCenter\DeleteController as ServiceCenterDeleteController;
use App\Http\Controllers\Admin\ServiceCenter\MultipleDeleteController as ServiceCenterMultipleDeleteController;
//Partner
use App\Http\Controllers\Admin\Partner\IndexController as PartnerIndexController;
use App\Http\Controllers\Admin\Partner\ShowController as PartnerShowController;
use App\Http\Controllers\Admin\Partner\CreateController as PartnerCreateController;
use App\Http\Controllers\Admin\Partner\StoreController as PartnerStoreController;
use App\Http\Controllers\Admin\Partner\UpdateController as PartnerUpdateController;
use App\Http\Controllers\Admin\Partner\DeleteController as PartnerDeleteController;
use App\Http\Controllers\Admin\Partner\MultipleDeleteController as PartnerMultipleDeleteController;
//Location
use App\Http\Controllers\Admin\Location\IndexController as LocationIndexController;
use App\Http\Controllers\Admin\Location\ShowController as LocationShowController;
use App\Http\Controllers\Admin\Location\CreateController as LocationCreateController;
use App\Http\Controllers\Admin\Location\StoreController as LocationStoreController;
use App\Http\Controllers\Admin\Location\UpdateController as LocationUpdateController;
use App\Http\Controllers\Admin\Location\DeleteController as LocationDeleteController;
//Contacts
use App\Http\Controllers\Admin\ContactUs\IndexController as ContactUsIndexController;
use App\Http\Controllers\Admin\ContactUs\UpdateController as ContactUsUpdateController;
//Customer
use App\Http\Controllers\Admin\Customer\IndexController as CustomerIndexController;
use App\Http\Controllers\Admin\Customer\ShowController as CustomerShowController;
use App\Http\Controllers\Admin\Customer\CreateController as CustomerCreateController;
use App\Http\Controllers\Admin\Customer\StoreController as CustomerStoreController;
use App\Http\Controllers\Admin\Customer\UpdateController as CustomerUpdateController;
use App\Http\Controllers\Admin\Customer\DeleteController as CustomerDeleteController;
use App\Http\Controllers\Admin\Customer\MultipleDeleteController as CustomerMultipleDeleteController;
//User Management
use App\Http\Controllers\Admin\UserManagement\IndexController as UMIndexController;
use App\Http\Controllers\Admin\UserManagement\CreateController as UMCreateController;
use App\Http\Controllers\Admin\UserManagement\ShowController as UMShowController;
use App\Http\Controllers\Admin\UserManagement\DeleteController as UMDeleteController;
use App\Http\Controllers\Admin\UserManagement\UpdateController as UMUpdateController;
use App\Http\Controllers\Admin\UserManagement\StoreController as UMStoreController;
use App\Http\Controllers\Admin\UserManagement\DisableController as UMDisableController;
use App\Http\Controllers\Admin\UserManagement\RoleController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => false, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
//   ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'web'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('product')->as('product.')->group(function () {
        Route::get('/', ProductIndexController::class)->name('list');
        // Route::post('search', ProductSearchController::class)->name('search');
        Route::get('show/{id}', ProductShowController::class)->name('show');
        Route::get('create', ProductCreateController::class)->name('create');
        Route::post('store', ProductStoreController::class)->name('store');
        Route::put('update/{id}', ProductUpdateController::class)->name('update');
        Route::delete('delete/{id}', ProductDeleteController::class)->name('delete');
        Route::post('/multiple-delete', ProductMultipleDeleteController::class)->name('multiple-delete');

        Route::prefix('type')->as('type.')->group(function () {
            Route::get('/', ProductTypeIndexController::class)->name('list');
            Route::get('show/{id}', ProductTypeShowController::class)->name('show');
            Route::get('create', ProductTypeCreateController::class)->name('create');
            Route::post('store', ProductTypeStoreController::class)->name('store');
            Route::put('update/{id}', ProductTypeUpdateController::class)->name('update');
            Route::delete('delete/{id}', ProductTypeDeleteController::class)->name('delete');
            Route::post('/multiple-delete', ProductTypeMultipleDeleteController::class)->name('multiple-delete');
        });
    });

    Route::prefix('about')->as('about.')->group(function () {
        Route::get('/', AboutIndexController::class)->name('index');
        Route::post('update', AboutUpdateController::class)->name('update');
    });

    Route::prefix('news')->as('news.')->group(function () {
        Route::get('/', NewsIndexController::class)->name('list');
        Route::get('create', NewsCreateController::class)->name('create');
        Route::post('store', NewsStoreController::class)->name('store');
        Route::get('show/{id}', NewsShowController::class)->name('show');
        Route::put('update/{id}', NewsUpdateController::class)->name('update');
        Route::delete('delete/{id}', NewsDeleteController::class)->name('delete');
        Route::post('/multiple-delete', NewsMultipleDeleteController::class)->name('multiple-delete');

        Route::prefix('category')->as('category.')->group(function () {
            Route::get('/', CategoryIndexController::class)->name('list');
            Route::post('store', CategoryStoreController::class)->name('store');
            Route::put('update/{id}', CategoryUpdateController::class)->name('update');
            Route::delete('delete/{id}', CategoryDeleteController::class)->name('delete');
            Route::post('/multiple-delete', CategoryMultipleDeleteController::class)->name('multiple-delete');
        });
    });

    Route::prefix('service-center')->as('service-center.')->group(function () {
        Route::get('/', ServiceCenterIndexController::class)->name('list');
        Route::get('create', ServiceCenterCreateController::class)->name('create');
        Route::post('store', ServiceCenterStoreController::class)->name('store');
        Route::post('search', ServiceCenterSearchController::class)->name('search');
        Route::get('show/{id}', ServiceCenterShowController::class)->name('show');
        Route::put('update/{id}', ServiceCenterUpdateController::class)->name('update');
        Route::delete('delete/{id}', ServiceCenterDeleteController::class)->name('delete');
        Route::post('/multiple-delete', ServiceCenterMultipleDeleteController::class)->name('multiple-delete');
    });

    Route::prefix('partner')->as('partner.')->group(function () {
        Route::get('/', PartnerIndexController::class)->name('list');
        Route::get('create', PartnerCreateController::class)->name('create');
        Route::post('store', PartnerStoreController::class)->name('store');
        Route::get('show/{id}', PartnerShowController::class)->name('show');
        Route::put('update/{id}', PartnerUpdateController::class)->name('update');
        Route::delete('delete/{id}', PartnerDeleteController::class)->name('delete');
        Route::post('/multiple-delete', PartnerMultipleDeleteController::class)->name('multiple-delete');
    });

    Route::prefix('contact_us')->as('contact_us.')->group(function () {
        Route::get('/', ContactUsIndexController::class)->name('index');
        Route::post('update', ContactUsUpdateController::class)->name('update');
    });

    Route::prefix('customer')->as('customer.')->group(function () {
        Route::get('/', CustomerIndexController::class)->name('list');
        Route::get('create', CustomerCreateController::class)->name('create');
        Route::post('store', CustomerStoreController::class)->name('store');
        Route::get('show/{id}', CustomerShowController::class)->name('show');
        Route::put('update/{id}', CustomerUpdateController::class)->name('update');
        Route::delete('delete/{id}', CustomerDeleteController::class)->name('delete');
        Route::post('/multiple-delete', CustomerMultipleDeleteController::class)->name('multiple-delete');
    });

    Route::prefix('user-management')->as('user-management.')->group(function () {
        Route::get('/', UMIndexController::class)->name('list');
        Route::get('create', UMCreateController::class)->name('create');
        Route::post('store', UMStoreController::class)->name('store');
        Route::get('show/{id}', UMShowController::class)->name('show');
        Route::put('update/{id}', UMUpdateController::class)->name('update');
        Route::delete('delete/{id}', UMDeleteController::class)->name('delete');
        Route::get('{id}/disable', UMDisableController::class)->name('disable');

        Route::resource('role', RoleController::class);
    });
});


