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

// Authentication Routes
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', 'UserController@index');
    Route::get('/report', 'UserController@report');
    Route::get('/devices', 'UserController@devices');
    
    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@doUpdateProfile');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/devices/add', 'UserController@showAddDevice');
    Route::post('/devices/add', 'UserController@doAddDevice');
    
    Route::get('/users', 'UserController@showUsers');
    Route::get('/users/add', 'UserController@showAddUser');
    Route::post('/users/add', 'UserController@doAddUser');
    
    Route::get('/devices/{id}', 'UserController@showEditDevice');
    Route::post('/devices/{id}', 'UserController@doEditDevice');
    
    Route::get('/devices/delete/{id}', 'UserController@doDeleteDevice');
});

