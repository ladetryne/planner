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

Route::get('admin', function () {
    return view('admin_template');
});

Auth::routes();

Route::get('/home', 'Pages\DashboardController@index');

Route::get('/tasks', 'Tasks\TasksController@index');
Route::get('/mytasks', 'Tasks\MyTasksController@index');
Route::get('/newtasks', 'TaskController@newtask');
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

// calender rute 
Route::get('/calendar', 'Pages\CalendarController@index');

Route::get('/tidslinje', 'Pages\TimelineController@index');
Route::get('/tidslinjeex', 'Pages\TimelineExampleController@index');
Route::get('/tidslinjeex2', 'Pages\TimelineExampleController@index2');
Route::get('/tidslinjeex3', 'Pages\TimelineExampleController@index3');







