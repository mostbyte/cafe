<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('', ['as' => 'redirect', 'uses' => 'Admin\\AdminController@index']);

//MAIN ROUTES
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    //ADMIN ROUTES
        Route::get('', ['as' => 'index', 'uses' => 'AdminController@index']);

    //DISH ROUTES
        Route::prefix('dish')->name('dish.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'DishController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'DishController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'DishController@store']);
            Route::delete('destroy/{dishId}', ['as' => 'delete', 'uses' => 'DishController@destroy']);
            Route::get('edit/{dishId}', ['as' => 'edit', 'uses' => 'DishController@edit']);
            Route::match(['put', 'patch'],'update/{dishId}', ['as' => 'update', 'uses' => 'DishController@update']);
        });

    //DISH TYPE ROUTES
        Route::prefix('dishtype')->name('dishtype.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'DishTypeController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'DishTypeController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'DishTypeController@store']);
            Route::delete('destroy/{dishtypeId}', ['as' => 'delete', 'uses' => 'DishTypeController@destroy']);
            Route::get('edit/{dishtypeId}', ['as' => 'edit', 'uses' => 'DishTypeController@edit']);
            Route::match(['put', 'patch'],'update/{dishtypeId}', ['as' => 'update', 'uses' => 'DishTypeController@update']);
        });

    //TABLE ROUTES
        Route::prefix('table')->name('table.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'TableController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TableController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TableController@store']);
            Route::delete('destroy/{tableId}', ['as' => 'delete', 'uses' => 'TableController@destroy']);
            Route::get('edit/{tableId}', ['as' => 'edit', 'uses' => 'TableController@edit']);
            Route::match(['put', 'patch'],'update/{tableId}', ['as' => 'update', 'uses' => 'TableController@update']);
        });

    //USER ROUTES
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::delete('destroy/{userId}', ['as' => 'delete', 'uses' => 'UserController@destroy']);
            Route::get('edit/{userId}', ['as' => 'edit', 'uses' => 'UserController@edit']);
            Route::match(['put', 'patch'],'update/{userId}', ['as' => 'update', 'uses' => 'UserController@update']);
        });
});
