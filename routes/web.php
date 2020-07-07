<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index')->name('products.index');
Route::get('/admin/products/create', 'ProductController@create')->name('products.create');
Route::post('/admin/products', 'ProductController@store')->name('products.store');
Route::get('/admin/products/{product}', 'ProductController@show')->name('products.show');
Route::get('/admin/products/{product}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/admin/products/{product}', 'ProductController@update')->name('products.update');
Route::delete('/admin/products/{product}', 'ProductController@destroy')->name('products.destroy');

Route::get('/admin/users', 'UserController@index')->name('users.index');
Route::get('/admin/users/create', 'UserController@create')->name('users.create');
Route::post('/admin/users', 'UserController@store')->name('users.store');
Route::get('/admin/users/{user}', 'UserController@show')->name('users.show');
Route::get('/admin/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/admin/users/{user}', 'UserController@update')->name('users.update');
Route::delete('/admin/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('/cart/get-cart', 'CartController@getCart')->name('cart.get');
Route::get('/cart/add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::put('/cart/update-cart/{id}', 'CartController@updateItem')->name('cart.update'); 
Route::delete('/cart/remove-from-cart/{id}', 'CartController@removeItem')->name('cart.remove');