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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'forums'], function() {
    Route::get('/', [
        'as' => 'forums.index',
        'uses' => 'ForumsController@index',
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

})			;
