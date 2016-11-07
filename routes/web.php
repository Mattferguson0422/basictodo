<?php

use App\Task;
use Illuminate\Http\Request;


/**
 * Display All Tasks
 */
Route::get('/', 'TaskController@index');

/**
 * Add A New Task
 */
Route::post('/task', 'TaskController@create');

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', 'TaskController@remove');