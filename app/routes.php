<?php

Route::get('/', 'HomeController@index')->before('auth');

Route::get('mybets', 'HomeController@mybets')->before('auth');

/**
 * Sessions routes
 */
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions','SessionsController');
Route::post('newuser','SessionsController@newuser');

//EVENTS.PHP

Route::get('events/{id}', 'EventsController@index')->before('auth');

//POSTS

Route::post('/', 'EventsController@addToBetslip');
Route::post('/createBet', 'EventsController@placeBet');
Route::post('/levelUp', 'EventsController@levelUp');

/**
 * Admin routes
 */
Route::group(['before' => 'admin|auth'], function()
{
	// Routes
	Route::get('live', 'BackendController@live');
	Route::get('backend', 'BackendController@index');
	Route::get('category', 'BackendController@category');
	Route::get('bet/{id}', 'BackendController@bet');
	// Posts
	Route::post('backend', 'BackendController@createEvent');
	Route::post('category', 'BackendController@createCategory');
	Route::post('bet/createNewBet', 'BackendController@createNewBet');
	Route::post('bet/createNewBetling', 'BackendController@createNewBetling');
	Route::post('bet/deleteEvent', 'BackendController@deleteEvent');
	Route::post('bet/closeBetting', 'BackendController@closeBetting');
	Route::post('bet/deleteBet', 'BackendController@deleteBet');
	Route::post('bet/betWinner', 'BackendController@betWinner');
	Route::post('bet/betRemoveWinner', 'BackendController@betRemoveWinner');
	Route::post('bet/editBetling', 'BackendController@editBetling');
	Route::post('bet/deleteBetling', 'BackendController@deleteBetling');

});

/**
 * Test routes
 */
Route::get('test', function()
{
	return Event::all();
});
