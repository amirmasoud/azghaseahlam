<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*get('/', ['uses' => 'ThemeController@home', 'as' => 'home']);
get('/about', ['uses' => 'ThemeController@about', 'as' => 'about']);
get('/contact', ['uses' => 'ThemeController@contact', 'as' => 'contact']);
*/

get('/', function() {
	return view('angular');
});
get('/about', function() {
	return view('angular');
});


// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'api'], function() {
	get('/images', 'Api\ImagesController@all');
	get('/images/{id}', 'Api\ImagesController@singular');
});
