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

Auth::routes();

Route::get('', 'HomeController@index')->name('home');

Route::get('topics', 'TopicController@index')->name('topics');
Route::get('topics/create', 'TopicController@create')->name('newTopic');
Route::get('topics/{topic}', 'TopicController@show')->name('topic');
Route::post('topics', 'TopicController@store')->name('addTopic');
Route::get('topics/{topic}/edit', 'TopicController@edit')->name('editTopic');
Route::put('topics/{topic}', 'TopicController@put')->name('saveTopic');

Route::middleware(['auth'])->group(function () {
    Route::resource('user', 'UserController', ['only' => [
        'show', 'update'
    ]]);
});
