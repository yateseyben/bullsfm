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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'forums'], function() {
    Route::get('/', [
        'as' => 'forums.index',
        'uses' => 'ForumsController@index',
    ]);
    Route::get('/show/{id}',[
        'as' => 'forums.show',
        'uses' => 'ForumsController@show',
    ]);
    Route::get('/{id}/create-topic',[
        'as' => 'forums.createTopic',
        'uses' => 'ForumsController@createTopic',
    ]);
    Route::post('/{id}/store-topic',[
        'as' => 'forums.storeTopic',
        'uses' => 'ForumsController@storeTopic',
    ]);
});

Route::group(['prefix' => 'topics'], function() {
    Route::get('/show/{id}', [
        'as' => 'topics.show',
        'uses' => 'TopicsController@show',
    ]);
    Route::post('/{id}/createPost/',[
    	'as' => 'topics.createPost',
    	'uses' => 'TopicsController@createPost',
    	]);
    Route::get('/edit/{id}',[
        'as' => 'topics.edit',
        'uses' => 'TopicsController@edit'
    ]);
    Route::post('update/{id}', [
        'as' => 'topics.update',
        'uses' => 'TopicsController@update'
    ]);
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('/edit/{id}', [
        'as' => 'posts.edit',
        'uses' => 'PostsController@edit'
    ]);
    Route::post('update/{id}', [
        'as' => 'posts.updatePost',
        'uses' => 'PostsController@updatePost'
    ]);
});

