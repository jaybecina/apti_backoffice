<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ServiceCenterController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\CustomerController;

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

Route::prefix('v1')->as('v1.')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/featured-products', 'featuredProducts');
        Route::get('/products', 'products');
        Route::get('/product/{id}', 'getProductPerId');
        Route::get('/product-types', 'products_types');
        Route::post('/product-filter', 'product_filter');
        Route::get('/{product_type_id}/products', 'products_per_product_type');
    });
    Route::controller(NewsController::class)->group(function () {
        Route::get('/news', 'news');
        Route::get('/news/{id}', 'getNewsPerId');
        Route::get('/news-category', 'news_category');
    });
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about', 'about');
    });
    Route::controller(ServiceCenterController::class)->group(function () {
        Route::get('/service-center/{id}', 'getServiceCentersPerId');
        Route::get('/service-centers', 'service_centers');
        Route::post('/service-centers', 'service_centers_search');
    });
    Route::controller(PartnerController::class)->group(function () {
        Route::get('/partners', 'partners');
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'customers');
        Route::post('/customers', 'customers_by_type');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
