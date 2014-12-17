<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('{n}', 'PageController@show')->where('n', '[1-3]');
Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');
Route::get('facture/{n}', 'FactureController@show')->where('n', '[0-9]+');

/*Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');*/
Route::controller('users', 'UsersController');
Route::controller('contact', 'ContactController');
Route::controller('photo', 'PhotoController');
Route::controller('email', 'EmailController');

Route::resource('user', 'UserController');
Route::controller('auth','AuthController');
Route::controller('password', 'RemindersController');

App::missing(function() {
    return Response::make('Page inconnue !', 404);
});