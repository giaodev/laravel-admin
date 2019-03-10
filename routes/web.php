<?php

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
    return view('welcome');
});
/* Route Login */
Route::get('gadmin' , 'LoginController@index');
/* Group Admin */
Route::namespace('Admin')->group(function(){
    Route::prefix('admin')->group(function(){
        /* Group User */
        Route::prefix('user')->group(function(){
            Route::get('/', 'UserController@getIndex')->name('user.index');
            Route::get('add', 'UserController@getAdd')->name('user.add');
            Route::post('add', 'UserController@postAdd')->name('user.add');
            Route::get('edit/{id}', 'UserController@getEdit')->name('user.edit');
            Route::post('edit/{id}', 'UserController@postEdit')->name('user.edit');
            Route::get('delete/{id}', 'UserController@getDelete')->name('user.delete');
        });
        /* Group Category */
        Route::prefix('category')->group(function(){
            Route::get('/', 'CategoryController@getIndex')->name('category.index');
            Route::post('/', 'CategoryController@postIndex')->name('category.index');
            Route::get('add', 'CategoryController@getAdd')->name('category.add');
            Route::post('add', 'CategoryController@postAdd')->name('category.add');
            Route::get('edit/{id}', 'CategoryController@getEdit')->name('category.edit');
            Route::post('edit/{id}', 'CategoryController@postEdit')->name('category.edit');
            Route::get('delete/{id}', 'CategoryController@getDelete')->name('category.delete');
            Route::get('show', 'CategoryController@getShow')->name('category.show');
        });
        /* Group Product */
        Route::prefix('product')->group(function(){
            Route::get('/', 'ProductController@getIndex')->name('product.index');
            Route::get('add', 'ProductController@getAdd')->name('product.add');
            Route::post('add', 'ProductController@postAdd')->name('product.add');
            Route::get('edit', 'ProductController@getEdit')->name('product.edit');
            Route::get('edit/{id}', 'ProductController@postEdit')->name('product.edit');
            Route::get('delete/{id}', 'ProductController@getDelete')->name('product.delete');
        });
    });
});
