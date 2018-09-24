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

Route::get('login', 'UserController@login_index')->name('login')->middleware('guest');
Route::get('logout', 'UserController@logout');
Route::post('login', 'UserController@login');
Route::post('keygen', 'KeygenController@send_keys')->middleware('ejunkie');

Route::middleware('auth')->group(function () {
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
        Route::delete('{game}/keys/all', 'KeysController@delete_all');
    });

    Route::group(['prefix' => 'bundles'], function () {
        Route::get('', 'BundlesController@index');
        Route::get('create', 'BundlesController@create');
        Route::get('{bundle}/edit', 'BundlesController@edit');
        Route::post('', 'BundlesController@store');
        Route::put('', 'BundlesController@update');
        Route::delete('', 'BundlesController@delete');
    });

    Route::group(['prefix' => 'packages'], function () {
        Route::get('', 'PackagesController@index');
        Route::get('create', 'PackagesController@create');
        Route::get('{package}/edit', 'PackagesController@edit');
        Route::post('', 'PackagesController@store');
        Route::put('', 'PackagesController@update');
        Route::delete('', 'PackagesController@delete');
    });

    Route::group(['prefix' => 'keys'], function () {
        Route::post('', 'KeysController@add');
    });
   
    Route::group(['prefix' => 'profile'], function () {
        Route::get('', 'UserController@profile');
        Route::post('', 'UserController@update_profile');
    });
    
    Route::group(['prefix' => 'purchases'], function () {
        Route::get('', 'PurchasesController@index');
    });
    
    Route::group(['prefix' => 'downloads'], function () {
        Route::get('', 'DownloadsController@index');
        Route::post('game-keys', 'DownloadsController@download_unused_codes');
        Route::post('game-keys-limited', 'DownloadsController@download_codes');
        Route::post('emails', 'DownloadsController@download_emails');
    });

    Route::get('/', function () {
        return redirect('games');
    });
});

Route::get('blank', function () {
    return view('blank');
});
