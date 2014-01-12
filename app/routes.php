<?php

App::bind('MadRambles\Repositories\UserRepositoryInterface', 'MadRambles\Repositories\DbUserRepository');
App::bind('MadRambles\Repositories\PostRepositoryInterface', 'MadRambles\Repositories\DbPostRepository');
App::bind('MadRambles\Repositories\TagRepositoryInterface', 'MadRambles\Repositories\DbTagRepository');

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
	return View::make('hello');
});

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('login', array('as' => 'admin.login', 'uses' => 'MadRambles\Controllers\LoginController@index'));
    Route::post('login', 'MadRambles\Controllers\LoginController@store');
    Route::get('logout', 'MadRambles\Controllers\LoginController@destroy');

    Route::get('/', array('as' => 'admin.index', 'uses' => 'MadRambles\Controllers\AdminController@index'))->before('auth');
    Route::resource('user', 'MadRambles\Controllers\UserController');
    Route::get('user', 'MadRambles\Controllers\UserController@index');
    Route::get('user/{user}', 'MadRambles\Controllers\UserController@show');
    //Route::post('post', 'MadRambles\Controllers\PostController@store');
    Route::resource('post', 'MadRambles\Controllers\PostController');
});

