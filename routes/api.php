<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    echo "api rodando";
});

Route::group(['middleware' => ['apiJwt', 'checkUserType'], 'prefix' => 'auth',], function ($router) {

    //User
    Route::middleware(['checkUser'])->group(function () {
        Route::post('user-update/{id}', 'V1\\UserController@update');
        Route::get('user-show/{id}', 'V1\\UserController@show');
    });
    
    //Products
    Route::post('register-product', 'V1\\ProductController@store');
    Route::get('product-show/{id}', 'V1\\ProductController@show');
    Route::post('product-update/{id}', 'V1\\ProductController@update');
    Route::get('product-all/{status?}/{numberPaginator?}', 'V1\\ProductController@index');
    
    //Favorite
    Route::post('register-favorite', 'V1\\FavoriteController@store');
    Route::get('favorite-show/{id}', 'V1\\FavoriteController@show');    
    
    //Wish List
    Route::post('register-wish-list', 'V1\\WishListController@store');
    Route::get('wish-list-show/{id}', 'V1\\WishListController@show');    
    Route::get('wish-list-all', 'V1\\WishListController@index');    

    //User Type
    Route::middleware(['blockRoute'])->group(function () {
        Route::post('user-type-register', 'V1\\UserTypeController@store');
        Route::post('user-type-update/{id}', 'V1\\UserTypeController@update');

        Route::get('user-type-show/{id}', 'V1\\UserTypeController@show');
        Route::get('user-type', 'V1\\UserTypeController@index');

    });
});

Route::group(['prefix' => ''], function ($router) {
    Route::post('register-user', 'V1\\UserController@store');
    Route::post('login', 'V1\\AuthController@login');
    Route::get('example-weather/{id}', 'V1\\ExampleWeatherCotroller@show');
    Route::get('product-all/{status}/{numberPaginator?}', 'V1\\ProductController@index');
});
