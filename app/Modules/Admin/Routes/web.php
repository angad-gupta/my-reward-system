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

Route::group(['prefix' => 'admin', 'middleware' => ['auth','web']], function () {
 
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
});


Route::post('admin/convert/eng-to-nep', 'DateConverterController@eng_to_nep');