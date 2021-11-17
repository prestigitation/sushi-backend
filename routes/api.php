<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

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
    Route::get('index_page', [
        'as' => 'get_index_page_products',
        'uses' => 'App\Http\Controllers\ProductController@getIndexPageProducts'
    ]);
});
Route::group([
    'prefix' => 'category'
], function ($router) {
    Route::get('grid_banner', [
        'as' => 'get_banner_images',
        'uses' => 'App\Http\Controllers\CategoryController@getBannerCategories'
    ]);
});


Route::apiResource('product', ProductController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('role', RoleController::class)->except(['show']);



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    Route::post('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', [ 'as' => 'register', 'uses' => 'AuthController@register']);
});
