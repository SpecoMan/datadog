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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'vehicles', 'middleware' => 'admin'], function(){
    Route::get('/', ['as' => 'vehicles', 'uses' => 'VehiclesController@index']);
    Route::post('create', ['as' => 'vehicles.create', 'uses' => 'VehiclesController@create']);
    Route::post('edit', ['as' => 'vehicles.edit', 'uses' => 'VehiclesController@edit']);
    Route::post('delete', ['as' => 'vehicles.delete', 'uses' => 'VehiclesController@delete']);
});

Route::group(['prefix' => 'fuel_rates', 'middleware' => 'admin'], function(){
    Route::get('/', ['as' => 'fuel_rates', 'uses' => 'FuelRatesController@index']);
    Route::post('create', ['as' => 'fuel_rates.create', 'uses' => 'FuelRatesController@create']);
    Route::post('edit', ['as' => 'fuel_rates.edit', 'uses' => 'FuelRatesController@edit']);

});

Route::group(['prefix' => 'users_travel_data', 'middleware' => 'admin'], function() {
    Route::get('/', ['as' => 'users_travel_data', 'uses' => 'UserTravelDataController@index']);
});

Route::group(['prefix' => 'travel_data', 'middleware' => 'web'], function() {
    Route::get('/', ['as' => 'travel_data', 'uses' => 'TravelDataController@index']);
    Route::post('create', ['as' => 'travel_data.create', 'uses' => 'TravelDataController@create']);
});
