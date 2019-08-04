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

//Route::get('/', function () {
//    return view('welcome');
//    Route::get('/', 'ActivitiesController@indexAction')->name('home');
//});

Route::get('activity/{activity_id}', 'ActivitiesController@activityGetAction')->name('activity');

Route::get('/', 'ActivitiesController@indexAction')->name('home');

Route::get('activity_form', 'ActivitiesController@activityFormAction')->name('activity_form');
Route::post('activity', 'ActivitiesController@activityPostAction')->name('activity_form_post');

Route::get('time_spent/form', 'ActivitiesController@timeSpentFormAction')->name('time_spent_form');
Route::post('time_spent', 'ActivitiesController@timeSpentPostAction')->name('time_spent_form_post');
