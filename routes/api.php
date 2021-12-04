<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Symfony\Component\HttpFoundation\Response;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group([
    'prefix' => 'product'
], function ($router) {
    Route::get('index_page/products_list', [
        'as' => 'get_index_page_products',
        'uses' => 'App\Http\Controllers\ProductController@getIndexPageProducts'
    ]);
    Route::get('index_page/carousel', [
        'as' => 'get_index_page_carousel',
        'uses' => 'App\Http\Controllers\ProductController@getIndexPageCarousel'
    ]);
    Route::get('{slug}', [
        'as' => 'get_product_by_slug',
        'uses' => 'App\Http\Controllers\ProductController@findBySlug'
    ]);

});
Route::group([
    'prefix' => 'category'
], function () {
    Route::get('grid_banner', [
        'as' => 'get_banner_images',
        'uses' => 'App\Http\Controllers\CategoryController@getBannerCategories'
    ]);
    Route::get('category_page/{slug}', [
        'as' => 'get_category_and_products',
        'uses' => 'App\Http\Controllers\CategoryController@getBySlug'
    ]);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'dashboard'
], function () {
    Route::get('access', function (Request $request) {
        return new Response('',200);
    });
    Route::get('couriers', [
        'as' => 'get_couriers',
        'uses' => 'App\Http\Controllers\UserController@getCouriers'
    ]);
    Route::get('couriers/{courier_id}/orders', [
        'as' => 'get_courier_orders',
        'uses' => 'App\Http\Controllers\OrderController@getCourierOrders'
    ]);
    Route::get('admins', [
        'as' => 'get_admins',
        'uses' => 'App\Http\Controllers\UserController@getAdmins'
    ]);
    Route::get('user', [
        'as' => 'get_user',
        'uses' => 'App\Http\Controllers\UserController@show'
    ]);




    Route::post('orders/{order_id}/couriers/{courier_id}', [
        'as' => 'attach_courier_to_order',
        'uses' => 'App\Http\Controllers\OrderController@attachToCourier'
    ]);
    Route::post('orders/{order_id}/take', [
        'as' => 'take_courier_order',
        'uses' => 'App\Http\Controllers\OrderController@takeOrder'
    ]);
    Route::post('orders/{order_id}/complete', [
        'as' => 'complete_courier_order',
        'uses' => 'App\Http\Controllers\OrderController@completeOrder'
    ]);
});



Route::apiResource('product', ProductController::class)->except(['show']);
Route::apiResource('category', CategoryController::class)->except(['show']);
Route::apiResource('role', RoleController::class)->except(['show']);
Route::apiResource('order', OrderController::class);
Route::apiResource('user', UserController::class)->except(['show']);



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'
], function ($router) {
    Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', [ 'as' => 'register', 'uses' => 'AuthController@register'])->middleware('throttle:1,5');
});
