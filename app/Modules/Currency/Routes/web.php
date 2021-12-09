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
    Route::get('currency', ['as' => 'currency.index', 'uses' => 'CurrencyController@index']);

    Route::get('currency/create', ['as' => 'currency.create', 'uses' => 'CurrencyController@create']);
    Route::post('currency/store', ['as' => 'currency.store', 'uses' => 'CurrencyController@store']);

    Route::get('currency/edit/{id}', ['as' => 'currency.edit', 'uses' => 'CurrencyController@edit'])->where('id','[0-9]+');
    Route::put('currency/update/{id}', ['as' => 'currency.update', 'uses' => 'CurrencyController@update'])->where('id','[0-9]+');

    Route::get('currency/delete/{id}', ['as' => 'currency.delete', 'uses' => 'CurrencyController@destroy'])->where('id','[0-9]+');
        
         
});
