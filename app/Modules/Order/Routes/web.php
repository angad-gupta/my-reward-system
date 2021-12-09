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
    Route::get('order', ['as' => 'order.index', 'uses' => 'OrderController@index']);

    Route::get('order/create', ['as' => 'order.create', 'uses' => 'OrderController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'OrderController@store']);

    Route::get('order/edit/{id}', ['as' => 'order.edit', 'uses' => 'OrderController@edit'])->where('id','[0-9]+');
    Route::put('order/update/{id}', ['as' => 'order.update', 'uses' => 'OrderController@update'])->where('id','[0-9]+');

    Route::get('order/delete/{id}', ['as' => 'order.delete', 'uses' => 'OrderController@destroy'])->where('id','[0-9]+');
        
    Route::get('order/complete/{id}', ['as' => 'order.complete', 'uses' => 'OrderController@complete']);
});
