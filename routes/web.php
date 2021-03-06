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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* 課題3.http://XXXXXX.jp/XXX というアクセスが来たときに、 
AAAControllerのbbbというAction に渡すRoutingの設定*/
Route::get('XXX','AAAControleer@bbb');

/* 課題4.admin/profile/create にアクセスしたら ProfileController の add Action に、
admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てる*/
Route::group(['prefix' => 'admin','middleware'=> 'auth'], function() {
    Route::get('news/create','Admin\NewsController@add');
    Route::get('news/edit','Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::post('news/create','Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/delete', 'Admin\NewsController@delete');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile', 'Admin\ProfileController@index');
    Route::get('profile/delete', 'Admin\ProfileController@delete');
});


Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');

