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
Route::get('gadmin' , 'LoginController@getIndex')->name('login');
Route::post('gadmin' , 'LoginController@postIndex')->name('login');
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
            Route::get('edit/{id}', 'ProductController@getEdit')->name('product.edit');
            Route::post('edit/{id}', 'ProductController@postEdit')->name('product.edit');
            Route::get('delete/{id}', 'ProductController@getDelete')->name('product.delete');
        });
        /* Group Attr */
        Route::prefix('attr')->group(function(){
            Route::get('/', 'AttrController@getIndex')->name('attr.index');
            Route::post('/', 'AttrController@postIndex')->name('attr.index');
            Route::get('add', 'AttrController@getAdd')->name('attr.add');
            Route::post('add', 'AttrController@postAdd')->name('attr.add');
            Route::get('edit/{id}', 'AttrController@getEdit')->name('attr.edit');
            Route::post('edit/{id}', 'AttrController@postEdit')->name('attr.edit');
            Route::get('delete/{id}', 'AttrController@getDelete')->name('attr.delete');
        });
        /* Group New */
        Route::prefix('new')->group(function(){
            Route::get('/', 'NewController@getIndex')->name('new.index');
            Route::post('/', 'NewController@postIndex')->name('new.index');
            Route::get('add', 'NewController@getAdd')->name('new.add');
            Route::post('add', 'NewController@postAdd')->name('new.add');
            Route::get('edit/{id}', 'NewController@getEdit')->name('new.edit');
            Route::post('edit/{id}', 'NewController@postEdit')->name('new.edit');
            Route::get('delete/{id}', 'NewController@getDelete')->name('new.delete');
        });
    });
});
