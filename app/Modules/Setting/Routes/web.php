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

Route::prefix('setting')->group(function() {
    Route::get('/', 'SettingController@index');
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission']], function () {

    /*
    |--------------------------------------------------------------------------
    | setting CRUD ROUTE
    |--------------------------------------------------------------------------
    */
    Route::get('setting', ['as' => 'setting.index', 'uses' => 'SettingController@index']);

    Route::get('setting/create', ['as' => 'setting.create', 'uses' => 'SettingController@create']);
    Route::post('setting/store', ['as' => 'setting.store', 'uses' => 'SettingController@store']);
    Route::get('setting/edit/{id}', ['as' => 'setting.edit', 'uses' => 'SettingController@edit'])->where('id', '[0-9]+');
    Route::put('setting/update/{id}', ['as' => 'setting.update', 'uses' => 'SettingController@update'])->where('id', '[0-9]+');
    Route::get('setting/delete/{id}', ['as' => 'setting.delete', 'uses' => 'SettingController@destroy'])->where('id', '[0-9]+');

    Route::post('setting/updatebasicsetting/{id}', ['as' => 'setting.updatebasicsetting', 'uses' => 'SettingController@updatebasicSetting'])
        ->where('id', '[0-9]+');
    Route::post('setting/basicsetting', ['as' => 'setting.basicsetting', 'uses' => 'SettingController@basicSetting']);
 





});

