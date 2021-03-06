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

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/invite/{code}', 'HomeController@index');
Route::post('/invite/{code}', 'HomeController@update');
Route::get('/thanks/{code}', 'HomeController@thanks');

Route::resource('gifts', 'GiftsController');
Route::resource('guests', 'GuestsController');
Route::resource('invitations', 'InvitationsController');
Route::get('/invitations/{id}/send', 'InvitationsController@send');
Route::resource('meals', 'MealsController');
Route::resource('users', 'UsersController');
Route::resource('wishes', 'WishesController');