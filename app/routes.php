<?php

App::bind('MadRambles\Repositories\UserRepositoryInterface', 'MadRambles\Repositories\DbUserRepository');
App::bind('MadRambles\Repositories\PostRepositoryInterface', 'MadRambles\Repositories\DbPostRepository');
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
    Route::get('login', array('as' => 'admin.login', 'uses' => 'MadRambles\Controllers\LoginController@index'));
    Route::post('login', 'MadRambles\Controllers\LoginController@store');
    Route::get('logout', 'MadRambles\Controllers\LoginController@destroy');

    Route::get('/', array('as' => 'admin.index', 'uses' => 'MadRambles\Controllers\AdminController@index'))->before('auth');
    Route::resource('user', 'MadRambles\Controllers\UserController');
});

