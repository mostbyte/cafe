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
Route::prefix('admin')->middleware(['auth', 'checkRole'])->name('admin.')->namespace('Admin')->group(function () {
    //ADMIN ROUTES
        Route::get('', ['as' => 'index', 'uses' => 'AdminController@index']);

    //DISH ROUTES
        Route::prefix('dish')->name('dish.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'DishController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'DishController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'DishController@store']);
            Route::delete('destroy/{dish}', ['as' => 'delete', 'uses' => 'DishController@destroy']);
            Route::get('edit/{dish}', ['as' => 'edit', 'uses' => 'DishController@edit']);
            Route::match(['put', 'patch'],'update/{dish}', ['as' => 'update', 'uses' => 'DishController@update']);
        });

    //DISH TYPE ROUTES
        Route::prefix('dishtype')->name('dishtype.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'DishTypeController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'DishTypeController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'DishTypeController@store']);
            Route::delete('destroy/{dishType}', ['as' => 'delete', 'uses' => 'DishTypeController@destroy']);
            Route::get('edit/{dishType}', ['as' => 'edit', 'uses' => 'DishTypeController@edit']);
            Route::match(['put', 'patch'],'update/{dishType}', ['as' => 'update', 'uses' => 'DishTypeController@update']);
        });

    //TABLE ROUTES
        Route::prefix('table')->name('table.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'TableController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'TableController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'TableController@store']);
            Route::delete('destroy/{table}', ['as' => 'delete', 'uses' => 'TableController@destroy']);
            Route::get('edit/{table}', ['as' => 'edit', 'uses' => 'TableController@edit']);
            Route::put('update', ['as' => 'update', 'uses' => 'TableController@update']);
        });

    //USER ROUTES
        Route::prefix('user')->middleware(['auth', 'checkAdmin'])->name('user.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::delete('destroy/{user}', ['as' => 'delete', 'uses' => 'UserController@destroy']);
            Route::get('edit/{user}', ['as' => 'edit', 'uses' => 'UserController@edit']);
            Route::match(['put', 'patch'],'update/{user}', ['as' => 'update', 'uses' => 'UserController@update']);
        });

    //PRODUCT ROUTES
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('', ['as' => 'index', 'uses' => 'ProductController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'ProductController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'ProductController@store']);
            Route::delete('destroy/{product}', ['as' => 'delete', 'uses' => 'ProductController@destroy']);
            Route::get('edit/{product}', ['as' => 'edit', 'uses' => 'ProductController@edit']);
            Route::match(['put', 'patch'],'update/{product}', ['as' => 'update', 'uses' => 'ProductController@update']);
        });
});
