<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->name('users.')->group(function () {
    Route::get('/', 'UsersController@index')->name('index');
    Route::get('create_user', 'UsersController@createView')->name('create');
    Route::post('store', 'UsersController@store')->name('store');
    Route::get('edit/{user}', 'UsersController@edit')->name('edit');
    Route::post('update/{user}', 'UsersController@update')->name('update');
    Route::post('delete/{user}', 'UsersController@delete')->name('delete');
});
