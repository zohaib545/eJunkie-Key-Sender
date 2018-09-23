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

Route::group(['prefix' => 'games'], function () {
    Route::get('', 'GamesController@index');
    Route::get('create', 'GamesController@create');
    Route::get('{game}/edit', 'GamesController@edit');
    Route::get('{game}/keys', 'KeysController@index');
    Route::get('{game}/keys/upload', 'KeysController@upload');
    Route::post('', 'GamesController@store');
    Route::put('', 'GamesController@update');
    Route::delete('', 'GamesController@delete');
    Route::delete('{game}/keys', 'KeysController@delete');
});

Route::group(['prefix' => 'bundles'], function(){
    Route::get('', 'BundlesController@index');
});

Route::group(['prefix' => 'keys'], function () {
    Route::post('', 'KeysController@add');
});

Route::get('/', function () {
    return redirect('games');
});

Route::get('blank', function () {
    return view('blank');
});
