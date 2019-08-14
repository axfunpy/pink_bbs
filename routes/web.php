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
//homeController

Route::get('/guest','HomeController@guest');
Route::get('logout','HomeController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('get_user_token','HomeController@get_user_token');
//forumController
Route::get('/','ForumController@index');
Route::get('thread/list/{id}','ForumController@show');
Route::get('/add_forum','ForumController@add_forum');
//topiccontroller
Route::get('newtopic/{id}','TopicController@create');
Route::post('create/topic','TopicController@store');
Route::get('/t/{topic}','TopicController@show');
//replyController
Route::post('/reply/store','ReplyController@store');
Route::get('getreply/{id}','ReplyController@getreply');