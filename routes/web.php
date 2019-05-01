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

/* Group Front End */
Route::namespace('Frontend')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('{slug}.html','HomeController@check_slug')->name('check_slug');
    Route::get('add_cart/{id}','HomeController@add_cart')->name('add_cart');
    Route::get('gio-hang','HomeController@cart')->name('cart');
    Route::get('remove_cart/{id}','HomeController@remove_cart')->name('remove_cart');
    Route::post('update_cart','HomeController@update_cart')->name('update_cart');
    Route::get('cart_clear','HomeController@cart_clear')->name('cart_clear');
    Route::get('thanh-toan','HomeController@getPay')->name('pay');
    Route::post('thanh-toan','HomeController@postPay')->name('pay');
});
/* Route Login */
Route::get('admin' , 'LoginController@getIndex')->name('login');
Route::post('admin' , 'LoginController@postIndex')->name('login');
Route::get('/logout', function(){
   Auth::logout();
   return redirect()->route('login');
});
/* Group Admin */
Route::namespace('Admin')->middleware('checklogin')->group(function(){
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
            Route::get('search', 'ProductController@getSearch')->name('product.search');
            Route::get('add', 'ProductController@getAdd')->name('product.add');
            Route::post('add', 'ProductController@postAdd')->name('product.add');
            Route::get('edit/{id}', 'ProductController@getEdit')->name('product.edit');
            Route::post('edit/{id}', 'ProductController@postEdit')->name('product.edit');
            Route::get('delete/{id}', 'ProductController@getDelete')->name('product.delete');
            Route::get('deleteall', 'ProductController@getDeleteAll')->name('product.deleteall');
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
        Route::prefix('news')->group(function(){
            Route::get('/', 'NewsController@getIndex')->name('news.index');
            Route::post('/', 'NewsController@postIndex')->name('news.index');
            Route::get('search', 'NewsController@getSearch')->name('news.search');
            Route::get('add', 'NewsController@getAdd')->name('news.add');
            Route::post('add', 'NewsController@postAdd')->name('news.add');
            Route::get('edit/{id}', 'NewsController@getEdit')->name('news.edit');
            Route::post('edit/{id}', 'NewsController@postEdit')->name('news.edit');
            Route::get('delete/{id}', 'NewsController@getDelete')->name('news.delete');
        });

        /* Group Tag */
        Route::prefix('tag')->group(function(){
            Route::get('/', 'TagController@getIndex')->name('tag.index');
            Route::post('/', 'TagController@postIndex')->name('tag.index');
            Route::get('add', 'TagController@getAdd')->name('tag.add');
            Route::post('add', 'TagController@postAdd')->name('tag.add');
            Route::get('edit/{id}', 'TagController@getEdit')->name('tag.edit');
            Route::post('edit/{id}', 'TagController@postEdit')->name('tag.edit');
            Route::get('delete/{id}', 'TagController@getDelete')->name('tag.delete');
        });
        /* Group Images */
        Route::prefix('images')->group(function(){
            Route::get('/', 'ImagesController@getIndex')->name('image.index');
            Route::post('/', 'ImagesController@postIndex')->name('image.index');
            Route::get('add', 'ImagesController@getAdd')->name('image.add');
            Route::post('add', 'ImagesController@postAdd')->name('image.add');
            Route::get('edit/{id}', 'ImagesController@getEdit')->name('image.edit');
            Route::post('edit/{id}', 'ImagesController@postEdit')->name('image.edit');
            Route::get('delete/{id}', 'ImagesController@getDelete')->name('image.delete');
        });
        /* Group Setting */
        Route::prefix('setting')->group(function(){
            Route::get('/', 'SettingController@getIndex')->name('setting.index');
            Route::post('/', 'SettingController@postIndex')->name('setting.index');
        });
    });
});
