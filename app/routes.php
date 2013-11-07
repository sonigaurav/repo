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

Route::get('/', 'HomeController@get_login');

Route::get('home', array('as' => 'home', 'uses' => 'HomeController@get_index'));

Route::get('login', array('as' => 'login', 'uses' => 'HomeController@get_login'));

Route::get('compare', array('as' => 'compare', 'uses' => 'HomeController@get_compare'));

Route::get('explore', array('as' => 'explore', 'uses' => 'HomeController@get_explore'));

Route::get('trends', array('as' => 'trends', 'uses' => 'HomeController@get_trends'));

Route::get('settings', array('as' => 'settings', 'uses' => 'HomeController@get_settings'));

Route::get('tweetmap', array('as' => 'tweetmap', 'uses' => 'HomeController@get_tweetmap'));



/* */
Route::get('api/stories/{pulse}/{timestamp}', array('as' => 'stories', 'uses' => 'ApiController@get_stories'));

Route::get('api/usersetting', array('as' => 'usersetting', 'uses' => 'ApiController@get_user_settings'));

Route::get('api/userTagStory/{tv}', array('as' => 'userTagStory', 'uses' => 'ApiController@get_userTag_stories'));



