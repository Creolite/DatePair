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

Route::get('topics/', 'TopicController@index')->name('topics');
Route::get('topics/create', 'TopicController@create');
Route::get('topics/{topic}', 'TopicController@show')->name('topic');

Route::middleware(['auth'])->group(function () {
    Route::resource('user', 'UserController', ['only' => [
        'show', 'update'
    ]]);
});
