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
Route::get('gadmin' , 'LoginController@index');
Route::namespace('Admin')->group(function(){
    Route::prefix('admin')->group(function(){
        /* Group User */
        Route::prefix('user')->group(function(){
            Route::get('/', 'UserController@index')->name('user.index');
        });
    });
});
