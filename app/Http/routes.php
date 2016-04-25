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

Route::get('/{author?}', [
	'uses' => 'QuoteController@getIndex',
	'as' => 'index'
]);

Route::post('/new', [
	'uses' => 'QuoteController@postQuote',
	'as' => 'create'
]);
Route::get('/delete/{quote_id}', [
	'uses' => 'QuoteController@deleteQuote',
	'as' => 'delete'
]);
Route::get('/author/{author_id}', [
	'uses' => 'QuoteController@getAuthorQuotes',
	'as' => 'author'
]);
Route::get('/gotemail/{author_name}', [
	'uses' => 'QuoteController@getMailCallback',
	'as' => 'mail_callback'
]);
Route::group(['middleware' => 'auth'], function(){

	Route::get('/admin/dashboard', [
		'uses' => 'AdminController@getDashboard',
		'as' => 'admin.dashboard'
	]);
	Route::get('/admin/logout', [
		'uses' => 'AdminController@getLogout',
		'as' => 'admin.logout'
	]);
});

Route::group(['middleware' => 'guest'], function(){
	Route::get('/admin/login', [
		'uses' => 'AdminController@getLogin',
		'as' => 'admin.login'
	]);
	Route::post('/admin/login', [
		'uses' => 'AdminController@postLogin',
		'as' => 'admin.login'
	]);
});
