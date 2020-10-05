<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','TaskController@index');
Route::get('/tasks/index', function () {
    return view('tasks.index');
});
Route::get('/about', function () {
    return view('about');
});
Route::post('/contact/{contact}', 'HomeController@store');
Route::get('/contact/{contact}', 'HomeController@index1');
Auth::routes();
Route::get('/showid', 'TaskController@show')->name('home');
Route::get('/home', 'TaskController@index');
Route::get('/tasks', 'TaskController@store');
Route::get('/showV/{coment}/{task}', 'TaskController@showV');
Route::get('/show/{task}', 'TaskController@show');
Route::get('/show1/{task}', 'TaskController@show1');
Route::get('/edite/{task}', 'TaskController@edite');
Route::put('/update/{task}', 'TaskController@update');
Route::post('/task', 'TaskController@store');
Route::post('/com/{task}', 'CommentController@store');
Route::post('/reply/{comment}/{task}', 'ReplController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::delete('/com/{comment}/{task}', 'CommentController@destroy');
Route::delete('/rep/{reply}', 'replController@destroy');