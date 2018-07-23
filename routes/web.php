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


 // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//user
Route::get('/', 'PageController@index')->name('home');
//cart
Route::get('cart', 'CartController@index')->name('cart.index');
Route::delete('cart/clear', 'CartController@clear')->name('cart.clear');
Route::patch('cart/{cart}', 'CartController@update')->name('cart.update');
Route::post('cart/{product}', 'CartController@store')->name('cart.store');
Route::delete('cart/{cart}', 'CartController@destroy')->name('cart.destroy');


//admin
Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
