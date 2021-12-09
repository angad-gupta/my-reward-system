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
Route::group(['prefix' => 'userlog', 'middleware' => ['auth','web']], function () {

	Route::get('/', ['as' => 'userlog.index', 'uses' => 'UserLogController@index']);
    // Route::get('/', 'UserLogController@index')->name('listuserlog');
});
