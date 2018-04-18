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
/* Route for user */
Route::get('', 'PagesController@getindex')->name('home');
/* Display front */
Route::get('category/{slug}','PagesController@getCategory');
Route::get('post/{slug}.html','PagesController@getPost');
Route::get('tag/{tag}','PagesController@getTag');
Route::get('author/{name}','PagesController@getAuthor');
Route::get('search','PagesController@getSearch')->name('search');
Route::get('contact.html','PagesController@getContact');
Route::get('huongdan','PagesController@gethuongdan');
Route::get('gioithieu','PagesController@getgioithieu');

Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')->name('login');
Route::get('logout', 'LoginController@getLogout');

/*Group router for author and admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/', 'HomeController@getdashbroad')->name('dashbroad');
	/* Group for profile */
    Route::get('profile', 'ProfileController@getProfile');
    Route::post('profile/update', 'ProfileController@profileUpdate');

    /* Group post*/
    Route::prefix('post')->group(function () {
        Route::get('/', 'PostController@getList')->name('list-post');
        Route::get('add', 'PostController@getAdd');
        Route::put('updateStatus', 'PostController@updateStatus');
        Route::put('updateHot', 'PostController@updateHot');
        Route::post('add', 'PostController@postAdd');
        Route::get('update/{id}', 'PostController@getUpdate');
        Route::post('update/{id}', 'PostController@postUpdate');
        Route::get('delete/{id}', 'PostController@getDelete');
    });
    /*Group vanban*/
    Route::prefix('vanban')->group(function () {
        Route::get('/', 'vanbanController@getList')->name('list-vanban');
        Route::get('add', 'vanbanController@getAdd');
        Route::post('add', 'vanbanController@vanbanAdd');
        Route::get('update/{id}', 'vanbanController@getUpdate');
        Route::post('update/{id}', 'vanbanController@vanbanUpdate');
        Route::get('delete/{id}', 'vanbanController@getDelete');
    });

       /*Group khachhang*/
       Route::prefix('khachhang')->group(function () {
        Route::get('/', 'khachhangController@getList')->name('list-khachhang');
        Route::get('delete/{id}', 'khachhangController@getDelete');
    });
    
    /* Group for admin */
    Route::middleware(['role'])->group(function () {
        /* Group category */
        Route::prefix('category')->group(function () {
            Route::get('/', 'CategoryController@getList');
            Route::get('add', 'CategoryController@getAdd');
            Route::post('add', 'CategoryController@postAdd');
            Route::get('data', 'CategoryController@dataTable')->name('data');
            Route::post('update', 'CategoryController@postUpdate');
            Route::delete('delete', 'CategoryController@delete');
        });
        /* Group file */
        Route::prefix('tag')->group(function () {
            Route::get('/', 'TagController@getList')->name('list-tag');
            Route::get('data', 'TagController@dataTable')->name('data-tag');
            Route::post('add', 'TagController@postAdd');
            Route::put('update', 'TagController@putUpdate');
            Route::delete('delete', 'TagController@delete');
        });
        /* Group author */
        Route::prefix('author')->group(function () {
            Route::get('/', 'AdminController@getList')->name('list-author');
            Route::get('data', 'AdminController@dataTable')->name('data-author');
            Route::post('add', 'AdminController@postAdd');
            Route::delete('delete', 'AdminController@delete');
        });
    });
});
Route::get('vanban/detail/{id}','vanbanController@getdetail');
Route::get('test','khachhangController@getinfo');
Route::prefix('khachhang')->group(function () {
    Route::get('', 'khachhangController@getRegister');
    Route::get('data', 'khachhangController@dataTable');
    Route::post('register', 'khachhangController@register');
    Route::get('dangkythanhcong', function(){
        return view('news.pages.khachhang.camon');
    })->name('thanks');
});