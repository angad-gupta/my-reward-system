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

Route::prefix('admin')->group(function() {
    Route::get('customer', ['as' => 'customer.index', 'uses' => 'CustomerController@index']);

    Route::get('customer/create', ['as' => 'customer.create', 'uses' => 'CustomerController@create']);
    Route::post('customer/store', ['as' => 'customer.store', 'uses' => 'CustomerController@store']);

    Route::get('customer/edit/{id}', ['as' => 'customer.edit', 'uses' => 'CustomerController@edit'])->where('id','[0-9]+');
    Route::put('customer/update/{id}', ['as' => 'customer.update', 'uses' => 'CustomerController@update'])->where('id','[0-9]+');

    Route::get('customer/delete/{id}', ['as' => 'customer.delete', 'uses' => 'CustomerController@destroy'])->where('id','[0-9]+');
        
        
    Route::get('customer/{id}/reward}', ['as' => 'reward.index', 'uses' => 'CustomerController@reward']);
});