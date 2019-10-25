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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes(['register'=>false]);

Route::name('vaults.')->group(function(){
  Route::get('/index', 'VaultsController@index')->name('index');
  Route::get('/create', 'VaultsController@create')->name('create');
  Route::get('{vault}', 'VaultsController@show')->name('show');

  Route::post('loadDataForm', 'VaultsController@ajaxDataForm')->name('ajaxDataForm');
  Route::post('save','VaultsController@save')->name('save');
  Route::post('update','VaultsController@update')->name('update');
});

