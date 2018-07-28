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

Route::get('/', 'WeatherController@weather');

Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/products', 'ProductController@index')->name('products');

Route::get('/order/{id?}', 'OrderController@order')->name('order');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::resource('/order', 'OrderController');
});