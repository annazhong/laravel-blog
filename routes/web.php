<?php

use Illuminate\Support\Facades\Redis;

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

Route::get('/', 'PostController@index')->name('home');

// Add ['as' => 'login',
Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', ['as' => 'login', 'uses' => 'SessionsController@store']);
Route::get('/logout', 'SessionsController@destory');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');

Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');

Route::get('/posts/create', 'PostController@create');
Route::post('/posts/{post}', 'CommentsController@store');

Route::get('/posts/{id}', 
 [
   'as' => 'showpost', 
   'uses' => 'PostController@show'
 ])->where(['id' => '[0-9]+']);

// still working on it.
Route::get('/posts/{id}', 
 [
   'as' => 'view', 
   'uses' => 'PostController@view'
 ])->where(['id' => 'view']); 


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/redis', function() {
	$visits = Redis::incr('visits');
	return $visits;
});

Route::get('mail', 'MailController@index');



