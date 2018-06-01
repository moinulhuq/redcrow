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

/* Home */
Route::get('/', function (){
  return view('general.dashboard');
})->middleware('guest');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('home');

///* post */
//Route::get('/post', 'PostController@index');
//Route::get('/post/create', 'PostController@create');
//Route::post('/post', 'PostController@store');
//Route::get('/post/{Post}', 'PostController@show');
//
///* comment */
//Route::post('/comment/{post}', 'CommentController@store');

/* customer */
Route::post('/customer/extra', 'CustomerController@extra');
Route::get('/customer', 'CustomerController@index');
Route::post('/customer', 'CustomerController@store');
Route::delete('/customer/{id}', 'CustomerController@destroy');
Route::get('/customer/{id}/edit', 'CustomerController@edit');
Route::put('/customer/{id}', 'CustomerController@update');



