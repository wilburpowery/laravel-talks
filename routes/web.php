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

Route::get('talks/create', 'TalksController@create')->middleware('auth')->name('talks.create');
Route::post('talks', 'TalksController@store')->middleware('auth')->name('talks.store');
Route::get('talks/{talk}', 'TalksController@show')->middleware('auth')->name('talks.show');

Route::post('talks/{talk}/like', 'TalkLikesController@store')->middleware('auth')->name('talk.like');
