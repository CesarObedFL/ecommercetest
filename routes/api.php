<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

 Route::group(['middleware' => 'auth:api'], function() {
	Route::resource('users', 'Api\UserController', ['only' => ['index','show','store','update','destroy']]);
	Route::resource('products', 'Api\ProductController', ['only' => ['index','show','store','update','destroy']]);
	Route::get('/logout', 'Api\AuthController@logout');
});

Route::post('/signup', 'Api\AuthController@signup');
Route::post('/login', 'Api\AuthController@login');
