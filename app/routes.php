<?php

App::instance('MadRambles\Repositories\UserRepositoryInterface', 'MadRambles\Repositories\DbUserRepository');
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

Route::get('/', function()
{
	return App::environment();
});

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('login', 'MadRambles\Controllers\LoginController@index');
    Route::post('login', 'MadRambles\Controllers\LoginController@store');
});

