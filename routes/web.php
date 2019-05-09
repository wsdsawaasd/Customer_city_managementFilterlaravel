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
});
Route::group(['prefix' => 'cities'], function () {
    Route::get('/','CityController@index')->name('cities.index');
    Route::get('/{id}/edit','CityController@edit')->name('cities.edit');
    Route::post('/{id}/edit','CityController@update')->name('cities.update');
    Route::get('/create','CityController@create')->name('cities.create');
    Route::post('/create','CityController@store')->name('cities.store');
    Route::get('/{id}/delete','CityController@destroy')->name('cities.destroy');
    Route::get('/Customer','CityController@customers')->name('cities.customers');
    Route::get('/CustomerIndex','CustomerController@index')->name('customers.index');
    Route::get('/CustomerCreate','CustomerController@create')->name('customers.create');
    Route::post('/CustomerCreate','CustomerController@store')->name('customers.store');
    Route::get('/{id}/Customer','CustomerController@edit')->name('customers.edit');
    Route::post('/{id}/Customer','CustomerController@update')->name('customers.update');
    Route::get('/{id}/CustomerDelete','CustomerController@destroy')->name('customers.destroy');
    Route::get('/City','CustomerController@City')->name('customers.City');
    Route::get('/filter','CustomerController@filterByCity')->name('customers.filterByCity');


});