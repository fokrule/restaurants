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
	// Authentication routes...
	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	// Registration routes...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');


	Route::get('/', 'AddrestaurantController@index');
	Route::get('all', 'AddrestaurantController@getAllRestaurants');
 	Route::post('/insert',array('as' =>'store','uses'=>'AddrestaurantController@store'));
	Route::resource('addrest','AddrestaurantController');
	Route::resource('addmenu','AddmenuController');	
	Route::group(['middleware' => 'authm'], function () {
    Route::resource('upcoming','UpcomingFoodController');
    Route::resource('menu','CategoryController');
});
	Route::resource('allcontroller','AllController');
	Route::resource('categorypost','CategoryController');



	//comment
	Route::post('comments/{rest_id}',['uses'=>'CommentController@store', 'as' =>'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);

	Route::resource('search','SearchController');