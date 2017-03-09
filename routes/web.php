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

Route::get('/home', 'TaskController@index');
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');

//  Rute for editering av tasks viewet
Route::get('/task/{task}/edit', 'TaskController@edit');

// rute til comments viewet
Route::get('/task/{task}/comments', 'TaskController@comments');

// rute til update av oppgaver
Route::post('/task/{task}/update', 'TaskController@update');

// rute til lagring av comments
Route::Post('/task/{task}/comments', 'CommentsController@store');
