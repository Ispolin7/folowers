<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FollowersController@update');

//Route::post('followers-link', 'FollowersController@getFollowersFromLink');
//Route::post('followers-name', 'FollowersController@getFollowersFromName');

