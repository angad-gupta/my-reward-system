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


Route::prefix('')->group(function() {
    
    Route::get('admin/permission-denied', ['as' => 'permission.denied', 'uses' => 'LoginController@permissionDenied']);
    
    //Login
    Route::get('/', ['as' => 'cms', 'uses' => 'LoginController@login']);
    Route::get('/cms', ['as' => 'cms', 'uses' => 'LoginController@login']);
    Route::post('login', ['as' => 'login-post', 'uses' => 'LoginController@authenticate']);

    //Change Password

    Route::get('change-password',['as'=>'change-password','uses' => 'LoginController@changePassword']);
    Route::post('update-password',['as'=>'update-password','uses'=>'LoginController@updatePassword']);
    
    //Logout
    Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth','web']], function () {

    Route::get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);

    Route::get('role/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
    Route::post('role/store', ['as' => 'role.store', 'uses' => 'RoleController@store']);

    Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'RoleController@edit'])->where('id','[0-9]+');
    Route::put('role/update/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update'])->where('id','[0-9]+');

    Route::get('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'RoleController@destroy'])->where('id','[0-9]+');
});
